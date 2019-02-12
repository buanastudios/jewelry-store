<?php

class m_transactions extends CI_Model {

    private $table_trx_labels = "transaction_labels";
    private $table_trx_overview = "transaction_head";
    private $table_trx_details = "transaction_details";
	private $view_purchase = "vw_purchase_transactions";
    private $view_sales = "vw_sales_transactions";   
    private $view_sales_rank = "vw_sales_per_cashier"; 
    private $view_purchase_rank = "vw_purchase_per_cashier";
    private $view_stock = "vw_inventory_sum_1";
    private $view_stock_sum = "vw_inventory_sum_2";

    private $view_otherincome = "vw_other_income_transactions";   
    private $view_otherexpense = "vw_other_expense_transactions";   
    private $view_salary = "vw_salary_transactions";   

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

    function insert_newlabel($info) {
        $this->db->insert($this->table_trx_labels, $info);
        return $this->db->insert_id();
    }

    function insert_other_income_head($info) {
        $this->db->insert($this->table_trx_overview, $info);
        return $this->db->insert_id();
    }

    function insert_other_income_detail ($info) {
        $this->db->insert($this->table_trx_details, $info);
        return $this->db->insert_id();
    }

    function insert_other_expense_head($info) {
        $this->db->insert($this->table_trx_overview, $info);
        return $this->db->insert_id();
    }

    function insert_other_expense_detail ($info) {
        $this->db->insert($this->table_trx_details, $info);
        return $this->db->insert_id();
    }

    function insert_salary_head($info) {
        $this->db->insert($this->table_trx_overview, $info);
        return $this->db->insert_id();
    }

    function insert_salary_detail ($info) {
        $this->db->insert($this->table_trx_details, $info);
        return $this->db->insert_id();
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

    function delete_other_expense($info){
        $this->delete_other_expense_detail($info);
        $this->delete_other_expense_head($info);        
    }
    
    function delete_other_expense_head($info){
        $this->db->where("invoice_num", $info);
        $this->db->delete($this->table_trx_overview);   
    }

    function delete_other_expense_detail($info){
        $this->db->where("invoice_num", $info);
        $this->db->delete($this->table_trx_details);
    }

    function delete_other_income($info){
        $this->delete_other_income_detail($info);
        $this->delete_other_income_head($info);        
    }
    
    function delete_other_income_head($info){
        $this->db->where("invoice_num", $info);
        $this->db->delete($this->table_trx_overview);   
    }

    function delete_other_income_detail($info){
        $this->db->where("invoice_num", $info);
        $this->db->delete($this->table_trx_details);
    }

    public function getSalaryTransaction(){
        $this->db->order_by("trx_date","desc");
       $query = $this->db->get($this->view_salary);
        return $query->result();
    }

    public function getOtherExpenseTransaction(){
        $this->db->order_by("trx_date","desc");
       $query = $this->db->get($this->view_otherexpense);
        return $query->result();
    }

    public function getOtherIncomeTransaction(){
        $this->db->order_by("trx_date","desc");
        $query = $this->db->get($this->view_otherincome);
        return $query->result();
    }

    public function getOtherTransactionLabels($type_id){
        $this->db->order_by("id","desc");
        $this->db->order_by("trx_type_id","desc");
        $this->db->order_by("label","desc");
        $this->db->where('trx_type_id',$type_id);
        $query = $this->db->get('transaction_labels');
        return $query->result();
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

    public function getStockTransactionSum(){         
       $this->db->order_by('trx_date', 'DESC');
       $query = $this->db->get($this->view_stock_sum);

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
