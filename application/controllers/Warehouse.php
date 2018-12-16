<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {

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

	public function report(){
		$data = ['a','b'];
		$assets = ['css'=>'warehouse_report.css','js'=>'warehouse_report.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('warehouse/stock-report',$data);
		$this->load->view('footer',$assets);	
	}
	
	public function product($t="inventory"){
		$module= "warehouse";
		$d = "product";
		$f ="";
		
		switch($t){
			case "inventory": $f='inventory'; break;
			case "add": $f= 'add'; break;			
			case "import": $f= 'import'; break;			
			case "export": $f= 'export'; break;			
			case "properties": $f= 'properties'; break;						
		}
		
		$v = $module.'/'.$d.'/'.$f;
		$ass = $module.'_'.$d.'_'.$f;

		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date'],'wenzhixin'=>false];
		$assets = ['css'=>$ass.'.css','js'=>$ass.'.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view($v,$data);
		$this->load->view('footer',$assets);	
	}

	public function stock($t="inventory"){
		$d = "warehouse";
		$f = "";
		
		switch($t){
			case"inventory": $f='stock-report'; break;
			case"opname": $f= 'stock-opname'; break;
			case"adjust": $f='stock-adjust'; break;			
			case"transfer": $f='stock-report'; break;			
			case"report": $f='stock-report'; break;			
		}
		
		$v = $d.'/'.$f;
		$ass = $d.'_'.$f;

		$data = ['usertype'=>$this->session->userdata('u_type'),'wenzhixin'=>false];
		$assets = ['css'=>$ass.'.css','js'=>$ass.'.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view($v,$data);
		$this->load->view('footer',$assets);	
	}
}
?>