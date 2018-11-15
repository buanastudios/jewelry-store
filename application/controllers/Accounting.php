<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        $this->load->model(array('m_accounting'));

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
    }
	
    public function insert_expense(){
    	// $this->m_transactions->
    	// print_r($this->input->post);
    	$data = [];
    	$data['data'] = $this->input->post('trx_type');
    	header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }

    public function insert_income(){
    	// $this->m_transactions->
    }

    public function insert_sale($invoice){
    	$data =[];    	

    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice['invoice_num']),    		
    		'trx_type' => 1,
    		'cashier_id' => $this->session->userdata('u_id'),
    		'trx_date' => $this->global['today']
    		
    	);        	    	
		
		 
		 $headid = $this->m_transactions->insert_sale_head($invoice_prop_head);
		 
		 if ($headid>0){

		 	$data['success'] = array(
		 						'invoice_num' => $invoice['invoice_num'],
		 					    'invoice_row_id'=>$headid
		 					   );    	 	

		 	$invoice_prop_detail  = array(
	    		'transaction_head' => $headid,
	    		'invoice_num' =>$invoice['invoice_num'],
	    		'product_id' =>$invoice['product_id'],
	    		'barcode' => $invoice['product_barcode'],
	    		'unit_price' =>$invoice['unit_price'],
	    		'unit_weight' =>$invoice['unit_weight']    		
    		);

    		$detailid = $this->m_transactions->insert_sale_detail($invoice_prop_detail);
    		if ($detailid>0){
    			$data['success'] = array(
    							'invoice_num' => $invoice['invoice_num'],
    							'invoice_head_id'=>$headid,
    							'invoice_detail_id'=> $detailid
    						);    	 	    			
    		}
    		else{
				$data['error'][] = "Unable to insert detail invoice of ".htmlspecialchars($invoice['invoice_num']);    	   	 	
		 	}
		 }else{
			$data['error'][] = "Unable to insert invoice  of ".htmlspecialchars($invoice['invoice_num']);    	    	 	
		 }			    	

		header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }

    public function insert_purchase($invoice){
    	$data =[];    	

    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice['invoice_num']),    		
    		'trx_type' => 2,
    		'cashier_id' => $this->session->userdata('u_id'),
    		'trx_date' => $this->global['today']
    		
    	);        	    	
		
		 
		 $headid = $this->m_transactions->insert_purchase_head($invoice_prop_head);
		 
		 if ($headid>0){

		 	$data['success'] = array(
		 						'invoice_num' => $invoice['invoice_num'],
		 					    'invoice_row_id'=>$headid
		 					   );    	 	

		 	$invoice_prop_detail  = array(
	    		'transaction_head' => $headid,
	    		'invoice_num' =>$invoice['invoice_num'],
	    		'product_id' =>$invoice['product_buyback_id'],
	    		'barcode' => $invoice['product_buyback_barcode'],
	    		'unit_price' =>$invoice['product_buyback_price'],
	    		'unit_weight' =>$invoice['product_buyback_weight']    		
    		);

    		$detailid = $this->m_transactions->insert_purchase_detail($invoice_prop_detail);
    		if ($detailid>0){
    			$data['success'] = (object) array(
    							'invoice_num' => $invoice['invoice_num'],
    							'invoice_head_id'=>$headid,
    							'invoice_detail_id'=> $detailid
    						);    	 	    	    			
    		}
    		else{
				$data['error'][] = "Unable to insert detail invoice of ".htmlspecialchars($invoice['invoice_num']);    	   	 	
		 	}
		 }else{
			$data['error'][] = "Unable to insert invoice  of ".htmlspecialchars($invoice['invoice_num']);    	    	 	
		 }			    	

		return $data;	
    }

	public function purchase($t="history"){		
		switch($t){
			case "history": $data['data'] =	$this->m_transactions->getPurchaseTransaction();		break;
			case "rank": $data['data'] =	$this->m_transactions->getPurchaseRank();		break;			
			case "insert": $data['condition'] = $this->insert_purchase($this->input->post('invoice')); $data['data'] =''; $data['inserting'] = true; break;
		}
		
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}	

	public function sales($t="history"){	
		// print_r($this->input->post('invoice'));
		// $data['t'] = $t;
		// $data['data'] = $_POST;
		switch($t){
			case "history": $data['data'] =	$this->m_transactions->getSalesTransaction();		break;
			case "rank": $data['data'] =	$this->m_transactions->getSalesRank();		break;			
			case "insert": $this->insert_sale($this->input->post('invoice')); $data['insert_status'] = 'processed'; break;
		}
		
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}	

	public function stock(){
		$data['data']  = $this->m_transactions->getStockTransaction();
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}
	public function cashbook_sum(){
		$t = $_REQUEST['t'];		
		$d = $_REQUEST['d'];		
		$m = $_REQUEST['m'];		
		$y = $_REQUEST['y'];						

		$this->cashbook($t,$d,$m,$y);
	}

	public function cashbook($t='',$d='',$m='',$y=''){
		switch($t){
			case 'daily' 	: 	$param['day'] = $d; $param['month'] = $m; $param['year'] = $y; 
								$data['data']  = $this->m_accounting->getCashBookSum_Daily(); 
								$data['day'] = $d;
								$data['month'] = $m;
								$data['year'] = $y;
								break;
			case 'monthly' 	: 	$param['month'] = $m; $param['year'] = $y; 
								$data['data']  = $this->m_accounting->getCashBookSum_Monthly($param); 
								$data['month'] = $m;
								$data['year'] = $y;
								break;
			case 'yearly' 	: 	$param['year'] = $y;
								$data['data']  = $this->m_accounting->getCashBookSum_Yearly($param); 
								$data['year'] = $y;
								break;
			default 		: $data['data']  = $this->m_accounting->getCashBookSum(); break;
		}	
		
		
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}
}
?>