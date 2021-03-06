<?php
class Admin_category extends CI_Controller{
	public $_data = array();
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_category');
		$this->load->model('admin_category_type/mod_category_type');
		$this->_data['role'] = $_SESSION['user_role'];
		$this->_data['js_load'] = "category.js";
	}
	// danh sách:
	public function grid(){		
		is_login();
		$this->_data['data'] = $this->mod_category->get_list();
		$this->_data['cate_type'] = $this->mod_category_type->get_list(true);
		$this->_data['content'] = 'category_form';
		$this->_data['title_page'] = 'Danh mục';
		$this->_data['title'] = 'Danh mục';
		$this->load->view('template_backend', $this->_data);	
	}
	// load list ajax:
	public function load_list(){
		is_login();
		$rs = $this->mod_category->get_list();
		$objReturn = array('result' => $rs, 'message' => "");
		echo json_encode($objReturn);
	}
	// thêm mới:
	public function add(){
		is_login();
		if (isset($_POST['data'])) {
			$arr = $_POST['data'];
			$row = $this->mod_category->insert($arr);
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
			$row = $this->mod_category->getItem($id);
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
			$row = $this->mod_category->update_one($id, $arr);
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
		$rs = $this->mod_category->delete($id);	
		$objReturn = array('result' => $rs, 'message' => "");
		echo json_encode ($objReturn) ; 
	}
	// Delete multi:
	public function delete_multi(){
		is_login();
		if (isset($_POST['data'])) {
			$arr = explode(",",$_POST['data']);
			$row = $this->mod_category->del_multi($arr);
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
		$dataArr = array( 'cate_status' => $value );
		$this->mod_category->update($dataArr, $id);	
		redirect(base_url().'admin_category/grid');
	}
}
?>