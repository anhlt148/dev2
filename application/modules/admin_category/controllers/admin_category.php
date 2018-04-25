<?php
class Admin_category extends CI_Controller{
	protected $_role;	
	public $_data = array();

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');		
		$this->load->model('mod_category');
		$this->load->helper('language');
		
		// lấy gia trị trong session:
		$this->_role = $this->session->userdata();
		$this->_data['user_account'] = $this->_role['user_name'];
	}
	// danh sách:
	public function admin_category_list(){		
		$this->_data['data'] = $this->mod_category->mod_category_list();
		$this->_data['content'] = 'form_category_list';
		$this->_data['title_page'] = 'Danh mục sản phẩm';
		$this->load->view('template_admin',$this->_data);	
	}
	// thêm mới:
	public function admin_category_add(){
		$user_role = $this->_role['user_role'];
		if($user_role == 'owner' || $user_role == 'admin'){
			$this->_data['content'] = 'form_category_add';
			$this->_data['title_page'] = 'Thêm mới danh mục';
			$this->_data['error'] = '';			
			$this->load->view('template_admin', $this->_data);
		}	
		else{
			redirect(base_url().'admin_category/admin_category_list');
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
				$this->load->view('template_admin', $this->_data);
			}
			else{		
				$dataArr = array(
					'cate_name' => $name,
					'cate_status' => $status,
				);
				$statusInsert = $this->mod_category->mod_category_insert($dataArr);
				if($statusInsert != ''){
					redirect(base_url().'admin_category/admin_category_list?status=add');
				}
				else{
					$this->_data['error'] = 'Thêm mới thất bại';
					$this->load->view('template_admin', $this->_data);
				}
			}
		}	
		else{
			redirect(base_url().'admin_category/admin_category_list?status=notAllow');
		}
	}
	// sửa danh mục:
	public function admin_category_edit(){		
		if($this->_role['user_role'] == 'owner' || $this->_role['user_role'] == 'admin'){
			$id = $this->uri->segment(3);
			$this->_data['id'] = $id;
			$this->_data['content'] = 'form_category_edit';
			$this->_data['title_page'] = 'Sửa danh mục';
			$this->_data['error'] = '';	
			$this->_data['data'] = $this->mod_category->mod_category_get($id);
			$this->load->view('template_admin', $this->_data);
		}
		else{			
			redirect(base_url().'admin_category/admin_category_list?status=notAllow');
		}
	}
	// update thành viên:
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
				$this->load->view('template_admin', $this->_data);
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
	public function admin_category_delete(){
		$user_role = $this->_role['user_role'];	
		if($user_role == 'owner' || $user_role == 'admin'){
			$id = $this->uri->segment(3);
			$this->mod_category->mod_category_delete($id);	
			redirect(base_url().'admin_category/admin_category_list?status=delete');
		}
		else{
			redirect(base_url().'admin_category/admin_category_list?status=notAllow');
		}
	}
	// hàm thay đổi trạng thái:
	public function admin_category_change_status() {
		if($this->_role['user_role'] == 'owner' || $this->_role['user_role'] == 'admin'){
			$id = $this->uri->segment(3);			
			$current_val = $this->uri->segment(4);	
			if($current_val=='1'){
				$new_val = '0';
			}
			else if($current_val=='0'){
				$new_val = '1';
			}

			$dataArr = array(
				'cate_status' => $new_val
			);
			$this->mod_category->mod_category_update($dataArr, $id);	
			redirect(base_url().'admin_category/admin_category_list?status=edit');
		}
		else{
			redirect(base_url().'admin_category/admin_category_list?status=notAllow');
		}
	}
}
?>