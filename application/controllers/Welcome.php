<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index_2() {
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

	public function index() {
        
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
