<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

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

	public function income(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date']];
		$assets = ['css'=>'other_income.css','js'=>'other_income.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/income',$data);
		$this->load->view('footer',$assets);	
	}  

	public function expense(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date']];
		$assets = ['css'=>'other_expense.css','js'=>'other_expense.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/expense',$data);
		$this->load->view('footer',$assets);	
	}    

	public function sales(){		
		$data = [	'usertype'=>$this->session->userdata('u_type'),
					'b'=>$this->global['today_date'],
					'global' =>$this->global
				];

		$assets = ['css'=>'cashier_sales.css','js'=>'cashier_sales.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/sales',$data);
		$this->load->view('footer',$assets);	
		
		
	}

	public function purchase(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'b'=>$this->global['today_date']];
		$assets = ['css'=>'cashier_purchase.css','js'=>'cashier_purchase.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/purchase',$data);
		$this->load->view('footer',$assets);	
	}

	public function invoice_3(){
		$this->load->view('welcome_message');
		
        $html = $this->output->get_output();        
        
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option("isJavascriptEnabled",true);
        $dompdf->render();
        $dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function invoice_6(){
		$this->load->view('invoice');
		
        $html = $this->output->get_output();        
        
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option("isJavascriptEnabled",true);
        $dompdf->render();
        $dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function invoice(){
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

	public function invoice_8(){
		$data = array();
		$this->load->view('invoice', $data, true);
	}

	public function invoice_7(){
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
        $this->pdf->WriteHTML($html);
        $this->pdf->Output();
	}

	public function invoice_almost_working(){
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
        // $this->pdf->SetJS('this.print();');
        $this->pdf->WriteHTML($html);        
        $this->pdf->Output();
        $this->pdf->Output($pdfFilePath, "D");
	}

	public function invoice_2(){
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

	public function history(){
		$data = ['usertype'=>$this->session->userdata('u_type'),'wenzhixin'=>true];
		$assets = ['css'=>'cashier_history.css','js'=>'cashier_history.js'];				
		$this->load->view('header',$assets);
		$this->load->view('sidebar',$data);
		$this->load->view('cashier/history',$data);
		$this->load->view('footer',$assets);		
	}

	public function searchByTerm(){
		$term = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';		
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : '10';		
		$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : '0';		
		$orderby = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';		
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : $term;		
		$sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 'id';		
		$data['data'] =	$this->m_fabrics->getBasedOnLabel($search, $limit, $offset, $orderby,$sort);		
		header('Content-Type: application/json');    	
		echo json_encode( $data );		
	}
}
?>