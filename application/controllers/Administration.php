<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        // if (!$this->session->userdata('u_name')) {
        //     redirect('login');
        // }

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
        
    }    

	public function user($m="list"){
		switch($m){
			case "list": $this->user_lists(); break;
			case "add": $this->user_add(); break;
		}
	}

	public function menu($m="list"){
		switch($m){
			case "list": $this->menu_lists(); break;
			case "add": $this->menu_add(); break;
			case "assignment": $this->menu_assignment(); break;
		}
	}

	public function config(){
		$data = ['a','b'=>$this->global['today_date']];
		$assets = ['css'=>'administration_menu_list.css','js'=>'administration_menu_list.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('administration/config',$data);
		$this->load->view('footer',$assets);	
	}

	public function user_lists(){
		$data = ['a','b'=>$this->global['today_date']];
		$assets = ['css'=>'administration_menu_list.css','js'=>'administration_menu_list.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('administration/user/list',$data);
		$this->load->view('footer',$assets);	
	}

	public function user_add(){
		$data = ['a','b'=>$this->global['today_date']];
		$assets = ['css'=>'administration_menu_list.css','js'=>'administration_menu_list.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('administration/user/add',$data);
		$this->load->view('footer',$assets);	
	}

	public function menu_lists(){
		$data = ['wenzhixin'=>true,'b'=>$this->global['today_date']];
		$assets = ['css'=>'administration_menu-list.css','js'=>'administration_menu-list.js'];				
		$this->load->view('header',$assets);
		// $this->load->view('sidebar',$data);
		$this->load->view('administration/menu/list',$data);
		$this->load->view('footer',$assets);	
	}

	public function menu_assignment(){
		$data = ['a','b'];
		$assets = ['css'=>'administration_menu_add.css','js'=>'administration_menu_add.js'];				
		$this->load->view('header',$assets);
		// $this->load->view('sidebar',$data);
		$this->load->view('administration/menu/assignment',$data);
		$this->load->view('footer',$assets);	
	}

	public function menu_add(){
		$data = ['a','b'];
		$assets = ['css'=>'administration_menu_add.css','js'=>'administration_menu_add.js'];				
		$this->load->view('header',$assets);
		// $this->load->view('sidebar',$data);
		$this->load->view('administration/menu/add',$data);
		$this->load->view('footer',$assets);	
	}

	public function searchByTerm(){
		$term = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';		
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : '10';		
		$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : '0';		
		$orderby = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';		
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : $term;		
		$sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 'id';		
		$data['data'] =	$this->m_fabrics->getBasedOnLabel($search, $limit, $offset, $orderby,$sort);		
		header('Content-Type: application/json');    	
		echo json_encode( $data );		
	}
}
?>