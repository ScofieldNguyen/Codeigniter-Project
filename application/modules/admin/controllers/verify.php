<?php
class Verify extends AdminController{
	public function __construct(){
		parent::__construct();
	}
	public function login(){
		$this->_data['pageTitle'] = "Login page";
		$this->load->model('Muser');
		if ($this->input->post('ok')){
			$userdata = $this->Muser->checkLogin($this->input->post('txtname'), $this->input->post('txtpass'));
			if ($userdata != FALSE){
				$user = array(
					'username'	=>	$userdata[0]['username'],
					'level'		=>	$userdata[0]['level'],
					'email'		=>	$userdata[0]['id']
				);
				$this->session->set_userdata($user);
				redirect(base_url()."admin/user/index");
				// echo "<pre>";
				// print_r($userdata);
				// echo "</pre>";
			}else{
				$this->_data['error'] = 'Wrong username or password';
			}
		}
		$this->load->view($this->_data['path'], $this->_data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."admin/verify/login");
	}
}
?>