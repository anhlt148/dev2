<?php
class Admin_member extends CI_Controller{
	protected $_role;	
	protected $_data = array();

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');		
		$this->load->model('mod_member');
		$this->load->helper('language');
		$this->load->library('upload');

		// lấy gia trị trong session:
		$this->_role = $this->session->userdata();
		$this->_data['user_account'] = $this->_role['user_name'];
		$this->_data['user_image'] = $this->session->userdata('user_image');
	}
	// danh sách thành viên:
	public function admin_member_list(){
		$this->_data['data'] = $this->mod_member->mod_member_list();
		$this->_data['content'] = 'form_member_list';
		$this->_data['title_page'] = 'Danh sách thành viên';
		$this->load->view('template_admin',$this->_data);	
	}
	// thêm mới thành viên:
	public function admin_member_add(){		
		$user_role = $this->_role['user_role'];
		if($user_role == 'owner' || $user_role == 'admin'){
			$this->_data['content'] = 'form_member_add';
			$this->_data['title_page'] = 'Thêm mới thành viên';
			$this->_data['error'] = '';			
			$name = $this->input->post('user_name');
			if($name == ''){
				$this->load->view('template_admin', $this->_data);
			}
			else{
				$email = $this->input->post('email');
				$pass = $this->input->post('password');
				$role = $this->input->post('user_role');
				$status = $this->input->post('status');
				$avatar = $this->input->post('user_image');
				$member_valid = $this->mod_member->mod_member_check($email);
				if($member_valid > 0){
					$this->_data['emailValid'] = '(Email đã tồn tại!)';
					$this->load->view('template_admin', $this->_data);
				}
				else{		
					// Upload ảnh:
					$config['upload_path'] = './images/avatars';
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['max_width'] = 1000;
					$config['max_height'] = 1000;
					$config['max_size'] = 3000;
					$this->upload->initialize($config);
					$field_name = "user_image";
					if(!$this->upload->do_upload($field_name)){
						$this->_data['error'] = $this->upload->display_errors();
						$this->load->view('template_admin', $this->_data);
					}
					else{
						$upload_data = $this->upload->data();
						$dataArr = array(
							'user_name' => $name,
							'password' => $pass,
							'email' => $email,
							'user_role' => $role,
							'status' => $status,
							'user_image' => $upload_data['file_name']
						);
						$statusInsert = $this->mod_member->mod_member_insert($dataArr);
						if($statusInsert != ''){
							redirect(base_url().'admin_member/admin_member_list?status=add');
						}
						else{
							$this->_data['error'] = 'Thêm mới thất bại';
							$this->load->view('template_admin', $this->_data);
						}
					}
				}
			}
		}	
		else{
			redirect(base_url().'admin_member/admin_member_list?status=notAllow');
		}
	}
	// sửa thành viên:
	public function admin_member_edit(){
		$user_role = $this->_role['user_role'];	
		if($user_role == 'owner' || $user_role == 'admin'){
			$id = $this->uri->segment(3);
			$this->_data['title_page'] = 'Sửa thành viên';
			$this->_data['content'] = 'form_member_edit';
			$this->_data['error'] = '';	
			if ($id == 1) {
				redirect(base_url().'admin_member/admin_member_list?status=notEdit');
			} 
			else {
				$name = $this->input->post('user_name');
				if($name == ''){
					$this->_data['id'] = $id;
					$this->_data['data'] = $this->mod_member->mod_member_get($id);
					$this->load->view('template_admin', $this->_data);
				}
				else{
					$email = $this->input->post('email');
					$emailValid = $this->mod_member->mod_member_check2($email, $id);
					if($emailValid > 0){
						$this->_data['emailValid'] = 'Tài khoản đã tồn tại!';
						$this->load->view('template_admin', $this->_data);
					}
					else{
						// Upload ảnh:
						$config['upload_path'] = './images/avatars';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_width'] = 1000;
						$config['max_height'] = 1000;
						$config['max_size'] = 3000;
						$this->upload->initialize($config);
						if(!$this->upload->do_upload('user_image')){
							// upload khong co ảnh:
							$email = $this->input->post('email');
							$role = $this->input->post('user_role');
							$status = $this->input->post('status');
							$dataArr = array(
								'user_name' => $name,
								'email' => $email,
								'user_role' => $role,
								'status' => $status,
							);
						}
						else{
							$email = $this->input->post('email');
							$role = $this->input->post('user_role');
							$status = $this->input->post('status');
							// upload có ảnh:
							$upload_data = $this->upload->data();
							$dataArr = array(
								'user_name' => $name,
								'email' => $email,
								'user_role' => $role,
								'status' => $status,
								'user_image' => $upload_data['file_name']
							);
						}				
						$this->mod_member->mod_member_update($dataArr, $id);
						redirect(base_url().'admin_member/admin_member_list?status=edit');
					}
				}
			}
		}
		else{			
			redirect(base_url().'admin_member/admin_member_list?status=notAllow');
		}
	}
	// Del thanhvien:
	public function admin_member_delete(){
		$user_role = $this->_role['user_role'];	
		if($user_role == 'owner' || $user_role == 'admin'){
			$id = $this->uri->segment(3);
			if($id == 1){
				redirect(base_url().'admin_member/admin_member_list');
			}
			else{
				$this->mod_member->mod_member_delete($id);	
				redirect(base_url().'admin_member/admin_member_list?status=delete');
			}
		}
		else{
			redirect(base_url().'admin_member/admin_member_list');
		}
	}
	// hàm thay đổi trạng thái:
	public function admin_member_change_status() {
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
				'status' => $new_val
			);
			$this->mod_member->mod_member_update($dataArr, $id);	
			redirect(base_url().'admin_member/admin_member_list?status=edit');
		}
		else{
			redirect(base_url().'admin_member/admin_member_list?status=notAllow');
		}
	}
}
?>