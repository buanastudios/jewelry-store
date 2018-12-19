<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	protected $global = array();
    protected $imageFolder ="x/";

    function __construct() {
        parent::__construct();

        $this->load->model(array('m_product','m_inventory','m_product_class','m_product_category'));

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['moment'] = $m;
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
    }	

    private function getNameWithPath(){
        $name = $this->imageFolder.date('YmdHis').".jpg";
        return $name;
    }

    public function showImage(){
        $file = file_put_contents( $this->getNameWithPath(), file_get_contents('php://input') );
        if(!$file){
            return "ERROR: Failed to write data to ".$this->getNameWithPath().", check permissions\n";
        }
        else
        {
            $this->saveImageToDatabase($this->getNameWithPath());         // this line is for saveing image to database
            return $this->getNameWithPath();
        }
        
    }

    public function xv1(){
        $data = 'Some file data';
        if ( ! write_file('./', $data)){
            echo 'Unable to write the file';
        }else{
            echo 'File written!';
        }
    }

    public function xv(){        
        $data_processing =  $this->input->post('product');
        $product = array (  'is_refurbished' => '',  
                            'barcode' => '', 
                            'class' => '',                            
                            'category' => '',
                            'image' => '',
                            'name' =>'',
                            'weight' => ''
                            );

        foreach ($data_processing as $data_index => $data_value){
            switch($data_processing[$data_index]['name']){
                case 'product_isNotRefurbished' : $product['is_refurbished'] = (($data_processing[$data_index]['value']==0) ? 1 : 0); break;
                case 'product_barcode': $product['barcode'] = $data_processing[$data_index]['value']; break;
                case 'product_class': $product['class'] = $data_processing[$data_index]['value']; break;
                case 'product_category': $product['category'] = $data_processing[$data_index]['value']; break;
                case 'product_image': $product['image'] = $data_processing[$data_index]['value']; break;
                case 'product_name': $product['name'] = $data_processing[$data_index]['value']; break;
                case 'berat': $product['weight'] = $data_processing[$data_index]['value']; break;              
            }

        }

        // print_r($product);        
        // $baseFromJavascript = "data:image/png;base64,BBBFBfj42Pj4";
        $baseFromJavascript = $product['image'];
        // remove the part that we don't need from the provided image and decode it
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript));

        // $filepath = "/path/to/my-files/image.png"; // or image.jpg
        $filepath = "D:/pool/image.png"; // or image.jpg                

        // Save the image in a defined path
        file_put_contents($filepath,$data);

        $pathinfo = $filepath;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        
        $o = [];
        $o['filetype'] = $filetype;
        $o['filepath'] = $filepath; 
        $o['file'] = $data;       
        return $o;
    }

    public function add($data=''){    	
        $savedfile = $this->xv();                
    	$data_processing = ($data <>'') ? $data : $this->input->post('product');
    	$product = array ( 	'is_refurbished' => '',  
    					 	'barcode' => '', 
    					 	'class' => '',    					 	
    					 	'category' => '',
    					 	'image' => '',
    					 	'name' =>'',
    					 	'weight' => ''
    					 	);

    	foreach ($data_processing as $data_index => $data_value){
    		switch($data_processing[$data_index]['name']){
                case 'product_isNotRefurbished' : $product['is_refurbished'] = (($data_processing[$data_index]['value']==0) ? 1 : 0); break;
                case 'product_barcode': $product['barcode'] = $data_processing[$data_index]['value']; break;
                case 'product_class': $product['class'] = $data_processing[$data_index]['value']; break;
                case 'product_category': $product['category'] = $data_processing[$data_index]['value']; break;
                case 'product_image': $product['image'] = $data_processing[$data_index]['value']; break;
                case 'product_name': $product['name'] = $data_processing[$data_index]['value']; break;
                case 'berat': $product['weight'] = $data_processing[$data_index]['value']; break;              
    		}

    	}

        

        $product_prop  = array(             
            'is_secondhand' => $product['is_refurbished'],            
            'barcode' => $product['barcode'],
            'product_class' =>$product['class'],
            'officer_id' => $this->session->userdata('u_id'),
            'product_category' =>$product['category'],                              
            'product_img_type' => $savedfile['filetype'],
            'product_img_blob' => $savedfile['file'],         
            'product_name' =>$product['name'],
            'weight' =>$product['weight'],
            'created_at'=>$this->global['today']
        );

        $inserted_product = $this->m_product->insert($product_prop);
        $data['inserted'] = $inserted_product;
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

    public function remove($barcode=""){
        echo $this->input->post('barcode');
        $barcode = ($barcode=="" ? $this->input->post('barcode') : $barcode );
        echo $barcode;

        if ($barcode==""){
            $data['deleted'] = "no barcode to delete";    
        }else{
            $delete_product = $this->m_product->delete_per_barcode($barcode);
            $data['deleted'] = $delete_product;
        }

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

    public function check($barcode=""){
        if(strlen($barcode)==0){
            $barcode = $this->input->post("barcode");
        }

        if(strlen($barcode)>0){
            $data['data']  = $this->m_product->getReadyStock($barcode);        
            header('Content-Type: application/json');       
            echo json_encode( $data );  
        }else{
            echo "No barcode provided";
        }
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

    public function categories(){
        $data['data']  = $this->m_product_category->getItemList();        
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

	public function classes(){
        $data['data']  = $this->m_product_class->getItemList();        
        header('Content-Type: application/json');       
        echo json_encode( $data );  
	}

    public function itemList(){        
        $data['data']  = $this->m_product->getItemList();        
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

    public function prepareExport($b=""){
        //IF ARRAY OF MANY THEN ITERATE
        //IF ARRAY OF ONE THEN ITERATE
        //IF NOT AN ARRAY THEN PROCESS
        //
        $barcodes = $this->input->post('preparedForExport'); 
        $data['data'] = [];
        foreach($barcodes as $key=>$barcode){
            array_push($data['data'],$this->m_product->getBasedOnBarcode($barcode));        
        }

        $data['tobeExported'] = $barcodes;

        // $data['data']  = $this->m_product->getReadyStock($barcode);        
        // header('Content-disposition: attachment; filename=file.json');
        // header('Content-Type: application/json');       
        $preparedFilename   = mt_rand().$this->global['moment']->format('mdYhhmmss');
        $preparedFileext    = '.json';
        $preparedFilepath   = DOWNLOADPATH."\\".$preparedFilename.$preparedFileext;
        
        $newJsonString = json_encode( $data );  
        file_put_contents($preparedFilepath, $newJsonString);
        // write_file('D:\pool\exportJson.json', $newJsonString, 'r+');
        $data['status']  = "Exported as ".$preparedFilepath;
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }    

    public function prepareImport($certainfile=""){
        //PROCESS UPLOADED FILE;
        //
        // print_r($_FILES);
        $data['uploaded'] = $_FILES;
        $file_name = $_FILES['file']['name'];
        $file_tmp =  $_FILES['file']['tmp_name'];
        $new_file_path= UPLOADPATH."\\".$file_name;
        $data ['pathtofile'] = $new_file_path;
        move_uploaded_file($file_tmp,$new_file_path);

        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

    public function import($certainfile=""){
        echo "<pre>";
        print_r($this->input->post("product"));
        echo "</pre>";
        $product_prop  = array(             
            'is_secondhand'     =>  $this->input->post("product")[0]['is_secondhand'],
            'barcode'           =>  $this->input->post("product")[0]['barcode'],
            'product_class'     =>  $this->input->post("product")[0]['product_class_id'],
            'officer_id'        =>  $this->session->userdata('u_id'),
            'product_category'  =>  $this->input->post("product")[0]['product_category_id'],
            'product_type'      =>  $this->input->post("product")[0]['product_type'],
            'product_name'      =>  $this->input->post("product")[0]['product_name'],
            'weight'            =>  $this->input->post("product")[0]['weight'],
            'created_at'        =>  $this->global['today']
        );

        echo "<pre>";
        print_r($product_prop);
        echo "</pre>";
        // $inserted_product = $this->m_product->insert($product_prop);
        // $data['inserted'] = $inserted_product;
        // header('Content-Type: application/json');       
        // echo json_encode( $data );        
    }

    public function import_duplicateCheck($barcode){

    }
}
?>