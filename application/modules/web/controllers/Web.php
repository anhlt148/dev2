<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller {
	protected $_data;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->model('mod_web');
		$this->_data['menu'] = 'form_menu';		

		// print_r(111);
		// die;
		
		// echo CI_VERSION;
	}	
	//-------------------------------PHẦN LOAD DÙNG CHUNG--------------------------------------
	// trang chủ:
	public function index(){
		$this->_data['content'] = 'form_home';		
		$this->load->view('template_frontend', $this->_data);
	}
	// trang giới thiệu:
	public function about(){
		$this->_data['content'] = 'form_about';			
		$this->load->view('template_frontend', $this->_data);	
	}
	// trang tiến hành vay:
	public function apply_for_loan(){
		$this->_data['content'] = 'form_apply_for_loan';
		$this->load->view('template_frontend', $this->_data);	
	}
	// trang thanh toán khoản vay:
	public function loan_repayment(){
		$this->_data['content'] = 'form_loan_repayment';
		$this->load->view('template_frontend', $this->_data);	
	}
	// trang liên hệ:
	public function contact_us(){
		$this->_data['content'] = 'form_contact_us';
		$this->load->view('template_frontend', $this->_data);	
	}
	// trang câu hỏi thường gặp:
	public function faq(){
		$this->_data['content'] = 'form_faq';
		$this->load->view('template_frontend', $this->_data);	
	}
}
?>