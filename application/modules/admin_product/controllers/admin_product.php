<?php
class Admin_product extends CI_Controller{
	protected $_data;
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form', 'language'));		
		$this->load->library(array('session', 'upload'));
		$this->load->model('mod_product');

		$this->_data['category_01'] = $this->mod_product->get_category_01();
		$this->_data['user_account'] = $this->session->userdata('user_name');			
		$this->_data['user_image'] = $this->session->userdata('user_image');
	}
	// Danh sach:
	function admin_product_list(){
		$total_rows = $this->mod_product->count_product();
		$per_page = 20;
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/admin_product/admin_product_list';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 5;
		$config['next_link'] = '>>>';
		$config['prev_link'] = '<<<';	
		$this->pagination->initialize($config);		
		$this->_data['pagination'] = $this->pagination->create_links();
		$offset = $this->uri->segment(3);
		
		$this->_data['content'] = 'form_product_list';
		$this->_data['data'] = $this->mod_product->get_list_product($per_page, $offset);
		$this->load->view('template_admin',$this->_data);	
	}	
	// Thêm mới:
	function admin_product_add(){
		$this->load->library('form_validation');
		$this->load->library('upload');				
		$this->_data['title_page'] = 'Thêm mới sản phẩm';
		$this->_data['content'] = 'form_product_add';
		$this->_data['error'] = '';	
		$this->form_validation->set_rules('prd_cate', 'prd_cate', 'required');//category
		if ($this->form_validation->run() == false){
			$this->load->view('template_admin',$this->_data);
		}
		else{			
			// Upload anh:
			$config['upload_path'] = './images/product';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_width'] = 1200;
			$config['max_height'] = 1100;
			$config['max_size'] = 3000;
			$this->upload->initialize($config);
			if($this->upload->do_upload('prd_image')){
				$img_upload = $this->upload->data();
				$dataArr = array(
					'prd_cate' => $this->input->post('prd_cate'),//category
					'prd_code' => $this->input->post('prd_code'),
					'prd_name' => $this->input->post('prd_name'),
					'prd_status' => $this->input->post('prd_status'),
					'prd_price' => $this->input->post('prd_price'),
					'prd_vat' => $this->input->post('prd_vat'),
					'prd_number' => $this->input->post('prd_number'),
					'prd_made_in' => $this->input->post('prd_made_in'),
					'prd_brand' => $this->input->post('prd_brand'),
					'prd_description' => $this->input->post('prd_description'),
					'prd_modified_date' => date('Y-m-d'),
					'prd_image' => $img_upload['file_name'],
				);
				$this->mod_product->insert($dataArr);
				redirect(base_url().'admin_product/admin_product_list');
			}	
			else{
				$this->_data['error'] = $this->upload->display_error();
				$this->load->view('template_admin',$this->_data);
			}
		}
	}
	// Sửa:
	function admin_product_edit($id_sp){
		
		$this->load->library(array('form_validation','upload'));
		$this->_data['get_sp'] = $this->mod_product->get_sp($id_sp);		
		$this->_data['content'] = 'form_product_edit';
		$this->_data['error'] = '';	
		//$this->load->view('template',$this->_data);
		
		$this->form_validation->set_rules('category', 'category', 'required');//category
		$this->form_validation->set_rules('ten_sp', 'ten_sp', 'required');
		$this->form_validation->set_rules('id_dm', 'id_dm', 'required');
		$this->form_validation->set_rules('gia_sp', 'gia_sp', 'required');
		$this->form_validation->set_message('required','<span>(*)<span>');
		
		if ($this->form_validation->run() == FALSE){						
			$this->load->view('template',$this->_data);
		}
		else{				
			if($_FILES['anh_sp']['name'] == ''){				
				$anh_sp = $this->input->post('anh_sp');
				//echo $anh_sp;die;
				$dataArr = array(
					'category' => $this->input->post('category'),//category
					'ten_sp' => $this->input->post('ten_sp'),
					'id_dm' => $this->input->post('id_dm'),
					'man_hinh' => $this->input->post('man_hinh'),//man_hinh
					'phan_giai_mh' => $this->input->post('phan_giai_mh'),//phan_giai_mh
					'cpu' => $this->input->post('cpu'),//cpu
					'ram' => $this->input->post('ram'),//ram
					'rom' => $this->input->post('rom'),//rom
					'camera' => $this->input->post('camera'),//camera
					'pin' => $this->input->post('pin'),//pin
					'gia_sp' => $this->input->post('gia_sp'),
					'bao_hanh' => $this->input->post('bao_hanh'),
					'phu_kien' => $this->input->post('phu_kien'),
					'tinh_trang' => $this->input->post('tinh_trang'),
					'khuyen_mai' => $this->input->post('khuyen_mai'),
					'trang_thai' => $this->input->post('trang_thai'),
					'dac_biet' => $this->input->post('dac_biet'),
					'chi_tiet_sp' => $this->input->post('chi_tiet_sp')
				);
				$this->mod_product->update_sp($dataArr,$id_sp);
				redirect(base_url().'admin_product/sanpham/');			
			}
			else{
				
				// Upload anh:
				$config['upload_path'] = './anh';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_width'] = 900;
				$config['max_height'] = 900;
				$config['max_size'] = '2000';
				$this->upload->initialize($config);
							
				if($this->upload->do_upload('anh_sp')){
					$img_upload = $this->upload->data();
					$anh_sp = $img_upload['file_name'];
					$dataArr = array(
						'ten_sp' => $this->input->post('ten_sp'),
						'anh_sp' => $anh_sp,
						'id_dm' => $this->input->post('id_dm'),
						'category' => $this->input->post('category'),//category
						'man_hinh' => $this->input->post('man_hinh'),//man_hinh
						'phan_giai_mh' => $this->input->post('phan_giai_mh'),//phan_giai_mh
						'cpu' => $this->input->post('cpu'),//cpu
						'ram' => $this->input->post('ram'),//ram
						'rom' => $this->input->post('rom'),//rom
						'camera' => $this->input->post('camera'),//camera
						'pin' => $this->input->post('pin'),//pin
						'gia_sp' => $this->input->post('gia_sp'),
						'bao_hanh' => $this->input->post('bao_hanh'),
						'phu_kien' => $this->input->post('phu_kien'),
						'tinh_trang' => $this->input->post('tinh_trang'),
						'khuyen_mai' => $this->input->post('khuyen_mai'),
						'trang_thai' => $this->input->post('trang_thai'),
						'dac_biet' => $this->input->post('dac_biet'),
						'chi_tiet_sp' => $this->input->post('chi_tiet_sp')
					);
					$this->mod_product->update_sp($dataArr,$id_sp);
					redirect(base_url().'admin_product/sanpham/');	
				}
				else{
					$this->_data['error'] = 'Không upload được ảnh mô tả !';	
					$this->load->view('template',$this->_data);
				}				
			}	
		}
	}
	// Xóa:
	function admin_product_delete($id_sp){
		$this->mod_product->delete_sp($id_sp);
		redirect(base_url().'admin_product/sanpham/');
	}
}
?>