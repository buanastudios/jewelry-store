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

			$this->global['apptitle_1stline'] = "Ummu Luthfi";
			$this->global['apptitle_2ndline'] = "Textile";
			$this->global['appminititle_1stline'] = "UL";
			$this->global['appminititle_2ndline'] = "Tex";
			$this->global['pageTitle'] = 'Ummu Luthfi Textile';
			$this->global['footerTitle'] = 'Store Self Project';
		}				

		public function missing(){
			$this->global['pageTitle'] = "Errors | ".$this->global['pageTitle'];
			$viewfile = "errors/missing";
			$dataSidebar['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
			$dataFooter['spesificjs'] = array($viewfile);
			$dataBody = [];
			$this->load->view('header', $this->global);
			$this->load->view('sidebar', $dataSidebar);
			$this->load->view($viewfile, $dataBody);
			$this->load->view('footer', $dataFooter);
		}
}