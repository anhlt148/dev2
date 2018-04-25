<?php
class Mod_admin extends CI_Model{
	function __construct(){
		parent::__construct();
	}	
	// hàm kiểm tra tài khoản có trong csdl hay ko:
	function mod_check_user($email, $password){
		$this->db->select('email, user_name, user_role, status, user_image');
		$this->db->where("(email='$email' OR user_name='$email')");	
		$this->db->where('password', $password);	
		$rs = $this->db->get('users');
		
		return array($rs->row_array(), $rs->num_rows());
	}
}
?>