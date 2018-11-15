<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cleaner extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        $this->load->model(array('m_product', 'm_cleanse'));
    }

	public function schedule(){
		// $this->load->library('nomer');
		
		// $formatter = new Numeral;
		$data = ['usertype'=>$this->session->userdata('u_type'),'wenzhixin'=>true];
		$assets = ['css'=>'cleaner_schedule.css','js'=>'cleaner_schedule.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cleaner/schedule',$data);
		$this->load->view('footer',$assets);	
}

	public function cleanse(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'];
		$assets = ['css'=>'cleaner_cleanse.css','js'=>'cleaner_cleanse.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cleaner/cleansing',$data);
		$this->load->view('footer',$assets);	
	}

	public function updateschedule(){		
		$data = array(	'invoice_id' => $this->input->post('itemid'),
						'responsibility_of' => $this->input->post('delegateto'),
						'assigned_by' => $this->session->userdata('u_id'),						
						'created_at' => date('Y-m-d H:i:s')
					);
		$this->m_cleanse->insert($data);
		//$this->m_cleanse->updateschedule($id);		
	}

	public function report(){
		$data = ['a','b'];
		$assets = ['css'=>'cleaner_report.css','js'=>'cleaner_report.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cleaner/report',$data);
		$this->load->view('footer',$assets);	
	}

}
?>