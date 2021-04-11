<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentationController extends CI_Controller {

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
	public function __construct() {
		parent::__construct();

		$this->load->model('ItemModel');
		$this->load->model('SectorModel');
		$this->load->model('TagModel');
		$this->load->model('ItemsTagsModel');
    	$this->load->helper('url');

		$this->page = new Page($_POST, $_GET, $_SERVER, $_SESSION);
	}

	public function index()
	{
		$data['items'] = $this->ItemModel->findAll(10);
		$data['sectors'] = $this->SectorModel->countAll();
		$data['tags'] = $this->TagModel->findAll();
		
		$this->load->view('templates/headers/header');
		$this->load->view('templates/headers/main_menu');
		$this->load->view('item_list_view',$data);
		$this->load->view('templates/footers/footer');
	}

	public function citasView()
	{
		$data['items'] = $this->ItemModel->findAll(10);
		$data['sectors'] = $this->SectorModel->countAll();
		$data['tags'] = $this->TagModel->findAll();
		
		$this->load->view('templates/headers/header');
		$this->load->view('templates/headers/main_menu');
		$this->load->view('citas_list_view',$data);
		$this->load->view('templates/footers/footer');
	}

	public function itemView($id) {
		$data['item'] = $this->ItemModel->getById($id);
		$data['related'] = $this->ItemModel->findRelatedById($id);
		$data['itemsTags'] = $this->ItemsTagsModel->findByItem($id);

		$this->load->view('templates/headers/header');
		$this->load->view('templates/headers/main_menu');
		$this->load->view('item_view',$data);
		$this->load->view('templates/footers/footer');
	}

	public function filter() {
		$this->load->model('FilterModel');

		$params = $this->input->post('params');
		$sector = $this->input->post('sector');
		$tags = $this->input->post('tags');
		
		$limitTotal = $this->input->post('limitTotal');
		$limitFrom = $this->input->post('limitFrom');

		$result = $this->FilterModel->itemFilter($params, $sector, $tags,$limitTotal,$limitFrom);

		echo json_encode($result);
		exit;
	}

	public function findByScroll() {

		$params = $this->input->post('params');
		$sector = $this->input->post('sector');
		$tags = $this->input->post('tags');
		
		$limitTotal = $this->input->post('limitTotal');
		$limitFrom = $this->input->post('limitFrom');

		$result = $this->ItemModel->findAll($limitTotal, $limitFrom);

		echo json_encode($result);
		exit;
	}
}
