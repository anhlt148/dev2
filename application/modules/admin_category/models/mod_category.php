<?php
class Mod_category extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();	
	}
	// lấy danh sách danh mục sản phẩm:
	function mod_category_list(){
		$query = $this->db->get('category_01');
		$data = $query->result_array(); // trả về 1  mảng nhiều phần tử
		return $data;
	}
	// kiểm tra danh muc cần thêm mới có trong csdl không:
	function mod_category_check($value){
		$this->db->where('cate_name',$value);
		$query = $this->db->get('category_01');	
		$data = $query->num_rows();
		return $data;
	}
	// thêm mới:
	function mod_category_insert($data){
		$this->db->insert('category_01',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	// lấy thông tin 1 item:
	function mod_category_get($id){
		$this->db->where('id', $id);	
		$query = $this->db->get('category_01');
		$data = $query->row_array();
		return $data;
	}
	// ham kiem tra danh mục trùng khi sưa:
	function mod_category_check2($value, $id){		
		$this->db->where('cate_name',$value);
		$this->db->where('id !=',$id);
		$query = $this->db->get('category_01');	
		$data = $query->num_rows();
		return $data;
	}
	// hàm cập nhật:
	function mod_category_update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('category_01', $data); 	
	}
	// xóa dm:
	function mod_category_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('category_01');
	}
}
?>