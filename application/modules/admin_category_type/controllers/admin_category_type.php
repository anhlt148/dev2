<?php
class Admin_category_type extends CI_Controller{
	public $_data = array();
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_category_type');
		$this->_data['role'] = $_SESSION['user_role'];
		$this->_data['js_load'] = "category_type.js";
	}
	// danh sách:
	public function grid(){		
		is_login();
		$this->_data['data'] = $this->mod_category_type->get_list();
		$this->_data['content'] = 'category_type_list';
		$this->_data['title_page'] = 'Loại danh mục';
		$this->_data['title'] = 'Loại danh mục';
		$this->load->view('template_backend', $this->_data);	
	}
	// thêm mới:
	public function add(){
		is_login();
		if (isset($_POST['data'])) {
			$arr = $_POST['data'];
			$row = $this->mod_category_type->insert($arr);
			if($row == false){
				$objReturn = array('result' => false, 'message' => "Loại danh mục đã tồn tại");
			}
			else{
				$objReturn = array('result' => $row, 'message' => "");
			}
			echo json_encode($objReturn); 
		}
		else {
			$objReturn = array('result' => false, 'message' => $_POST['data']);
			echo json_encode($objReturn);
		}
	}
	// Edit:
	public function edit(){		
		$id = $this->uri->segment(3);
		if($id == null || $id == ""){
			echo json_encode(array('result' => false, 'message' => "Dữ liệu sai"));
		}
		else{
			$row = $this->mod_category_type->getItem($id);
			echo json_encode(array('result' => $row, 'message' => ""));
		}
	}
	// Update:
	public function update(){
		is_login();
		$id = $_GET["id"];
		if (isset($_POST['data'])) {
			$arr = $_POST['data'];
			$row = $this->mod_category_type->update_one($id, $arr);
			if($row == false){
				echo json_encode(array('result' => false, 'message' => "Loại danh mục đã tồn tại")); 
			}
			else{
				echo json_encode(array('result' => $row, 'message' => "")); 
			}
		}
		else {
			echo json_encode(array('result' => false, 'message' => "Dữ liệu sai"));
		}
	}
	// Delete:
	public function delete(){
		$id = $this->uri->segment(3);
		$this->mod_category_type->delete($id);	
		$rs = array('result' => true, 'message' => "");
		echo json_encode ($rs) ; 
	}
	// Delete multi:
	public function delete_multi(){
		is_login();
		if (isset($_POST['data'])) {
			$arr = explode(",",$_POST['data']);
			$row = $this->mod_category_type->del_multi($arr);
			if($row == true){
				echo json_encode(array('result' => true, 'message' => "")); 
			}
			else{
				echo json_encode(array('result' => false, 'message' => "Xóa không thành công.")); 
			}
		}
		else {
			echo json_encode(array('result' => false, 'message' => "Dữ liệu sai"));
		}
		
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
		$dataArr = array( 'type_status' => $value );
		$this->mod_category_type->update($dataArr, $id);	
		redirect(base_url().'admin_category_type/grid');
	}
}
?>