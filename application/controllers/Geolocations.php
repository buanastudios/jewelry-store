<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Geolocations extends CI_Controller {

	protected $global = array();
    
    function __construct() {
        parent::__construct();

        $this->load->model(array('m_geolocation'));

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['moment'] = $m;
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
    }

	public function cities($t='city'){			
		switch($t){
			case "search": $data['data'] =	$this->m_geolocation->getCity();		break;			
			case "drop": $data['data'] =	$this->m_geolocation->getCity();		break;			
		}
				
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}	
		

	public function searchByTerm(){		
		$term = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';
		if ($term == ''){
			$data['data'] =	$this->m_geolocation->getItemList();
		}else{
			$data['data'] =	$this->m_geolocation->getBasedOnLabel($term);
		}
				
		header('Content-Type: application/json');
    	echo json_encode( $data );	
	}
}
?>