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
			$rs = $this->mod_category_type->insert($arr);
			if($rs == false){
				$objReturn = array('result' => false, 'message' => "Loại danh mục đã tồn tại");
			}
			else{
				$objReturn = array('result' => $rs, 'message' => "");
			}
			echo json_encode($objReturn); 
		}
		else {
			echo json_encode(array('result' => false, 'message' => "Dữ liệu sai"));
		}
	}
	// insert:
	public function admin_category_insert(){		
		$user_role = $this->_role['user_role'];
		if($user_role == 'owner' || $user_role == 'admin'){
			$this->_data['content'] = 'form_category_add';
			$this->_data['title_page'] = 'Thêm mới danh mục';
			$this->_data['error'] = '';			
			$name = $this->input->post('cate_name');
			$status = $this->input->post('cate_status');

			$valid = $this->mod_category->mod_category_check($name);

			if($valid > 0){
				$this->_data['valid'] = '(Tên danh mục đã tồn tại!)';
				$this->load->view('template_backend', $this->_data);
			}
			else{		
				$dataArr = array(
					'cate_name' => $name,
					'cate_status' => $status,
				);
				$statusInsert = $this->mod_category->mod_category_insert($dataArr);
				if($statusInsert != ''){
					redirect(base_url().'admin_category_type/admin_category_list?status=add');
				}
				else{
					$this->_data['error'] = 'Thêm mới thất bại';
					$this->load->view('template_backend', $this->_data);
				}
			}
		}	
		else{
			redirect(base_url().'admin_category_type/admin_category_list?status=notAllow');
		}
	}
	// Edit:
	public function edit(){		
		if($this->_role['user_role'] == 'owner' || $this->_role['user_role'] == 'admin'){
			$id = $this->uri->segment(3);
			$this->_data['id'] = $id;
			$this->_data['content'] = 'form_category_edit';
			$this->_data['title_page'] = 'Sửa danh mục';
			$this->_data['error'] = '';	
			$this->_data['data'] = $this->mod_category_type->mod_category_get($id);
			$this->load->view('template_backend', $this->_data);
		}
		else{			
			redirect(base_url().'admin_category_type/admin_category_list?status=notAllow');
		}
	}
	// Update:
	public function admin_category_update(){
		$user_role = $this->_role['user_role'];	
		if($user_role == 'owner' || $user_role == 'admin'){
			$id = $this->uri->segment(3);
			$this->_data['content'] = 'admin_category_edit';
			$this->_data['error'] = '';	

			$name = $this->input->post('cate_name');
			$status = $this->input->post('cate_status');


			$valid = $this->mod_category->mod_category_check2($name, $id);
			if($valid > 0){
				$this->_data['valid'] = 'Danh mục đã tồn tại!';
				$this->load->view('template_backend', $this->_data);
			}
			else{
				$dataArr = array(
					'cate_name' => $name,
					'cate_status' => $status,
				);
				$this->mod_category->mod_category_update($dataArr, $id);	
				redirect(base_url().'admin_category/admin_category_list?status=edit');
			}
		}
		else{
			redirect(base_url().'admin_category/admin_category_list?status=notAllow');
		}
	}
	// Delete:
	public function delete(){
		$id = $this->uri->segment(3);
		$this->mod_category_type->delete($id);	
		$rs = array('result' => true, 'message' => "");
		echo json_encode ($rs) ; 
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