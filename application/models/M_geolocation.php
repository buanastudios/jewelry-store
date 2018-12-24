<?php

class m_geolocation extends CI_Model {

    private $tablename = "geo_locations_in_indonesia";    
    private $viewname = "vw_geo_locations";

    function getBasedOnID($id) {
        $this->db->where("id", $id);
        $query = $this->db->get($this->viewname);
		return $query->result();
    }

    function getBasedOnBarcode($barcode){
                $this->db->select("id,barcode,product_name,product_class_id,product_category,product_category_abbr,product_category_id,product_class,product_class_abbr,product_type,weight,is_secondhand_id,is_secondhand,officer_id,status,created_at,currency,value_pergram,value_perweight");    
        $this->db->where("barcode", $barcode);
        $query = $this->db->get($this->view_products);
        return $query->result();   
    }
    
    function update($id, $info) {
        $this->db->where("id", $id);
        $this->db->update($this->viewname, $info);
    }

    function insert($info) {
        $this->db->insert($this->tablename, $info);
        return $this->db->insert_id();
    }

    function delete($kode) {
        $this->db->where("id", $kode);
        $this->db->delete($this->tablename);
    }

    function delete_per_id($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->tablename);
    }

    function delete_per_barcode($barcode) {
        $this->db->where("barcode", $barcode);
        $this->db->delete($this->tablename);
    }

	public function getMaxID(){
		$this->db->select_max('product_id');        
        $query = $this->db->get($this->viewname);
        $data = $query->result();
		
        return $data;	
	}
    public function getProductImage($barcode){
        $this->db->select("product_img_blob");
        $this->db->where("barcode", $barcode);
        $query = $this->db->get($this->tablename);        
        $data = $query->row();
        return $query->num_rows() === 1 ? $data : false;         
    }
    public function getPurchasedStock(){                
        $query = $this->db->get($this->view_purchasedstock);        
        $data = $query->result();
        return $data;
    }

    public function getReadyStock($barcode){        
        $this->db->where("barcode", $barcode);
        $query = $this->db->get($this->view_readystock);        
        $data = $query->result();
        return $data;
    }	

    public function getItemList(){                  
        $this->db->select("A.*");
        $query = $this->db->get($this->viewname. " A");                   
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
