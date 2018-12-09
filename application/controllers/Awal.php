<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {
	protected $global = array();
    
    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('u_type')) {
            redirect('login');
        }

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['moment'] = $m;
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
        
    }
    
	public function index() {
		$data = [	'usertype'=>$this->session->userdata('u_type'),
			'b'=>$this->global['today_date'],
			'global' =>$this->global
		];

		$assets = ['css'=>'cashier_sales.css','js'=>'cashier_sales.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('awal');
		$this->load->view('footer',$assets);	
	}

}