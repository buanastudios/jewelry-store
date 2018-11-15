<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        $this->load->model(array('m_product','m_inventory'));
    }	

    public function add($data=''){    	

    	$data_processing = ($data <>'') ? $data : $this->input->post('product');
    	$product = array ( 	'is_refurbished' => '',  
    					 	'barcode' => '', 
    					 	'class' => '',
    					 	// 'type' => '',
    					 	'category' => '',
    					 	'image' => '',
    					 	'name' =>'',
    					 	'weight' => ''
    					 	);

    	foreach ($data_processing as $data_index => $data_value){
    		switch($data_processing[$data_index]['name']){
    			case 'is_notrefurbished' : $product['is_refurbished'] = $data_processing[$data_index]['value']; break;
    			case 'product_barcode': $product['barcode'] = $data_processing[$data_index]['value']; break;
    			case 'product_class': $product['class'] = $data_processing[$data_index]['value']; break;
    			// case 'product_type': $product['type'] = $data_processing[$data_index]['value']; break;
    			case 'product_category': $product['category'] = $data_processing[$data_index]['value']; break;
    			case 'product_image': $product['image'] = $data_processing[$data_index]['value']; break;
    			case 'product_name': $product['name'] = $data_processing[$data_index]['value']; break;
    			case 'product_weight': $product['weight'] = $data_processing[$data_index]['value']; break;    			
    		}

    	}

        $product_prop  = array(             
            'is_secondhand' => $product['is_refurbished'],
            'penimbang' => '8',
            'barcode' => $product['barcode'],
            'product_class' =>$product['class'],
            // 'product_type' =>$product['type'],               
            'product_category' =>$product['category'],              
            'product_img_blob' =>$product['image'],             
            'product_name' =>$product['name'],
            'weight' =>$product['weight']
        );

        $inserted_product = $this->m_product->insert($product_prop);
        $data['inserted'] = $inserted_product;
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

    function opname(){


        $product_prop  = array(	    		
            'officer_id'=>1,
    		'barcode' => $this->input->post('barcode'),
    		'stock_opname' => $this->input->post('opnamed_stock')
		);

		$opname_product = $this->m_inventory->insert($product_prop);
		$data['inserted'] = $opname_product;
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
    }


	public function readystock($b=''){		
        if($b==''){
            $barcode = $this->input->post('barcode');            
        }else{
            $barcode= $b;
        }

		$data['data']  = $this->m_product->getReadyStock($barcode);        
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}

	public function purchasedstock(){		
		$data['data']  = $this->m_product->getPurchasedStock();        
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}	

    public function itemImage($b=""){              
        $data['data'] = $this->m_product->getProductImage($b);        
        
        Header('Content-Type:image/png'); 
        echo $data['data']->product_img_blob;        
    }

	public function category(){

	}

    public function itemList(){
        $data['data']  = $this->m_product->getItemList();        
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

}
?>