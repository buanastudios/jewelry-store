<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        $this->load->model(array('m_transactions'));

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['moment'] = $m;
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
    }

	// public function purchase(){		
	// 	$data['data'] =	$this->m_transactions->getPurchaseTransaction();		
	// 	header('Content-Type: application/json');    	
	// 	echo json_encode( $data );		
	// }
    public function insert_salary(){
		$data = [];
    	$invoice_num = $this->generating_invoice_num();
    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice_num),    		
    		'trx_type' => $this->input->post('trx_type'),
    		'cashier_id' => $this->session->userdata('u_id'),
    		'officer_id' => $this->session->userdata('u_id'),
    		'trx_date' => $this->global['today'],
    		'trx_description'=> $this->input->post('trx_description')    		
    	);        	    	    	

    	$headid = $this->m_transactions->insert_salary_head($invoice_prop_head);

    	if ($headid>0){
    		$data['success'] = array(
		 						'invoice_num' => $invoice_num,
		 					    'invoice_row_id'=>$headid
		 					   );  

    		$invoice_prop_detail  = array(
	    		'transaction_head' => $headid,
	    		'invoice_num' =>$invoice_num,	    		
	    		'unit_price' =>$this->input->post('trx_amount'),
	    		'transaction_label' =>$this->input->post('trx_label_id')    		
    		);    		    		

    		$detailid = $this->m_transactions->insert_salary_detail($invoice_prop_detail);
    		if ($detailid>0){
    			$data['success'] = array(
    							'invoice_num' => $invoice_num,
    							'invoice_head_id'=>$headid,
    							'invoice_detail_id'=> $detailid
    						);    	 	    			
    		}
    		else{
				$data['error'][] = "Unable to insert detail invoice of ".htmlspecialchars($invoice_num);    	   	 	
		 	}

    	}else{
			$data['error'][] = "Unable to insert invoice  of ".htmlspecialchars($invoice_num);    	    	 	
		 }

    	header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }

    public function insert_expense(){
		$data = [];
    	$invoice_num = $this->generating_invoice_num();
    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice_num),    		
    		'trx_type' => $this->input->post('trx_type'),
    		'cashier_id' => $this->session->userdata('u_id'),
    		'officer_id' => $this->session->userdata('u_id'),
    		'trx_date' => $this->global['today'],
    		'trx_description'=> $this->input->post('trx_description')    		
    	);        	    	    	

    	$headid = $this->m_transactions->insert_other_expense_head($invoice_prop_head);

    	if ($headid>0){
    		$data['success'] = array(
		 						'invoice_num' => $invoice_num,
		 					    'invoice_row_id'=>$headid
		 					   );  

    		$invoice_prop_detail  = array(
	    		'transaction_head' => $headid,
	    		'invoice_num' =>$invoice_num,	    		
	    		'unit_price' =>$this->input->post('trx_amount'),
	    		'transaction_label' =>$this->input->post('trx_label_id')    		
    		);
    		
    		print_r($invoice_prop_detail);

    		$detailid = $this->m_transactions->insert_other_expense_detail($invoice_prop_detail);
    		if ($detailid>0){
    			$data['success'] = array(
    							'invoice_num' => $invoice_num,
    							'invoice_head_id'=>$headid,
    							'invoice_detail_id'=> $detailid
    						);    	 	    			
    		}
    		else{
				$data['error'][] = "Unable to insert detail invoice of ".htmlspecialchars($invoice_num);    	   	 	
		 	}

    	}else{
			$data['error'][] = "Unable to insert invoice  of ".htmlspecialchars($invoice_num);    	    	 	
		 }

    	header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }

    public function insert_newlabel(){
		$data = [];
		$label_prop = array(
    		'label' => htmlspecialchars($this->input->post('label')),    		
    		'trx_type_id' => $this->input->post('trx_type_id')
    		);

		$labelid = $this->m_transactions->insert_newlabel($label_prop);    

		if ($labelid>0){
			$data['success'] = array(
		 						'label_id' => $labelid		 					    
		 					   );  
		}

		header('Content-Type: application/json');    	
		echo json_encode( $data );
    }

    public function generating_invoice_num(){
    	$given_count = 4;
		$given_length= 3;
		$gen = [];
		$gen[0] = join ('', array_map(function($value){return $value==1 ? mt_rand(1,9):mt_rand(0,9);}, range(1,$given_length)));
		$gen[1] = $given_count +1;												
		$gen[2] = $this->global['moment']->format('M');
		$gen[3] = substr($this->session->userdata('nama'),0,3); 
		$gen[4] = $this->global['moment']->format('d');
		$gen[5] = "ORINC";
		$gen[6] = $this->global['moment']->format('Y');
												
		$invoice_complete_num= '';
		foreach ($gen as $k=>$v){
			if ($k>0){
				$invoice_complete_num .= "/".$v;
			}else{
				$invoice_complete_num .= $v;
			}
		}
		return $invoice_complete_num;
    }
    public function insert_income(){
    	$data = [];
    	$invoice_num = $this->generating_invoice_num();
    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice_num),    		
    		'trx_type' => $this->input->post('trx_type'),
    		'cashier_id' => $this->session->userdata('u_id'),
    		'officer_id' => $this->session->userdata('u_id'),
    		'trx_date' => $this->global['today'],
    		'trx_description'=> $this->input->post('trx_description')    		
    	);        	    	    	

    	$headid = $this->m_transactions->insert_other_income_head($invoice_prop_head);

    	if ($headid>0){
    		$data['success'] = array(
		 						'invoice_num' => $invoice_num,
		 					    'invoice_row_id'=>$headid
		 					   );  

    		$invoice_prop_detail  = array(
	    		'transaction_head' => $headid,
	    		'invoice_num' =>$invoice_num,	    		
	    		'unit_price' =>$this->input->post('trx_amount'),
	    		'transaction_label' =>$this->input->post('trx_label_id')    		
    		);
    		
    		print_r($invoice_prop_detail);

    		$detailid = $this->m_transactions->insert_other_income_detail($invoice_prop_detail);
    		if ($detailid>0){
    			$data['success'] = array(
    							'invoice_num' => $invoice_num,
    							'invoice_head_id'=>$headid,
    							'invoice_detail_id'=> $detailid
    						);    	 	    			
    		}
    		else{
				$data['error'][] = "Unable to insert detail invoice of ".htmlspecialchars($invoice_num);    	   	 	
		 	}

    	}else{
			$data['error'][] = "Unable to insert invoice  of ".htmlspecialchars($invoice_num);    	    	 	
		 }

    	header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }

    public function insert_sale($invoice){
    	$data =[];    	

    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice['invoice_num']),    		
    		'trx_type' => 1,
    		'cashier_id' => $this->session->userdata('u_id'),
    		'officer_id' => $this->session->userdata('u_id'),
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
	    		'transaction_label' => 1,
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

		return $data;
		// header('Content-Type: application/json');    	
		// echo json_encode( $data );	
    }

    public function insert_purchase($invoice){
    	$data =[];    	

    	$invoice_prop_head = array(
    		'invoice_num' => htmlspecialchars($invoice['invoice_num']),    		
    		'trx_type' => 2,
    		'cashier_id' => $this->session->userdata('u_id'),
    		'officer_id' => $this->session->userdata('u_id'),
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
	    		'transaction_label' => 2,
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
		switch($t){
			case "history": $data['data'] =	$this->m_transactions->getSalesTransaction();		break;
			case "rank": $data['data'] =	$this->m_transactions->getSalesRank();		break;			
			case "insert": 	$data['condition'] = $this->insert_sale($this->input->post('invoice')); 
							$data['insert_status'] = 'processed';
							$data['data'] = "";					
							break;
		}
		
		
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}	
	
	public function other_income($t='history'){
		switch($t){
			case "history": $data['data'] =	$this->m_transactions->getOtherIncomeTransaction();		break;						
		}
		
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}

	public function salary($t='history'){
		switch($t){
			case "history": $data['data'] =	$this->m_transactions->getSalaryTransaction();		break;						
		}
		
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}

	public function other_expense($t='history'){
		switch($t){
			case "history": $data['data'] =	$this->m_transactions->getOtherExpenseTransaction();		break;						
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