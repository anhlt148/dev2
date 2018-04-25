<?php
class Mod_category_type extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	// get list cate type:
	function get_list(){
		$query = $this->db->get('category_type');
		return $query->result_array(); // trả về 1  mảng nhiều phần tử
	}
	// kiểm tra danh muc cần thêm mới có trong csdl không:
	function mod_category_check($value){
		$this->db->where('type_name',$value);
		$query = $this->db->get('category_type');	
		$data = $query->num_rows();
		return $data;
	}
	// thêm mới:
	function mod_category_insert($data){
		$this->db->insert('category_type',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	// lấy thông tin 1 item:
	function mod_category_get($id){
		$this->db->where('type_id', $id);	
		$query = $this->db->get('category_type');
		$data = $query->row_array();
		return $data;
	}
	// ham kiem tra danh mục trùng khi sưa:
	function mod_category_check2($value, $id){		
		$this->db->where('type_name',$value);
		$this->db->where('type_id !=',$id);
		$query = $this->db->get('category_type');	
		$data = $query->num_rows();
		return $data;
	}
	// hàm cập nhật:
	function update($data, $id){
		$this->db->where('type_id', $id);
		$this->db->update('category_type', $data); 	
	}
	// xóa dm:
	function mod_category_delete($id){
		$this->db->where('type_id', $id);
		$this->db->delete('category_type');
	}
}
?>