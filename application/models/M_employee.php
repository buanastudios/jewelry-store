<?php
class m_employee extends CI_Model {
    private $table = "employees";
    private $viewname = "vw_employee_list";

    function semua() {
        $query = $this->db->get("user");
        return $query->result();
    }
    function cekKode($kode) {
        $this->db->where("u_name", $kode);
        return $this->db->get("user");
    }
    function cekId($kode) {
        $this->db->where("u_id", $kode);
        return $this->db->get("user");
    }
    function getLoginData($usr, $psw) {
        $u = mysql_real_escape_string($usr);
        $p = md5(mysql_real_escape_string($psw));
        $q_cek_login = $this->db->get_where('users', array('username' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qad) {
                    $sess_data['logged_in'] = 'aingLoginWebYeuh';
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['fullname'] = $qad->fullname;
                    $sess_data['role'] = $qad->role;
                    $sess_data['group'] = $qad->group;
                    $sess_data['rid'] = $qad->rid;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
        }
    }
    function update($id, $info) {
        $this->db->where("u_id", $id);
        $this->db->update("user", $info);
    }
    function simpan($info) {
        $this->db->insert("user", $info);
    }
    function hapus($kode) {
        $this->db->where("u_id", $kode);
        $this->db->delete("user");
    }
    public function getAll(){
        $this->db->select('u_id, u_name, fullname');
        $this->db->from($this->viewname);
        $this->db->group_by('u_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getBasedOnLabel($label){        
       $this->db->like('fullname',$label);
       $this->db->or_like('u_name',$label);
       $query = $this->db->get('vw_users');        
        return $query->result();
    }

    public function getBasedOnLabelForDropdown1($label,$limit,$offset=0,$order='DESC',$sort='id'){         
        $start = $offset;            
        $this->db->like('fullname',$label);
        $this->db->or_like('u_name',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('fullname',$label);
        $this->db->or_like('u_name',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);
        $data['rows'] = $query->result();
        return $data;
    }

    public function getBasedOnLabelForDropdown($label,$limit,$offset=0,$order='DESC',$sort='id'){           
        $start = $offset;                
        $this->db->select('u_id, u_name, fullname'); 
        $this->db->limit($limit, $start); 
        $this->db->like('fullname',$label);
        $this->db->or_like('u_name',$label);
        $this->db->group_by('u_id');
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);
        return $query->result();        
    }
};