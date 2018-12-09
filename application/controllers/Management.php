<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('u_type')) {
            redirect('login');
        }

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
    }

	public function report($type){
		switch($type){
			case "cash": $this->cash(); break;
			case "sales": $this->sales(); break;
			case "purchase": $this->purchase(); break;
			case "inventory": $this->inventory(); break;
			default: break;
		}	
	}

	public function employment($sub){
		switch($sub){
			case "list": 		$this->employement_list(); break;
			case "add": 		$this->employement_add(); break;						
			case "facility": 	$this->employement_facility(); break;			
			case "salary": 		$this->employement_salary(); break;			
			case "absent": 		$this->employement_absent(); break;			
			default: break;
		}	
	}

	public function employement_list(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>true];				
		$assets = ['css'=>'management_employment-list.css','js'=>'management_employment-list.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/employment/list',$data);
		$this->load->view('footer',$assets);	
	}

	public function employement_facility(){
		$data = ['a','b'];
		$assets = ['css'=>'cashier_purchase.css','js'=>'cashier_purchase.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/employment/facility',$data);
		$this->load->view('footer',$assets);	
	}

	public function employement_salary(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>'management_employment-salary.css','js'=>'management_employment-salary.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/employment/salary-payment',$data);
		$this->load->view('footer',$assets);	
	}

	public function employement_absent(){
		$data = ['a','b'];
		$assets = ['css'=>'cashier_purchase.css','js'=>'cashier_purchase.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/employment/absent',$data);
		$this->load->view('footer',$assets);	
	}

	public function employement_add(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>'management_employment-add.css','js'=>'management_employment-add.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/employment/add',$data);
		$this->load->view('footer',$assets);	
	}

	public function employement_update(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>'management_employment-edit.css','js'=>'management_employment-edit.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/employment/edit',$data);
		$this->load->view('footer',$assets);	
	}

	public function building($sub){
		switch($sub){
			case "list": $this->building_list(); break;
			case "expense": $this->building_expense(); break;			
			default: break;
		}	
	}

	public function building_list(){
		$data = ['a','b'];
		$assets = ['css'=>'cashier_purchase.css','js'=>'cashier_purchase.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/building/list',$data);
		$this->load->view('footer',$assets);	
	}

	public function building_expense(){
		$data = ['a','b'];
		$assets = ['css'=>'cashier_purchase.css','js'=>'cashier_purchase.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/building/expense',$data);
		$this->load->view('footer',$assets);	
	}

	public function cash(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>'management_accounting-cashbook.css','js'=>'management_accounting-cashbook.js'];
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/accounting/cashbook',$data);
		$this->load->view('footer',$assets);	
	}

	public function sales(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'wenzhixin'=>true,'b'];
		$assets = ['css'=>'management_sales-report.css','js'=>'management_sales-report.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/sales-report',$data);
		$this->load->view('footer',$assets);	
	}

	public function purchase(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>'management_purchase-report.css','js'=>'management_purchase-report.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/purchase-trx-report',$data);
		$this->load->view('footer',$assets);	
	}

	public function inventory(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>'management_inventory-report.css','js'=>'management_inventory-report.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('management/inventory-trx-report',$data);
		$this->load->view('footer',$assets);	
	}
}
?>