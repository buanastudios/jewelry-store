<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

	protected $global = array();	
	protected $default_value = array();

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('u_type')) {
            redirect('login');
        }

        $m = new \Moment\Moment("now","Asia/Jakarta");
        $this->global['today'] = $m->format();
        $this->global['today_date'] = $m->format("d-M-y");
        $this->global['today_time'] = $m->format("H:i:s");
        $this->global['lib_path'] = base_url('vendor/barcodegen.1d-php5.v2.2.0/html/image.php');

        //Barcode Properties
        $this->default_value['code'] = "code128";
        $this->default_value['output'] = 1;
		$this->default_value['dpi'] = 72;
		$this->default_value['thickness'] = 30;
		$this->default_value['res'] = 1 ;
		$this->default_value['rotation'] = 0.0;
		$this->default_value['font_family'] = 'Arial.ttf';
		$this->default_value['font_size'] = 8;
		$this->default_value['text2display'] = 'ProductBarcode123';
		$this->default_value['a1'] = '';
		$this->default_value['a2'] = '';
		$this->default_value['a3'] = '';
        
    }
   
	public function image_tag_generator($barcode){
		$img ='';
		return $img;	
	}

	public function set_code($param){
		$this->default_value['code'] = $param;
	}
	

	public function set_output($param){
		$this->default_value['output'] = $param;
	}

	public function set_dpi($param){
		$this->default_value['dpi'] = $param;
	}

	public function set_thickness($param){
		$this->default_value['thickness'] = $param;
	}

	public function set_res($param){
		$this->default_value['res'] = $param;
	}

	public function set_rotation($param){
		$this->default_value['rotation'] = $param;
	}

	public function set_text2display($param){
		$this->default_value['text2display'] = $param;
	}

	public function set_font_family($param){
		$this->default_value['font_family'] = $param;
	}

	public function set_font_size($param){
		$this->default_value['font_size'] = $param;
	}

	public function set_a1($param){
		$this->default_value['a1'] = $param;
	}

	public function set_a2($param){
		$this->default_value['a2'] = $param;
	}

	public function set_a3($param){
		$this->default_value['a3'] = $param;
	}									
						
	public function test2(){
		$theimage = $this->genbarcode (	$this->default_value['code'],
										$this->default_value['output'],
										$this->default_value['dpi'],
										$this->default_value['thickness'],
										$this->default_value['res'],
										$this->default_value['rotation'],
										$this->default_value['text2display'],
										$this->default_value['font_family'],
										$this->default_value['font_size'],
										$this->default_value['a1'],
										$this->default_value['a2'],
										$this->default_value['a3']
										);
		return $theimage;		
	}				

	public function test3(){
		echo $this->test2();
	}

	public function test(){
		$code= $this->default_value['code'];
		$output = intval(isset($_REQUEST['output']) ? $_REQUEST['output'] : $this->default_value['output']);
		$dpi = isset($_REQUEST['dpi']) ? $_REQUEST['dpi'] : $this->default_value['dpi'];
		$thickness = intval(isset($_REQUEST['thickness']) ? $_REQUEST['thickness'] : $this->default_value['thickness']);
		$res = intval(isset($_REQUEST['res']) ? $_REQUEST['res'] : $this->default_value['res']);
		$rotation = isset($_REQUEST['rotation']) ? $_REQUEST['rotation'] : $this->default_value['rotation'];
		$font_family = isset($_REQUEST['font_family']) ? $_REQUEST['font_family'] : $this->default_value['font_family'];
		$font_size = intval(isset($_REQUEST['font_size']) ? $_REQUEST['font_size'] : $this->default_value['font_size']);
		$text2display = isset($_REQUEST['text2display']) ? $_REQUEST['text2display'] : $this->default_value['text2display'];
		$a1 = isset($_REQUEST['a1']) ? $_REQUEST['a1'] : $this->default_value['a1'];
		$a2 = isset($_REQUEST['a2']) ? $_REQUEST['a2'] : $this->default_value['a2'];
		$a3 = isset($_REQUEST['a3']) ? $_REQUEST['a3'] : $this->default_value['a3'];


		$theimage = $this->genbarcode (	$code,
										$output,
										$dpi,
										$thickness,
										$res,
										$rotation,
										$text2display,
										$font_family,
										$font_size,
										$a1,
										$a2,
										$a3
										);

		$result['data']=$theimage;
		header('Content-Type: application/json');    	
		echo json_encode( $result );			
	}		
		

	public function genbarcode ($code,$output, $dpi, $thickness,  $res, $rotation , $text2display , $font_family , $font_size , $a1 ,$a2, $a3){
				return '<img src="'.$this->global['lib_path'].'?code=' . $code . '&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" />';									
	}

	
}
?>