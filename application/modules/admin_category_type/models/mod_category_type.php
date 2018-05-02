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
	function insert($arr){
		$this->db->where('type_code',$arr['type_code']);
		$num = $this->db->count_all_results('category_type');
		// $query = $this->db->get('category_type');
		// $data = $query->num_rows();
		if($num > 0){
			return false;
		}
		else{
			$this->db->insert('category_type',$arr);
			$insert_id = $this->db->insert_id();
			$arr["type_id"] = $insert_id;
			return $arr;
		}
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
	// xóa:
	function delete($id){
		$this->db->where('type_id', $id);
		$this->db->delete('category_type');
	}
}
?>