<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {
	protected $global = array();
	
	function __construct() {
		parent::__construct();
		// session_start();
		$this->load->model(array('m_user', 'm_menu'));
		if (!$this->session->userdata('u_name')) {
			$this->session->set_flashdata('referrer_uri', current_url());
			redirect('login');
		}
	}

	public function missing(){
		$this->global['pageTitle'] = "404 | ";
		$viewfile = "errors/costum/404";
		$dataSidebar =['a','b'];
		// $dataFooter['spesificjs'] = array($viewfile);
		$assets = ['css'=>'404.css','js'=>'404.js'];				
		$dataBody = ['heading'=>'1','message'=>'1'];
		// $this->load->view('header', $this->global);
		// 
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$dataSidebar);
		$this->load->view($viewfile, $dataBody);
		$this->load->view('footer',$assets);
	}
}