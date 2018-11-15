<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	protected $global = array();
	
    function __construct() {
        parent::__construct();
        
        $this->load->model(array('m_user', 'm_menu'));

				$this->global['apptitle_1stline'] = "Ummu Luthfi";
				$this->global['apptitle_2ndline'] = "Textile";
				$this->global['appminititle_1stline'] = "UL";
				$this->global['appminititle_2ndline'] = "Tex";
				$this->global['pageTitle'] = 'Ummu Luthfi Textile';
				$this->global['footerTitle'] = 'Store Self Project';
    }

	public function index(){
        if (!$this->session->userdata('u_name')) {
            redirect('login');
        }
        
		$this->global['pageTitle'] = 'Users Management | '. $this->global['pageTitle'];
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$dataSidebar['records'] 	=	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataBody['records'] 	   	= $this->m_user->semua();
		$dataFooter['spesificjs'] 	= array('settings/users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $dataSidebar);
		$this->load->view('content/settings/users/management', $dataBody);
		$this->load->view('footer', $dataFooter);
	}

	public function profile(){
		$this->global['pageTitle'] = 'User | Profile';
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$dataSidebar['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataBody['records'] = $this->m_user->semua();
		$dataFooter['spesificjs'] = array('users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $dataSidebar);
		$this->load->view('content/settings/profiles', $dataBody);
		$this->load->view('footer', $dataFooter);
	}

	public function resetpassword(){
		$this->global['pageTitle'] = 'Reset Password | User Management';
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$dataSidebar['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataBody['records'] = $this->m_user->semua();
		$dataFooter['spesificjs'] = array('users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $dataSidebar);
		$this->load->view('content/settings/users/resetpassword', $dataBody);
		$this->load->view('footer', $dataFooter);
	}
	
	public function generateNewPassword(){
		$this->global['pageTitle'] = 'Reset Password | User Management';
		$dataSidebar['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataBody['records'] = $this->m_user->semua();
		$dataFooter['spesificjs'] = array('users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $dataSidebar);
		$this->load->view('content/settings/users/resetpassword', $dataBody);
		$this->load->view('footer', $dataFooter);
	}

	function lists(){
		$this->global['pageTitle'] = 'Users List | User Management';
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$data['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataBody['records'] = $this->m_user->getAll();
		$dataFooter['spesificjs'] = array('users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $data);
		$this->load->view('content/settings/users/lists', $dataBody);
		// $this->load->view('content/masters/users', $dataZ);
		$this->load->view('footer', $dataFooter);
	}
	
	function add(){
		$this->global['pageTitle'] = 'New User | User Management';

		$data['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataFooter['spesificjs'] = array('users');
		$dataBody['roles'] = $this->m_menu->getAll();
		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $data);
		$this->load->view('content/settings/users/input', $dataBody);
		// $this->load->view('content/masters/users/input');
		$this->load->view('footer', $dataFooter);
	}

	function edit(){
		$this->global['pageTitle'] = 'Modify User | User Management';
		$this->load->model('m_user');
		$this->load->model('m_menu');
		$data['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataFooter['spesificjs'] = array('users');
		$dataBody = [];
		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $data);
		// $this->load->view('content/masters/users/edit');
		$this->load->view('content/settings/users/edit', $dataBody);
		$this->load->view('footer', $dataFooter);
	}

	function del(){
		$this->global['pageTitle'] = 'Delete User | User Management';

		$data['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataFooter['spesificjs'] = array('users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $data);
		$this->load->view('content/masters/users/edit');
		$this->load->view('footer', $dataFooter);
	}

	public function remove(){
		$this->global['pageTitle'] = 'Remove User | '.$this->global['pageTitle'] ;

		$data['records'] =	$this->m_menu->getMenu($this->session->userdata('role'));
		$dataFooter['spesificjs'] = array('users');

		$this->load->view('header', $this->global);
		$this->load->view('sidebar', $data);
		$this->load->view('content/masters/users/edit');
		$this->load->view('footer', $dataFooter);
	}

	public function searchByTerm(){		
		$term = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';
		if ($term == ''){
			$data['data'] =	$this->m_user->getAll();
		}else{
			$data['data'] =	$this->m_user->getBasedOnLabel($term);
		}
				
		header('Content-Type: application/json');
    	echo json_encode( $data );	
	}
	
	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}

