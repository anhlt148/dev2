<?php
class Mod_category extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	// get list cate type:
	public function get_list(){
		$query = $this->db->get('category');
		return $query->result_array(); // trả về 1  mảng nhiều phần tử
	}
	// Thêm mới:
	public function insert($arr){
		$this->db->where('cate_code',$arr['cate_code']);
		$num = $this->db->count_all_results('category');
		if($num > 0){
			return false;
		}
		else{
			$this->db->insert('category',$arr);
			$insert_id = $this->db->insert_id();
			$arr["cate_id"] = $insert_id;
			return $arr;
		}
	}
	// Cập nhật:
	public function update_one($id, $arr){
		$this->db->where('cate_code', $arr['cate_code']);
		$this->db->where_not_in('cate_id', $id);
		$row = $this->db->count_all_results('category');
		if($row > 0){
			return false;
		}
		else{
			$this->db->where('cate_id', $id);
			$this->db->update('category', $arr);
			$arr["cate_id"] = $id;
			return $arr;
		}
	}
	// Get item record:
	public function getItem($id){
		$this->db->where('cate_id', $id);	
		$query = $this->db->get('category');
		$row = $query->row_array();
		return $row;
	}
	// ham kiem tra danh mục trùng khi sưa:
	public function mod_category_check2($value, $id){		
		$this->db->where('type_name',$value);
		$this->db->where('cate_id !=',$id);
		$query = $this->db->get('category');	
		$data = $query->num_rows();
		return $data;
	}
	// hàm cập nhật:
	public function update($data, $id){
		$this->db->where('cate_id', $id);
		$this->db->update('category', $data); 	
	}
	// xóa:
	public function delete($id){
		// lấy bản ghi cần xóa:
		$row = $this->getItem($id);
		// cập nhật những bản ghi liên quan:
		$update = array('cate_parent' => '' );
		$this->db->where('cate_parent', $row['cate_code']);
		$this->db->update('category', $update); 
		// xóa bản ghi cần xóa:
		$this->db->where('cate_id', $id);
		$this->db->delete('category');
		$row2 = $this->db->affected_rows();
		if($row2 > 0){
			return true;
		}
		else {
			return false;
		}
	}
	// xóa nhiều:
	public function del_multi($arr){
		if (!empty($arr)) {
			$this->db->where_in('cate_id', $arr);
			$this->db->delete('category');
			return true;
		}
		else{
			return false;
		}
	}
}
?>