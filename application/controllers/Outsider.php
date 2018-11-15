<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Outsider extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();
    }

    public function index(){
		$data = ['a','b'];		
		$this->load->view('header',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('content',$data);
		$this->load->view('footer',$data);
	}

	public function sales(){
		$data = ['a','b'];
		$assets = ['css'=>'cashier_sales.css','js'=>'cashier_sales.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/sales',$data);
		$this->load->view('footer',$assets);	
	}

	public function purchase(){
		$data = ['a','b'];		
		$this->load->view('header',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/purchase',$data);
		$this->load->view('footer',$data);	
	}
}
?>