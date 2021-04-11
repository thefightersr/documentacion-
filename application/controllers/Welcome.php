<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    	$this->load->helper('url');

		$this->load->view('templates/headers/header');
		$this->load->view('templates/headers/main_menu');
		$this->load->view('templates/item_list_view');
		$this->load->view('templates/headers/footer');
	}

	public function agregar(){
    	$this->load->helper('url');

		$this->load->view('templates/headers/header_panel');
		$this->load->view('templates/headers/menu_panel');
		$this->load->view('templates/headers/menu_left_panel');
		$this->load->view('templates/item_form_view');
		$this->load->view('templates/headers/footer_panel');
	}
}
