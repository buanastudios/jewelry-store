<?php
class Login extends CI_Controller {
    protected $global = array();
    
    function __construct() {
        parent::__construct();
        // session_start();
        $this->load->model(array('m_user'));            

        $this->global['pageTitle'] = "Derry's Jewelry Store";
        $this->global['loginBoldTitle'] = 'Jewelry Store';
        $this->global['loginTitle'] = '&nbsp;';
    }

    function index() {                		
        if ($this->session->userdata('u_name')) {
            redirect('cashier/sales');
        }
        
		$this->load->view('login_custom', $this->global);
    }

    function forgot(){
        $this->load->view('forgotten', $this->global);   
    }
  
    function recover(){
      //$this->load->library('email');

      $this->email->from('sakti.buana@arthipesa.com', "Buana's Studio Jewel App Notification");
      $this->email->to('buana.projects@gmail.com');
//       $this->email->cc('another@another-example.com');
//       $this->email->bcc('them@their-example.com');
      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
      $this->email->subject('Email Registration Notification');
      $this->email->message('New User is now in the email class.');

      if($this->email->send()){
        echo "Email has been sent";
      };
    }
    function proses2() {
        $this->form_validation->set_rules('predefined_username', 'predefined_username', 'required|trim');        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_custom', $this->global);
        } else {

            $usr = $this->input->post('predefined_username');
            $psw = $this->input->post('password');
            $u = ($usr);
            $p = md5(($psw));
            $p = ($psw);            
            $cek = $this->m_user->cek($u, $p);            
            print_r($cek);
            if ($cek->num_rows() > 0) {
                echo "login berhasil, buat session";
                
                //print_r($cek->result());                
                foreach ($cek->result() as $qad) {                    
                    $sess_data['u_logged'] = $qad->id;
                    $sess_data['u_type'] = $qad->user;
                    
                    // $sess_data['nama'] = $qad->fullname;
                    // $sess_data['u_name'] = $qad->u_name;
                    // $sess_data['role'] = $qad->role_id;
                    // $sess_data['rolename'] = $qad->role;
                    // $sess_data['created_at'] = $qad->created_at;
                    $this->session->set_userdata($sess_data);
                }
								
				if(strlen($this->input->post('referrer_uri'))>0){
					redirect($this->input->post('referrer_uri'));
				}else{
					redirect('awal');
                    //switch($this->session->userdata('role')) {
                      //  redirect('login');
                    //}
				}
				
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_custom');
        } else {

            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = md5(mysql_real_escape_string($psw));
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->fullaname;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['role'] = $qad->role_id;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }

    function sess_add(){        
        // exit;
        $sess_data['u_id'] = $this->input->post('u_id');
        // $sess_data['nama'] = $qad->fullaname;
        // $sess_data['u_name'] = $qad->u_name;
        // $sess_data['role'] = $qad->role_id;
        $this->session->set_userdata($sess_data);
        echo $this->session->userdata('u_id'); 
    }

    function api_retrieve_session(){
        $data['data'] = $this->session->userdata;
        header('Content-Type: application/json');       
        echo json_encode( $data );  
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
