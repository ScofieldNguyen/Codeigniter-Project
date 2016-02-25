<?php
class Muser extends CI_Model{
	private $_tab='user';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function listAllUser($numrow, $start){
		return $this->db->get($this->_tab, $numrow, $start)->result_array();
	}
	function countAll(){
		return $this->db->count_all($this->_tab);
	}
	function checkUser($name){
		$this->db->where('username', $name);
		$this->db->from("user");
		if ($this->db->count_all_results() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function insertUser(){
		$user['username'] = $this->input->post('txtuser');
		$user['password'] = $this->input->post('txtpass');
		$user['email'] = $this->input->post('txtemail');
		$user['level'] = $this->input->post('selectlevel');
		$this->db->insert('user', $user);
	}
	function deleteUser($id){
		$this->db->simple_query("delete from user where id='$id'");
	}
	function getUserByID($id){
		$this->db->where('id',$id);
		$q = $this->db->get('user');
		return $q->row_array();
	}
	function updateUserById($id, $info){
		if ($info['username'] != '') $this->db->set('username', $info['username']);
		if ($info['password'] != '') $this->db->set('password', $info['password']);
		if ($info['email'] != '') $this->db->set('email', $info['email']);
		if ($info['level'] != '') $this->db->set('level', $info['level']);
		$this->db->where('id', $id);
		$this->db->update('user');
	}
	function checkLogin($u, $p){
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		$q = $this->db->get($this->_tab);
		if ($q->num_rows() > 0){
			return $q->result_array();
		}else return FALSE;
	}
}
?>