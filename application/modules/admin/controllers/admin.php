<?php
class Admin extends CI_Controller{
	protected $_user_account = '';
	protected $_user_image = '';
	protected $_data;
	// hàm được gọi đầu tiên:
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_admin');
		
		$this->_data['user_account'] = $this->session->userdata('user_name');			
		$this->_data['user_image'] = $this->session->userdata('user_image');
		// echo CI_VERSION;
	}
	public function index(){
		$session_name = $this->session->userdata('email');
		if ($session_name) {	
			redirect(base_url().'admin/dashboard');
			return true;
		} 
		else {
			$this->load->view('login');						
		}
	}
	public function auth_user() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		// echo $email;
		// echo $password;
		// die;
		$result = $this->mod_admin->mod_check_user($email, $password);
		if($result[1] == 0){
			$this->_data['error'] = 'Tài khoản hoặc mật khẩu không đúng !';
			$this->load->view('login', $this->_data);	
		}
		else{
			$session = array(
				'email' => $result[0]['email'],
				'user_role' => $result[0]['user_role'],
				'status' => $result[0]['status'],
				'user_name' => $result[0]['user_name'],
				'user_image' => $result[0]['user_image'],
				'password' => $password
			);
			// gán session:
			$this->session->set_userdata($session);
			$this->_user_account = $result[0]['user_name'];
			$this->_user_image = $result[0]['user_image'];
			// $this->dashboard();
			redirect(base_url().'admin/dashboard');
			
		}
	}
	public function dashboard(){
		is_login();
		$this->_data['content'] = 'index';
		$this->_data['title_page'] = 'Dashboard';
		$this->_data['title'] = 'Dashboard';
		$this->_data['role'] = $_SESSION['user_role'];
		$this->load->view('template_backend', $this->_data);
	}
	// đăng xuất:
	public function login(){
		$this->_data['error'] = '';
		$this->session->sess_destroy();
		$this->load->view('login', $this->_data);
	}	
}
?>