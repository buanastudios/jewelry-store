<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        $this->load->model(array('m_menu', 'm_user'));

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
    }

    public function index(){
		$data['data'] = 'menu1';

    	header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }

    public function header(){
		
    }

    public function greetings(){
    	// return "Happy Working".$this->session->userdata('nama'); 
    	$data['data'] = "Happy Working ".$this->session->userdata('nama'); 

    	header('Content-Type: application/json');    	
		echo json_encode( $data );
    }

    public function menu_builder(){    	
    	$data['data'] = $this->m_menu->getMenuForCertainuser($this->session->userdata('u_id'));    	
    	
    	header('Content-Type: application/json');    	
		echo json_encode( $data );	
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

	public function stock_sum(){
		$data['data']  = $this->m_transactions->getStockTransactionSum();
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}
}
?>