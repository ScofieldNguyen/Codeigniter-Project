<?php
class MCate extends CI_Model{
	private $_table = "cate_news";
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function listAllCate($numrow, $start = 0){
		$q = $this->db->get($this->_table);
		return $q->result_array();
	}
	function deleteCate($id){
		$this->db->where('cate_id', $id);
		$this->db->delete($this->_table);
	}
	function listCateById($id){
		$this->db->where('cate_id', $id);
		$result = $this->db->get($this->_table);
		return $result->result_array();
	}
	function addCate($name, $parent){
		$cate = array(
			"cate_title" => $name,
			"cate_parent" => $parent
		);
		$this->db->insert($this->_table, $cate);
	}
}
?>