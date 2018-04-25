<?php
class Mod_product extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();	
	}
	// get danh mục sp:
	function get_category_01(){
		$this->db->where('cate_status', 1);	
		$query = $this->db->get('category_01');
		$data = $query->result_array();
		return $data;
	}
	// thêm mới:
	function insert($dataArr){
		$this->db->insert('product', $dataArr);	
	}
	// đếm tổng số sp:
	function count_product(){
		$query = $this->db->get('product');	
		$total_rows = $query->num_rows();
		return $total_rows; 
	}
	// lấy danh sách sp theo trang:
	function get_list_product($per_page, $offset){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category_01', 'product.prd_id = category_01.id');
		$this->db->order_by('prd_name','ASC');
		$this->db->limit($per_page, $offset);		
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	function get_sp($id_sp){
		$this->db->where('id_sp',$id_sp);	
		$qr = $this->db->get('sanpham');
		$data = $qr->row_array();
		return $data;
	}
	function update_sp($dataArr,$id_sp){
		$this->db->where('id_sp',$id_sp);	
		$this->db->update('sanpham',$dataArr);
	}
	function delete_sp($id_sp){
		$this->db->where('id_sp',$id_sp);	
		$this->db->delete('sanpham');
	}
	
	
}
?>