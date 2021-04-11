<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private $currentUrl;
	public function __construct() {
		parent::__construct();

		// LIBRERIAS Y HELPER
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->load->helper('url');
    	// MODULOS
		$this->load->model('ItemModel');
		$this->load->model('SectorModel');
		$this->load->model('TagModel');
		$this->load->model('ItemsTagsModel');

		$this->page = new Page($_POST, $_GET, $_SERVER, $_SESSION);
		$this->currentUrl = explode('documentation/', current_url());
	}

	public function dashboard(){
		$data['items'] = $this->ItemModel->findAll(false,false,false);
		$data['sectors'] = $this->SectorModel->findAll();
		$data['tags'] = $this->TagModel->findAll();
		$data['currentUrl'] = $this->currentUrl[1];

		$this->load->view('templates/headers/header_panel');
		$this->load->view('templates/headers/menu_panel', $data);
		$this->load->view('templates/headers/menu_left_panel');
		$this->load->view('dashboard_view');
		$this->load->view('templates/footers/footer_panel');
	}

	public function editItem($id=''){
		
		$this->form_validation->set_rules('titulo','Nombre','required','trim'); 
		$data['sectors'] = $this->SectorModel->findAll();
		$data['tags'] = $this->TagModel->findAll();
		$data['itemsTags'] = $this->ItemsTagsModel->findByItem($id);
		$data['currentUrl'] = $this->currentUrl[1];

		if ($id) {
			$data['item'] = $this->ItemModel->getById($id);
		} 

		if ($_POST) {
			if ($this->form_validation->run()) {

				$empleado = $this->page->getUsuarioValidado();

				$tags = @$_POST['etiquetas'];
				unset($_POST['etiquetas']);

				$_POST['usuario'] = ($empleado->getId() == ID_PTOLEDO) ? ID_WSOTO : $empleado->getId();
				$_POST['usuarioNombre'] = ($empleado->getId() == ID_PTOLEDO) ? 'Wsoto' : $empleado->getNombreCorto();

				// print_r(FunctionsLibrary::fechaRealToMysql($_POST['fecha']));
				// die();
				$id = $this->ItemModel->save($id, $_POST);
				$this->ItemsTagsModel->save($id, $tags);

				redirect('/PanelController/dashboard');
				// $this->dashboard();

				return ;
			} else {
				$tag = new StdClass();
				$tag->nombre = $this->input->post('tagNombre');
				$data['tag'] = $tag;
			}
		}

		$this->load->view('templates/headers/header_panel');
		$this->load->view('templates/headers/menu_panel', $data);
		$this->load->view('templates/headers/menu_left_panel');
		$this->load->view('item_form_view');
		$this->load->view('templates/footers/footer_panel');
	}

	public function updateState() {
		$id = $_POST['id'];
		$state = $_POST['state'];

		$this->ItemModel->changeState($id, $state);
		echo  json_encode(array('result'=>1));
	}

	public function deleteItem($id) {
		$this->ItemsTagsModel->deleteByItem($id);
		
		if($this->ItemModel->delete($id)) {
			echo json_encode(array(true));
		} else {
			echo json_encode(array(false));
		}
		// $this->dashboard();
	}

	public function editSector($id='') {
		$data = array();
		$this->form_validation->set_rules('nombre','Nombre','required','trim'); 
		$data['sectors'] = $this->SectorModel->findAll();
		$data['currentUrl'] = $this->currentUrl[1];

		if ($id) {
			$data['sector'] = $this->SectorModel->getById($id);
		} 

		if ($_POST) {
			if ($this->form_validation->run()) {
				$this->SectorModel->save($id, $_POST);

				redirect('/PanelController/dashboard');
				// $this->dashboard();

				return ;
			} else {
				$sector = new StdClass();
				$sector->nombre = $this->input->post('nombre');
				$sector->idPadre = $this->input->post('idPadre');
				$data['sector'] = $sector;
			}
		}

		$this->load->view('templates/headers/header_panel');
		$this->load->view('templates/headers/menu_panel', $data);
		$this->load->view('templates/headers/menu_left_panel');
		$this->load->view('sector_form_view');
		$this->load->view('templates/footers/footer_panel');
	}

	public function deleteSector($id) {
		
		if($this->SectorModel->delete($id)) {
			echo json_encode(array(true));
		} else {
			echo json_encode(array(false));
		}

		// $this->dashboard();
	}

	public function editTag($id='') {
		$data = array();
		$this->form_validation->set_rules('tagNombre','Nombre','required','trim'); 
		$data['currentUrl'] = $this->currentUrl[1];

		if ($id) {
			$data['tag'] = $this->TagModel->getById($id);
		} 

		if ($this->input->post('tagNombre')) {
			if ($this->form_validation->run()) {
				$datos = array('nombre'=>$_POST['tagNombre']);
				$this->TagModel->save($id,$datos);
			
				redirect('/PanelController/dashboard');
				// $this->dashboard();

				return ;
			} else {
				$tag = new StdClass();
				$tag->nombre = $this->input->post('tagNombre');
				$data['tag'] = $tag;
			}
		}

		$this->load->view('templates/headers/header_panel');
		$this->load->view('templates/headers/menu_panel', $data);
		$this->load->view('templates/headers/menu_left_panel');
		$this->load->view('tag_form_view');
		$this->load->view('templates/footers/footer_panel');
	}

	public function deleteTag($id) {
		
		if($this->TagModel->delete($id)) {
			echo json_encode(array(true));
		} else {
			echo json_encode(array(false));
		}
	}
}
