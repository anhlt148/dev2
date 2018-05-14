<?php
class Admin_users extends CI_Controller{
	public $_data = array();
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_users');
		$this->_data['role'] = $_SESSION['user_role'];
		$this->_data['js_load'] = "users.js";
	}
	// index load:
	public function index(){		
		is_login();
		$this->_data['content'] = 'users_form';
		$this->_data['title_page'] = 'Quản lý tài khoản';
		$this->_data['title'] = 'Quản lý tài khoản';
		$this->load->view('template_backend', $this->_data);	
	}
	// load list ajax:
	public function grid(){
		is_login();
		$rs = $this->mod_users->get_list();
		$objReturn = array('result' => $rs, 'message' => "");
		echo json_encode($objReturn);
	}
	// thêm mới:
	public function add(){
		is_login();
		if (isset($_POST['data'])) {
			$arr = $_POST['data'];
			$row = $this->mod_users->insert($arr);
			if($row == false){
				$objReturn = array('result' => false, 'message' => "Danh mục đã tồn tại.");
			}
			else{
				$objReturn = array('result' => $row, 'message' => "");
			}
		}
		else {
			$objReturn = array('result' => false, 'message' => "Dữ liệu sai.");
		}
		echo json_encode($objReturn);
	}
	// Edit:
	public function edit(){		
		$id = $this->uri->segment(3);
		if($id == null || $id == ""){
			$objReturn = array('result' => false, 'message' => "Dữ liệu sai.");
		}
		else{
			$row = $this->mod_users->getItem($id);
			$objReturn = array('result' => $row, 'message' => "");
		}
		echo json_encode($objReturn);
	}
	// Update:
	public function update(){
		is_login();
		$id = $_GET["id"];
		if (isset($_POST['data'])) {
			$arr = $_POST['data'];
			$row = $this->mod_users->update_one($id, $arr);
			if($row == false){
				$objReturn = array('result' => false, 'message' => "Danh mục đã tồn tại.");
			}
			else{
				$objReturn = array('result' => $row, 'message' => "");
			}
		}
		else {
			$objReturn = array('result' => false, 'message' => "Dữ liệu sai.");
		}
		echo json_encode($objReturn);
	}
	// Delete:
	public function delete(){
		is_login();
		$id = $this->uri->segment(3);
		$rs = $this->mod_users->delete($id);	
		$objReturn = array('result' => $rs, 'message' => "");
		echo json_encode ($objReturn) ; 
	}
	// Delete multi:
	public function delete_multi(){
		is_login();
		if (isset($_POST['data'])) {
			$arr = explode(",",$_POST['data']);
			$row = $this->mod_users->del_multi($arr);
			if($row == true){
				$objReturn = array('result' => true, 'message' => "");
			}
			else{
				$objReturn = array('result' => false, 'message' => "Xóa không thành công.");
			}
		}
		else {
			$objReturn = array('result' => false, 'message' => "Dữ liệu sai.");
		}
		echo json_encode($objReturn);
	}
	// change status:
	public function change_status() {
		is_login();
		$id = $this->uri->segment(3);			
		$value = $this->uri->segment(4);	
		if($value == 'on'){
			$value = 'off';
		}
		else{
			$value = 'on';
		}
		$dataArr = array( 'status' => $value );
		$this->mod_users->update($dataArr, $id);	
		redirect(base_url().'admin_users');
	}
}
?>