<?php

class m_accounting extends CI_Model {

    private $table_trx_overview = "transaction_head";
    private $table_trx_details = "transaction_details";	
    private $view_cashflow = "vw_cash_flow";   

    function getBasedOnID($id) {
        $this->db->where("id", $id);
        $query = $this->db->get($this->viewname);
		return $query->result();
    }
    
    function update($id, $info) {
        $this->db->where("id", $id);
        $this->db->update($this->viewname, $info);
    }

    function insert($info) {
        $this->db->insert($this->tablename, $info);
    }

    function insert_sale_head($info) {
        $this->db->insert($this->table_trx_overview, $info);
        return $this->db->insert_id();
    }

    function insert_sale_detail($info) {
        $this->db->insert($this->table_trx_details, $info);
        return $this->db->insert_id();
    }

    function insert_purchase_head($info) {
        $this->db->insert($this->table_trx_overview, $info);
        return $this->db->insert_id();
    }

    function insert_purchase_detail($info) {
        $this->db->insert($this->table_trx_details, $info);
        return $this->db->insert_id();
    }

    function delete($kode) {
        $this->db->where("id", $kode);
        $this->db->delete($this->tablename);
    }
  
    public function getSalesRank(){
       $query = $this->db->get($this->view_sales_rank);
        return $query->result();
    }

    public function getPurchaseRank(){
       $query = $this->db->get($this->view_purchase_rank);
        return $query->result();
    }

    public function getSalesTransaction(){
       $query = $this->db->get($this->view_sales);
        return $query->result();
    }

    public function getPurchaseTransaction(){         
       $query = $this->db->get($this->view_purchase);
        return $query->result();
    }

    public function getStockTransaction(){         
       $this->db->order_by('trx_date', 'DESC');
       $query = $this->db->get($this->view_stock);

        return $query->result();
    }

    public function getCashBookSum(){         
       $this->db->order_by('trx_date', 'ASC');
       $this->db->order_by('trx_type', 'ASC');
       $query = $this->db->get($this->view_cashflow);

        return $query->result();
    }

    public function getCashBookSum_Daily($param=''){         
       $this->db->select('DAY(trx_date) as trx_day, MONTH(trx_date) as trx_month, YEAR(trx_date) as trx_year, trx_type, sum(trx_amount) as trx_amount');
       $this->db->order_by('YEAR(trx_date)', 'ASC');
       $this->db->order_by('MONTH(trx_date)', 'ASC');
       $this->db->order_by('DAY(trx_date)', 'ASC');
       $this->db->order_by('trx_type', 'ASC');
       $this->db->group_by('YEAR(trx_date)');
       $this->db->group_by('MONTH(trx_date)');
       $this->db->group_by('DAY(trx_date)');
       $this->db->group_by('trx_type');
       $query = $this->db->get($this->view_cashflow);

        return $query->result();
    }

    public function getCashBookSum_Monthly($param=''){       
      
       $this->db->select('MONTH(trx_date) as trx_month, YEAR(trx_date) as trx_year, trx_type, sum(trx_amount) as trx_amount');
       $this->db->order_by('YEAR(trx_date)', 'ASC');
       $this->db->order_by('MONTH(trx_date)', 'ASC');
       $this->db->order_by('trx_type', 'ASC');
       $this->db->group_by('YEAR(trx_date)');
       $this->db->group_by('MONTH(trx_date)');
       $this->db->group_by('trx_type');
       if ($param<>''){
            $this->db->where('MONTH(trx_date)',$param['month']);
            $this->db->where('YEAR(trx_date)',$param['year']);
       }
       $query = $this->db->get($this->view_cashflow);

        return $query->result();
    }

    public function getCashBookSum_Yearly($param=''){  
       $this->db->select('YEAR(trx_date) as trx_year, trx_type, sum(trx_amount) as trx_amount');     
       $this->db->order_by('YEAR(trx_date)', 'ASC');
       $this->db->order_by('trx_type', 'ASC');
       $this->db->group_by('YEAR(trx_date)');
       $this->db->group_by('trx_type');
       if ($param<>''){
            $this->db->where('YEAR(trx_date)',$param['year']);
       }
       $query = $this->db->get($this->view_cashflow);

        return $query->result();
    }
	public function getMaxID(){
		$this->db->select_max('product_id');        
        $query = $this->db->get($this->viewname);
        $data = $query->result();
		
        return $data;	
	}
	
	public function getAllBasedOnLabel($label,$limit,$offset=0,$order='DESC',$sort='id'){         
        $start = $offset;            
        $this->db->like('product_id',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('product_id',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);
        $data['rows'] = $query->result();
        return $data;
    }
	
    public function getBasedOnLabel($label,$limit,$offset=0,$order='DESC',$sort='id'){         
        $start = $offset;            
        $this->db->like('product_id',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('product_id',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);
        $data['rows'] = $query->result();
        return $data;
    }

    public function getBasedOnLabelForDropdown($label,$limit,$offset=0,$order='DESC',$sort='id'){         
        $start = $offset;            
        $this->db->like('order_sequence',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('order_sequence',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);
        $data['rows'] = $query->result();
        return $data;
    }
	
    public function getBasedOnLabel_2($label,$limit,$offset=0,$order='DESC',$sort='id'){         
        $start = $offset;                    

        $this->db->limit($limit, $start); 
        $this->db->like('order_sequence',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->viewname);
        $data = $query->result();
        return $data;
    }

}
