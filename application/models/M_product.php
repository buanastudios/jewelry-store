<?php

class m_product extends CI_Model {

    private $tablename = "products";    
    private $view_readystock = "vw_products_readystock";
    private $view_purchasedstock = "vw_purchased_items";
    private $view_products = "vw_products";

    function getBasedOnID($id) {
        $this->db->where("id", $id);
        $query = $this->db->get($this->viewname);
		return $query->result();
    }

    function getBasedOnBarcode($barcode){
                $this->db->select("id,barcode,product_name,product_class_id,product_category,product_category_abbr,product_category_id,product_class,product_class_abbr,product_type,weight,is_secondhand_id,is_secondhand,officer_id,status,created_at,currency,value_pergram,value_perweight,product_img_blob,product_img_type");    
        $this->db->where("barcode", $barcode);
        $query = $this->db->get($this->view_products);
        return $query->result();   
    }
    
    function update($id, $info) {
        $this->db->where("id", $id);
        $this->db->update($this->tablename, $info);
    }
    
    function update_per_barcode($id, $info) {
        $this->db->where("barcode", $id);
        $this->db->update($this->tablename, $info);
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

    public function getItemList__(){
        $this->db->select("vw_products_readystock.barcode, vw_products_readystock.product_name, vw_products_readystock.weight, vw_products_readystock.is_secondhand,vw_products_readystock.product_class, vw_products_readystock.product_category");
        $this->db->from($this->view_readystock);        
        $this->db->join('inventory_opname','inventory_opname.barcode=vw_products_readystock.barcode','Left');
        $this->db->where('inventory_opname.barcode is NULL');
        $query = $this->db->get();        
        $data = $query->result();
        return $data;
    }

    public function getItemList(){                  
        $this->db->select("A.id,
A.barcode,
A.product_name,
A.product_class_id,
A.product_category,
A.product_category_abbr,
A.product_category_id,
A.product_class,
A.product_class_abbr,
A.product_type,
A.weight,
A.is_secondhand_id,
A.is_secondhand,
A.officer_id,
A.`status`,
A.created_at,
A.currency,
A.value_pergram,
A.value_perweight");
        $query = $this->db->get($this->view_products. " A");                   
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
