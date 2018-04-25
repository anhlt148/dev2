<?php
class Mod_member extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();	
	}
	// hàm kiểm tra tài khoản current có trong csdl hay ko:
	function mod_check_user($email, $password){
		$this->db->where('email', $email);	
		$this->db->where('password', $password);	
		$query = $this->db->get('users');
		$data = $query->row_array(); //  trả về 1 mảng 1 phần tử
		return $data;
	}
	// lấy danh sách thành viên:
	function mod_member_list(){
		$query = $this->db->get('users');
		$data = $query->result_array(); // trả về 1  mảng nhiều phần tử
		return $data;
	}
	// kiểm tra email thành viên thêm mới có trong csdl không:
	function mod_member_check($email){
		$this->db->where('email',$email);
		$query = $this->db->get('users');	
		$data = $query->num_rows();
		return $data;
	}
	// thêm mới thành viên:
	function mod_member_insert($data){
		$this->db->insert('users',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	// lấy thông tin 1 thành viên:
	function mod_member_get($id){
		$this->db->where('id', $id);	
		$query = $this->db->get('users');
		$data = $query->row_array();
		return $data;
	}
	// ham kiem tra thanh vien trùng khi sưa thành vien:
	function mod_member_check2($email, $id){		
		$this->db->where('email',$email);
		$this->db->where('id !=',$id);
		$query = $this->db->get('users');	
		$data = $query->num_rows();
		return $data;
	}
	// hàm cập nhật thành viên:
	function mod_member_update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data); 	
	}
	// xóa thành viên:
	function mod_member_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}
?>