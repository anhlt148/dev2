<?php
class Mod_category_type extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	// get list cate type:
	public function get_list($on){
		if(isset($on) && $on == true){
			$this->db->where('type_status', 'on');
		}
		$query = $this->db->get('category_type');
		return $query->result_array(); // trả về 1  mảng nhiều phần tử
	}
	// kiểm tra danh muc cần thêm mới có trong csdl không:
	public function insert($arr){
		$this->db->where('type_code',$arr['type_code']);
		$num = $this->db->count_all_results('category_type');
		// $query = $this->db->get('category_type');
		// $data = $query->num_rows();
		if($num > 0){
			return false;
		}
		else{
			$this->db->insert('category_type',$arr);
			$insert_id = $this->db->insert_id();
			$arr["type_id"] = $insert_id;
			return $arr;
		}
	}
	
	// kiểm tra danh muc cần thêm mới có trong csdl không:
	public function update_one($id, $arr){
		$this->db->where('type_code', $arr['type_code']);
		$this->db->where_not_in('type_id', $id);
		$row = $this->db->count_all_results('category_type');
		if($row > 0){
			return false;
		}
		else{
			$this->db->where('type_id', $id);
			$this->db->update('category_type', $arr);
			$arr["type_id"] = $id;
			return $arr;
		}
	}

	// thêm mới:
	public function mod_category_insert($data){
		$this->db->insert('category_type',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	// lấy thông tin 1 item:
	public function getItem($id){
		$this->db->where('type_id', $id);	
		$query = $this->db->get('category_type');
		$row = $query->first_row();
		return $row;
	}

	// ham kiem tra danh mục trùng khi sưa:
	public function mod_category_check2($value, $id){		
		$this->db->where('type_name',$value);
		$this->db->where('type_id !=',$id);
		$query = $this->db->get('category_type');	
		$data = $query->num_rows();
		return $data;
	}
	// hàm cập nhật:
	public function update($data, $id){
		$this->db->where('type_id', $id);
		$this->db->update('category_type', $data); 	
	}
	// xóa:
	public function delete($id){
		$this->db->where('type_id', $id);
		$this->db->delete('category_type');
	}
	// xóa:
	public function del_multi($arr){
		if (!empty($arr)) {
			$this->db->where_in('type_id', $arr);
			$this->db->delete('category_type');
			return true;
		}
		else{
			return false;
		}
	}
}
?>