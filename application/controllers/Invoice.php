<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

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

    public function index(){

    }

    public function generating_num($trx_id=""){
    	$given_count = 4;
		$given_length= 3;
		$gen = [];
		$gen[0] = join ('', array_map(function($value){return $value==1 ? mt_rand(1,9):mt_rand(0,9);}, range(1,$given_length)));
		$gen[1] = $given_count +1;												
		$gen[2] = $this->global['moment']->format('M');
		$gen[3] = substr($this->session->userdata('nama'),0,3); 
		$gen[4] = $this->global['moment']->format('d');

		switch($trx_id){
			case 1: $gen[5] = "SALE"; break;
			case 2: $gen[5] = "PURC"; break;
			case 3: $gen[5] = "OTIN"; break;
			case 4: $gen[5] = "OTEX"; break;
			case 5: $gen[5] = "OPCO"; break;
			default: $gen[5] = "ORINC"; break;
		}

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

    public function api_generate_new(){
    	$trx_type = $this->input->post('trx_type');
    	$data['data'] =	$this->generating_num($trx_type);
		header('Content-Type: application/json');    	
		echo json_encode( $data );	
	}

	public function print_1() {
        $pdf= new mPDF();
               // data to views
        $data = array();
        //load the view and saved it into $html variable
        $html = $this->load->view('pdf_output',$data,true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
        
        //generate the PDF from the given html
        $pdf->WriteHTML($html);
        
        //download it.
        $pdf->Output($pdfFilePath,"D");
    }

	public function print_2() {
        
        // data to views
        $data = array();
        //load the view and saved it into $html variable
        $html=$this->load->view('pdf_output', $data, true);
         
        //this the the PDF filename that user will get to download
        $pdfFilePath = "2nd_output_pdf_name.pdf";
         
        //load mPDF library
        $this->load->library('pdf');
        
        // use this if you want to customize pdf
        //$this->load->library('pdf',array('params' => ''));
        
        //generate the PDF from the given html
        $this->pdf->WriteHTML($html);
        
        //download it.
        $this->pdf->Output($pdfFilePath, "D");
    }

	public function print_3(){
		$this->load->view('welcome_message');
		
        $html = $this->output->get_output();        
        
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option("isJavascriptEnabled",true);
        $dompdf->render();
        $dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function print_4(){
		$this->load->view('invoice');
		
        $html = $this->output->get_output();        
        
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option("isJavascriptEnabled",true);
        $dompdf->render();
        $dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function print_5(){
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';		

		$html = $this->output->get_output();        
        
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option("isJavascriptEnabled",true);
        $dompdf->render();
        $dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function print_6(){		
		print_r($_REQUEST);

		$product['name'] = $_REQUEST['product_name'];
		$product['cashier'] = $_REQUEST['cashier_name'];	
		$product['weight'] = $_REQUEST['product_weight'];
		$product['price'] = $_REQUEST['invoice_price'];		
		$product['trx'] = $_REQUEST['invoice_trx_date'];
		$product['invoice'] = $_REQUEST['invoice_num'];

		$product['priceinword'] = "SEMBILAN BELAS JUTA RUPIAH";
		$product['barcode'] = "KL-INV19122018";
		$product['image'] = base_url('assets/img/neclace.jpg');
	
		$data = array('product'=>$product);		
		
		$this->load->view('invoice',$data);
		$html=$this->output->get_output();   
		$pdfFilePath = uniqid().".pdf";
		$param =[];
		$param = array('resetpagenum' => '1',
				   'sheet-size' => array(210,110),
				   'orientation' => 'P',
				   'margin-left' => 0,
				   'margin-right' => 0,
				   'margin-top' => 0,
				   'margin-bottom' => 0);
				 $this->load->library('pdf');
		      $this->pdf->AddPageByArray($param);
		      $md = "testing invoice";
		      $this->pdf->SetTitle($md);
		      $this->pdf->SetAuthor("arthipesa.com");
		      $this->pdf->SetCreator("arthipesa.com");
		      $this->pdf->SetSubject("Jewelry Invoice");
		      $this->pdf->SetKeywords("Jewelry,Invoice,arthipesa.com");
		      $this->pdf->SetJS('this.print();');
		      $this->pdf->WriteHTML($html);
		      $this->pdf->Output();
	}

	public function print_0(){		
		$data = array();
		$this->load->view('invoice', $data, true);
	}

	public function print_7(){
		$this->load->view('invoice');		
		$html=$this->output->get_output();   
		$pdfFilePath = uniqid().".pdf";
		$param =[];
		$param = array('resetpagenum' => '1',
				   'sheet-size' => array(210,110),
				   'orientation' => 'P',
				   'margin-left' => 0,
				   'margin-right' => 0,
				   'margin-top' => 0,
				   'margin-bottom' => 0);
		$this->load->library('pdf');
        $this->pdf->AddPageByArray($param);

        //$md = strcode2utf("&amp;#1575;&amp;#1610;&amp;#1604;&amp;#1575;&amp;#1578; &amp;#1601;&amp;#1610;&amp;#1605;&amp;#1575; &amp;#1575;&amp;#1610;&amp;#1604;&amp;#1575;&amp;#1578; &amp;#1601;&amp;#1610;&amp;#1605;&amp;#1575;");
        $md = "testing invoice";
        $this->pdf->SetTitle($md);
        $this->pdf->SetAuthor("arthipesa.com");
        $this->pdf->SetCreator("arthipesa.com");
        $this->pdf->SetSubject("Jewelry Invoice");
        $this->pdf->SetKeywords("Jewelry,Invoice,arthipesa.com");
        $this->pdf->SetJS('this.print();');
        $this->pdf->WriteHTML($html);
        $this->pdf->Output();
	}

	public function print_8(){
		ob_start();
		$this->load->view('invoice');		
		$html=$this->output->get_output();   
		$html = ob_get_contents();
		ob_end_clean();

		$pdfFilePath = uniqid().".pdf";
		$param =[];
		$param = array('resetpagenum' => '1',				   
				   'sheet-size' => array(110,210),
				   'orientation' => 'L',
				   'margin-left' => 0,
				   'margin-right' => 0,
				   'margin-top' => 0,
				   'margin-bottom' => 0);
		$this->load->library('pdf');
        $this->pdf->AddPageByArray($param);
        $this->pdf->shrink_tables_to_fit = 1;
        //$md = strcode2utf("&amp;#1575;&amp;#1610;&amp;#1604;&amp;#1575;&amp;#1578; &amp;#1601;&amp;#1610;&amp;#1605;&amp;#1575; &amp;#1575;&amp;#1610;&amp;#1604;&amp;#1575;&amp;#1578; &amp;#1601;&amp;#1610;&amp;#1605;&amp;#1575;");
        $md = "testing invoice";
        $this->pdf->SetTitle($md);
        $this->pdf->SetAuthor("arthipesa.com");
        $this->pdf->SetCreator("arthipesa.com");
        $this->pdf->SetSubject("Jewelry Invoice");
        $this->pdf->SetKeywords("Jewelry,Invoice,arthipesa.com");
        $this->pdf->SetJS('this.print();');
        $this->pdf->WriteHTML($html);        
        $this->pdf->Output();
        $this->pdf->Output($pdfFilePath, "D");
	}

	public function print_9(){
		 // data to views
        $data = array();
        //load the view and saved it into $html variable
        $html=$this->load->view('invoice', $data, true);
         
        //this the the PDF filename that user will get to download
        $pdfFilePath = uniqid().".pdf";
         
        //load mPDF library
        $this->load->library('pdf');
        
        // use this if you want to customize pdf
        //$this->load->library('pdf',array('params' => ''));
        
        //generate the PDF from the given html
        $this->pdf->WriteHTML($html);
        
        //download it.
        $this->pdf->Output($pdfFilePath, "D");
	}

	public function print_10() {
        $pdf= new mPDF();
               // data to views
        $data = array();
        //load the view and saved it into $html variable
        $html = $this->load->view('pdf_output',$data,true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
        
        //generate the PDF from the given html
        $pdf->WriteHTML($html);
        
        //download it.
        $pdf->Output($pdfFilePath,"D");
    }

	public function printout() {
		for($i=1;$i<=13;$i++){
			echo "<a href='".base_url("invoice/print_").$i."'>Trial Print ".$i."</a>";	
			echo "<br/>";
		}        
    }

    public function print_11(){
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    
    public function print_12(){
        // data to views
        $data = array();
        //load the view and saved it into $html variable
        $html=$this->load->view('pdf_output', $data, true);
         
        //this the the PDF filename that user will get to download
        $pdfFilePath = "2nd_output_pdf_name.pdf";
         
        //load mPDF library
        $this->load->library('pdf');
        
        // use this if you want to customize pdf
        //$this->load->library('pdf',array('params' => ''));
        
        //generate the PDF from the given html
        $this->pdf->WriteHTML($html);
        
        //download it.
        $this->pdf->Output($pdfFilePath, "D");
    }
    
}
?>