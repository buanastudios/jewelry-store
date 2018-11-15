<?php

/** 
 * User: arthipesa
 * Date: 6/21/16
 * Time: 02:18
 */
class m_menu extends CI_Model
{

    private $tablename  = "menus";    
    private $viewname   = "vw_menus";    

    public function getMenuForCertainUser($userid){
        $sortColumn = "user_id";
        $orderType = "ASC";
        $this->db->where('user_id',$userid);
        $this->db->order_by($sortColumn, $orderType);
        $query = $this->db->get($this->viewname); 
        $data['total']  = $query->num_rows(); 
        $data['rows']   = $query->result();
        return $data; 
    }
    public function getMenu($role){
        $query = $this->db->query("SELECT * FROM vw_menu_per_role WHERE role_id='".$role."'");
        return $query->result();
    }

    public function getSubMenu($parentID){
//        $query = $this->db->get('menu');
        $query = $this->db->query('SELECT *, (SELECT COUNT(*) as submenu_total FROM menu B WHERE parentid = A.id) as submenu_total FROM menu A WHERE parentid = '.$parentID);
        return $query->result();
    }

    public function getAll(){
 		$query = $this->db->query('SELECT *, (SELECT COUNT(*) as submenu_total FROM menu B WHERE parentid = A.id) as submenu_total FROM menu A');
 		return $query->result();   	
    }
	
	public function getMenuCategory(){
		$query = $this->db->query("SELECT DISTINCT(category) as category FROM menu WHERE category <> ' '");
 		return $query->result();   	
	}    

	public function getMenuUpper(){
		$query = $this->db->query("SELECT * FROM menu where id IN (SELECT DISTINCT(parentid) FROM menu WHERE parentid <> '') AND parentid = 0 ORDER BY parentid ASC");
 		return $query->result();  
	}
		
	public function updateMenu($id,$col,$val){
		$sql ="UPDATE menu set ".$col."='".$val."' WHERE id='".$id."'";
		$this->db->query($sql);
	}
	
	public function updateSpesific($id){
		
	}
	
	public function getMenuFor($rid){
		 $query = $this->db->query("SELECT * FROM vw_menu_acess WHERE role_id=(SELECT role_id FROM user WHERE u_id = '".$rid."') ");
     return $query->result();
	}
	
    public function getBasedOnLabel($label,$limit,$offset=0,$order='DESC',$sort='id'){                        
        $start = $offset;            
        $this->db->like('label',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get('vw_menu_parents');  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('label',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get('vw_menu_parents');
        $data['rows'] = $query->result();
        return $data;
    }
	
    public function getMenuParents($label,$limit,$offset=0,$order='DESC',$sort='id'){                        
        $start = $offset;            
        $this->db->like('label',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get('vw_menu2_parents');  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('label',$label);
        $this->db->order_by($sort, $order);
        $query = $this->db->get('vw_menu2_parents');
        $data['rows'] = $query->result();
        return $data;
    }

    public function getMenuWithChild($parentid, $label,$limit,$offset=0,$order='DESC',$sort='id'){                        
        $start = $offset;            
        $this->db->like('label',$label);
        $this->db->where('parentid',$parentid);
        $this->db->order_by($sort, $order);
        $query = $this->db->get('vw_menu2');  
        $data['total'] = $query->num_rows();     

        $this->db->limit($limit, $start); 
        $this->db->like('label',$label);
        $this->db->where('parentid',$parentid);
        $this->db->order_by($sort, $order);
        $query = $this->db->get('vw_menu2');
        $data['rows'] = $query->result();
        return $data;
    }

}