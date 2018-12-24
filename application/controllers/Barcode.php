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

        $this->load->model(array('m_product'));

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

    public function currentGram($b=''){
        if($b==''){
            $barcode = $this->input->post('barcode');            
        }else{
            $barcode= $b;
        }

        $data['data']  = $this->m_product->getReadyStock($barcode);        
        return $data;
    }

	public function printtofile($barcodes=""){
		$barcodes = $this->input->post('barcodes');
		// print_r($barcodes);
		$xet = [];
		$barcode_properties = [];
		for ($x = 0; $x < count($barcodes); $x++) {
		    // echo "The number is: $x <br>";
		    $xet[$x] = $this->currentGram($barcodes[$x]);			
		    $barcode_properties[$xet[$x]['data'][0]->barcode] = array($xet[$x]['data'][0]->weight, 
		    														  $xet[$x]['data'][0]->is_secondhand,
		    														  $xet[$x]['data'][0]->product_class);
		} 		

				
		$barcode_max = 2;

		$root = ZPLPATH; 
		$printedfolder = $root."\\newthing\\";
		// $originalfile = $root."\\mixed-6aug-zebra.prn";
		$originalfile = $root."\\20181224.prn";
		$file_will_be_generated  = ceil(count($barcodes) / $barcode_max);

		$generated_filename = [];
		for ($i = 0; $i < $file_will_be_generated; $i++) {
			$generated_filename[$i] = $printedfolder."file.".$i.".prn";
			$data['generatedfile'][$i] = array('filename'=>$generated_filename[$i] );
			if (copy ($originalfile, $generated_filename[$i])) {
				// "File <b>$originalfile</b> berhasil dicopy menjadi <b>$generated_filename[$i]</b>. <br>";
			}
		}
	
		$parsed_file = array(array());
		foreach ($generated_filename as $key => $filebaru){
			$lines = file($filebaru);
			$counter1=0;	
			foreach ($lines as $line_num => $line) {
			   $parsed_file[$key][++$counter1] = $line;
			}	
		}

		$file_iterate =0;
		$line_iterate = 19;

		$data['barcodeineachline'] 	= $barcode_max;
		$data['barcodes'] 			= $barcodes;
		$data['linestoprint'] 		= count($generated_filename);		
		$lmax = $barcode_max;
		$nfile = 0;
		$distributed_file = [];

		foreach ($barcodes as $key_index=>$value_barcode){			
			$lmax--;		
			//UN COMMENT TO SEE THE LOGIC
			// echo $generated_filename[$nfile];
			// echo "file".$nfile." has content: ";
			// echo ($lmax==0) ? " LEFT: ".$value_barcode : " RIGHT: ".$value_barcode;
			// echo "<br/>";

			//put it real
			$distributed_file[$nfile][$lmax]['filename'] = $generated_filename[$nfile];
			$distributed_file[$nfile][$lmax]['barcode'] = $value_barcode;
			$distributed_file[$nfile][$lmax]['weight'] = $barcode_properties[$value_barcode][0];
			$distributed_file[$nfile][$lmax]['is_secondhand'] = $barcode_properties[$value_barcode][1];
			$distributed_file[$nfile][$lmax]['product_class'] = $barcode_properties[$value_barcode][2];

			if ($lmax == 0){
				$nfile++;
				$lmax = $barcode_max;
			}
			
		}
		
		foreach($distributed_file as $ki=>$fileiteration){
			foreach($fileiteration as $kfi=>$props){
				if ($kfi==0){
					$parsed_file[$ki][16] = str_replace("KL-301224201807",$props['barcode'], $parsed_file[$ki][16]);
					$parsed_file[$ki][23] = str_replace("KL-301224201807",$props['barcode'], $parsed_file[$ki][23]);
					$parsed_file[$ki][18] = str_replace("MUDA",$props['product_class'], $parsed_file[$ki][18]);
					$parsed_file[$ki][17] = str_replace("BRB",$props['is_secondhand'], $parsed_file[$ki][17]);
					$parsed_file[$ki][19] = str_replace("299.99",$props['weight'], $parsed_file[$ki][19]);
				}

				if ($kfi==1){
					$parsed_file[$ki][15] = str_replace("KL-301224201808",$props['barcode'], $parsed_file[$ki][15]);
					$parsed_file[$ki][24] = str_replace("KL-301224201808",$props['barcode'], $parsed_file[$ki][24]);
					$parsed_file[$ki][21] = str_replace("TUA",$props['product_class'], $parsed_file[$ki][21]);
					$parsed_file[$ki][20] = str_replace("BRB",$props['is_secondhand'], $parsed_file[$ki][20]);
					$parsed_file[$ki][22] = str_replace("299.99",$props['weight'], $parsed_file[$ki][22]);
				}								

			}			
		};

		foreach ($generated_filename as $key => $filebaru){	
			file_put_contents($filebaru, "");
			foreach ($parsed_file[$key] as $key_file => $line) {					     
			   file_put_contents($filebaru, $line, FILE_APPEND);
			}	
		}

		header('Content-Type: application/json');       
        echo json_encode( $data ); 
	}

    public function printtofile_withproperties($barcodes=""){
		//with properties;
		$barcode_max = 2;
		$barcode_about_to_print = ['KL-010200001'
								  ,'KL-010200002'
								  ,'KL-010200003'						  
								  ,'KL-010200004'
								  ,'KL-010200005'];

		$barcode_properties ['KL-010200001'] = array('100 gram','BRB','MUDA');						  
		$barcode_properties ['KL-010200002'] = array('200 gram','','TUA');
		$barcode_properties ['KL-010200003'] = array('300 gram','BRB','MUDA');
		$barcode_properties ['KL-010200004'] = array('400 gram','','MUDA');
		$barcode_properties ['KL-010200005'] = array('500 gram','BRB','TUA');

		$root = ZPLPATH; 
		$printedfolder = $root."\\newthing\\";
		$originalfile = $root."\\mixed-6aug-zebra.prn";
		$file_will_be_generated  = ceil(count($barcode_about_to_print) / $barcode_max);

		$generated_filename = [];
		for ($i = 0; $i < $file_will_be_generated; $i++) {
			$generated_filename[$i] = $printedfolder."file.".$i.".prn";

			if (copy ($originalfile, $generated_filename[$i])) {
				// "File <b>$originalfile</b> berhasil dicopy menjadi <b>$generated_filename[$i]</b>. <br>";
			}
		}
	
		$parsed_file = array(array());
		foreach ($generated_filename as $key => $filebaru){
			$lines = file($filebaru);
			$counter1=0;	
			foreach ($lines as $line_num => $line) {
			   $parsed_file[$key][++$counter1] = $line;
			}	
		}

		$file_iterate =0;
		$line_iterate = 19;


		// echo "<pre>";
		foreach ($barcode_about_to_print as $key_index=>$value_barcode){
			// echo $file_iterate.":";
			// echo $key_index. "=>";
			// echo ($key_index+1)." % 2 = ".($key_index+1) % $barcode_max;
			// echo " isi baris : ". $value_barcode; //BARCODE
			echo "\n\t\t\t".$barcode_properties[$value_barcode][0]; //GRAM
			echo "\n\t\t\t".$barcode_properties[$value_barcode][1]; //BRB
			echo "\n\t\t\t".$barcode_properties[$value_barcode][2]; //TUAMUDA
			
			if(($key_index+1 % $barcode_max) == 1){
				$parsed_file[0][17] = str_replace("KL-32EM45002",$value_barcode, $parsed_file[0][17]);
				$parsed_file[0][22] = str_replace("TUA",$barcode_properties[$value_barcode][2], $parsed_file[0][22]);
				$parsed_file[0][23] = str_replace("BRB",$barcode_properties[$value_barcode][1], $parsed_file[1][23]);
				$parsed_file[0][24] = str_replace("199 gram",$barcode_properties[$value_barcode][0], $parsed_file[1][24]);
			}else{
				$parsed_file[0][18] = str_replace("KL-32EM45001",$value_barcode, $parsed_file[0][18]);
				$parsed_file[0][19] = str_replace("MUDA",$barcode_properties[$value_barcode][2], $parsed_file[0][19]);
				$parsed_file[0][20] = str_replace("BRB",$barcode_properties[$value_barcode][1], $parsed_file[0][20]);
				$parsed_file[0][21] = str_replace("299 gram",$barcode_properties[$value_barcode][0], $parsed_file[0][21]);
			}
			//echo "&nbsp; will replace: ". $parsed_file[$file_iterate][($line_iterate+$key_index)];
			// echo "<br/>";
			$line_iterate++;

			$hasilbagi = ($key_index+1) % $barcode_max;
			if ($hasilbagi == 0 ){
				$file_iterate++;		
			}
			if ($line_iterate == 0 ){
				$file_iterate++;		
			}
			
		}
		// echo "</pre>";

		// print_r($generated_filename);

		foreach ($generated_filename as $key => $filebaru){	
			file_put_contents($filebaru, "");
			foreach ($parsed_file[$key] as $key_file => $line) {		
			   //file_put_contents($filebaru, $line, FILE_APPEND);	   
			   file_put_contents($filebaru, $line, FILE_APPEND);
			}	
		}

		$files = scandir($printedfolder, 1);

		$data['linestoprint'] = count($generated_filename);
		header('Content-Type: application/json');       
        echo json_encode( $data );  

	}
	public function printtofile_onlybarcode($barcodes = ''){

		$barcodes = $this->input->post('barcodes'); 
        $data['data'] = [];
        foreach($barcodes as $key=>$barcode){                        
        	$barcode;
            // array_push($data['data'],$x);        
        }
        $barcode_max_perline = 4;
        $data['tobeExported_count'] = $barcode_max_perline;
        $data['tobeExported'] = $barcodes;
        
        // $preparedFilename   = mt_rand().$this->global['moment']->format('mdYhhmmss');
        // $preparedFileext    = '.json';
        // $preparedFilepath   = DOWNLOADPATH."\\".$preparedFilename.$preparedFileext;
        
        // $newJsonString = json_encode( $data );  
        // file_put_contents($preparedFilepath, $newJsonString);
        
        // $data['status']  = "Exported as ".$preparedFilepath;
        // 
        $root = ZPLPATH;
		$printedfolder = $root."\\newthing\\";
		$originalfile = $root."\\4label.prn";
		$file_will_be_generated  = ceil(count($barcodes) / $barcode_max_perline);

		$generated_filename = [];
		for ($i = 0; $i < $file_will_be_generated; $i++) {
			$generated_filename[$i] = $printedfolder."file.".$i.".prn";

			if (copy ($originalfile, $generated_filename[$i])) {
				// echo  "File <b>$originalfile</b> berhasil dicopy menjadi <b>$generated_filename[$i]</b>. <br>";
			}
		}

		$parsed_file = array(array());
		foreach ($generated_filename as $key => $filebaru){
			$lines = file($filebaru);
			$counter1=0;	
			foreach ($lines as $line_num => $line) {
			   $parsed_file[$key][++$counter1] = $line;
			}	
		}

		$parsed_file[0][19] = str_replace("KL-32EM45003301",$barcode_about_to_print[0], $parsed_file[0][19]);
		$parsed_file[0][20] = str_replace("KL-32EM45003301",$barcode_about_to_print[1], $parsed_file[0][20]);
		$parsed_file[0][21] = str_replace("KL-32EM45003301",$barcode_about_to_print[2], $parsed_file[0][21]);
		$parsed_file[0][22] = str_replace("KL-32EM45003301",$barcode_about_to_print[3], $parsed_file[0][22]);

		foreach ($generated_filename as $key => $filebaru){	
			foreach ($parsed_file[$key] as $key_file => $line) {		
			   file_put_contents($filebaru, $line, FILE_APPEND);
			}	
		}



        header('Content-Type: application/json');       
        echo json_encode( $data );  
	}
}
?>