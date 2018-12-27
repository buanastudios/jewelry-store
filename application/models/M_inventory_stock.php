<?php

class m_inventory_stock extends CI_Model {

    private $tablename = "inventory_stock";    
    private $view_readystock = "vw_products_readystock";
    private $view_purchasedstock = "vw_purchased_items";

    function getBasedOnID($id) {
        $this->db->where("id", $id);
        $query = $this->db->get($this->viewname);
		return $query->result();
    }
    
    function update($id, $info) {
        $this->db->where("id", $id);
        $this->db->update($this->viewname, $info);
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

	public function getMaxID(){
		$this->db->select_max('product_id');        
        $query = $this->db->get($this->viewname);
        $data = $query->result();
		
        return $data;	
	}

    public function adjust_stock($barcode, $info){        
        $this->db->insert('inventory_adjustment', $info);           
        return $this->db->insert_id();
    }

    public function getAdjustmentListPerBarcode($opname_date,$barcode){
        $this->db->where("opname_date", $opname_date);
        $this->db->where("barcode", $barcode);
        $this->db->from('inventory_adjustment');
        $this->db->select("*");                
        $query = $this->db->get();          
        $data['total'] = $query->num_rows();           
        $data['data'] = $query->result();
        return $data;
    }

    public function getWillBeAdjustSingle($mentioned_date,$barcode){                        
        $this->db->select("*");                
        $this->db->where("opname_date", $mentioned_date);
        $this->db->from('vw_inventory_stock_opname_will_be_adjust');
        $query = $this->db->get();          
        $data['total'] = $query->num_rows();           
        $data['data'] = $query->result();

        return $data;
    }

    public function getWillBeAdjustList($mentioned_date){                        
        $this->db->where("opname_date", $mentioned_date);
        $this->db->from('vw_inventory_stock_opname_will_be_adjust');      
        $query = $this->db->get();          
        $data['total'] = $query->num_rows();           
        $data['data'] = $query->result();
        $data['param'] = $mentioned_date;
        return $data;
    }	

    public function getWillBeOpnameSingle($mentioned_date,$barcode){                
        $subquery = "SELECT barcode FROM vw_inventory_stock_opname WHERE opname_date='".$mentioned_date."'";
        $this->db->select("*");                
        $this->db->where("barcode = '".$barcode."' AND barcode NOT IN($subquery)");
        $this->db->from($this->view_readystock);        
        $query = $this->db->get();  
        $data['subquery'] = $subquery;
        $data['total'] = $query->num_rows();           
        $data['data'] = $query->result();

        return $data;
    }

    public function getWillBeOpnameList($mentioned_date){                
        $subquery = "SELECT barcode FROM vw_inventory_stock_opname WHERE opname_date='".$mentioned_date."'";
        $this->db->select("*");                
        $this->db->where("barcode NOT IN($subquery)");
        $this->db->from($this->view_readystock);        
        $query = $this->db->get();  
        $data['subquery'] = $subquery;
        $data['total'] = $query->num_rows();           
        $data['data'] = $query->result();

        return $data;
    }

    public function getItemList(){
        $this->db->select("vw_products_readystock.barcode, vw_products_readystock.product_name, vw_products_readystock.weight, vw_products_readystock.is_secondhand,vw_products_readystock.product_class, vw_products_readystock.product_category, vw_products_readystock.status");
        $this->db->from($this->view_readystock);        
        $this->db->join('inventory_opname','inventory_opname.barcode=vw_products_readystock.barcode','Left');
        $this->db->where('inventory_opname.barcode is NULL');
        $query = $this->db->get();        
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
