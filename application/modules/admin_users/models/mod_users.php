<?php
class Mod_users extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	// get list cate type:
	public function get_list(){
		$query = $this->db->get('users');
		return $query->result_array(); // trả về 1  mảng nhiều phần tử
	}
	// Thêm mới:
	public function insert($arr){
		$this->db->where('email',$arr['email']);
		$num = $this->db->count_all_results('users');
		if($num > 0){
			return false;
		}
		else{
			$this->db->insert('users',$arr);
			$insert_id = $this->db->insert_id();
			$arr["user_id"] = $insert_id;
			return $arr;
		}
	}
	// Cập nhật:
	public function update_one($id, $arr){
		$this->db->where('email', $arr['email']);
		$this->db->where_not_in('user_id', $id);
		$row = $this->db->count_all_results('users');
		if($row > 0){
			return false;
		}
		else{
			$this->db->where('user_id', $id);
			$this->db->update('users', $arr);
			$arr["user_id"] = $id;
			return $arr;
		}
	}
	// upload avatar:
	public function uploadAvatar($image){

		// $this->db->where('email', $arr['email']);
		// $this->db->where_not_in('user_id', $id);
		// $row = $this->db->count_all_results('users');
		// if($row > 0){
		// 	return false;
		// }
		// else{
		// 	$this->db->where('user_id', $id);
		// 	$this->db->update('users', $arr);
		// 	$arr["user_id"] = $id;
		// 	return $arr;
		// }
	}	
	// Get item record:
	public function getItem($id){
		$this->db->where('user_id', $id);	
		$query = $this->db->get('users');
		$row = $query->row_array();
		return $row;
	}
	// ham kiem tra danh mục trùng khi sưa:
	public function mod_users_check2($value, $id){		
		// $this->db->where('type_name',$value);
		$this->db->where('user_id !=',$id);
		$query = $this->db->get('users');	
		$data = $query->num_rows();
		return $data;
	}
	// hàm cập nhật:
	public function update($data, $id){
		$this->db->where('user_id', $id);
		$this->db->update('users', $data); 	
	}
	// xóa:
	public function delete($id){
		$this->db->where('user_id', $id);
		$this->db->delete('users');
		$row2 = $this->db->affected_rows();
		if($row2 > 0){
			return true;
		}
		else {
			return false;
		}
	}
	// xóa nhiều:
	public function del_multi($arr){
		if (!empty($arr)) {
			$this->db->where_in('user_id', $arr);
			$this->db->delete('users');
			return true;
		}
		else{
			return false;
		}
	}
}
?>