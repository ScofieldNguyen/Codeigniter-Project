<?php
class User extends AdminController{
	public function __construct(){
		parent::__construct();
		$this->load->model("Muser");
	}
	public function index(){
		$this->_data['pageTitle']="Admin Page";
		$this->load->library('pagination');

		$config['base_url'] = base_url()."admin/user/index";
		$config['total_rows'] = $this->Muser->countAll();
		$config['per_page'] = 3;

		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$this->_data['page_link']=$this->pagination->create_links();

		$numrow=$config['per_page'];
		$start=$this->uri->segment(4);
		$this->_data['info']=$this->Muser->listAllUser($numrow, $start);

		$this->load->view($this->_data['path'], $this->_data);
	}
	public function add(){
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		$this->load->helper('url');

		$this->_data['pageTitle']="Add User";
		
		$this->form_validation->set_rules("txtuser", "Username", "required|callback_check_username");
		$this->form_validation->set_rules("txtpass", "Password", "required");
		$this->form_validation->set_rules("txtpass2", "Re-password", "required|matches[txtpass]");
		$this->form_validation->set_rules("txtemail", "Email", "required|valid_email");

		if ($this->form_validation->run()==FALSE){
			$this->load->view($this->_data['path'], $this->_data);
		}else{
			$this->Muser->insertUser();
			$this->session->set_flashdata('flash_mess', 'added');	///set thông báo quăng qua trang index
			redirect(base_url().'admin/user/index');
		}
	}
	public function edit(){
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		$this->load->helper('url');

		$this->load->model("Muser");
		$id = $this->uri->segment(4);
		$this->_data['info'] = $this->Muser->getUserByID($id);

		if ($this->input->post("txtuser") != $this->_data['info']['username']) 
			$this->form_validation->set_rules("txtuser", "Username", "required|callback_check_username");
		else {
			$this->form_validation->set_rules("txtuser", "Username", "required");
		}
		if ($this->input->post("txtpass") != ""){
			$this->form_validation->set_rules("txtpass", "Password", "required");
			$this->form_validation->set_rules("txtpass2", "Re-password", "matches[txtpass]");
		}
		$this->form_validation->set_rules("txtemail", "Email", "required|valid_email");

		$this->_data['pageTitle']="Edit User";
		if ($this->form_validation->run()==FALSE){
			$this->load->view($this->_data['path'], $this->_data);
		}else{
			$info = array (
				'username'	=>	$this->input->post('txtuser'),
				'password'	=>	$this->input->post('txtpass'),
				'email'		=>	$this->input->post('txtemail'),
				'level'		=>	$this->input->post('selectlevel'),
			);
			$this->Muser->updateUserById($id, $info);
			$this->session->set_flashdata('flash_mess', 'updated');
			redirect(base_url().'admin/user/index');
		}
	}
	public function check_username($name){
		if ($this->Muser->checkUser($name)==TRUE){
			return TRUE;
		}else{
			$this->form_validation->set_message("check_username", "Username has been registed");
			return FALSE;
		}
	}

	public function delete(){
		$id = $this->uri->segment(4);
		$this->Muser->deleteUser($id);
		$this->session->set_flashdata('flash_mess', 'deleted');
		redirect(base_url().'admin/user/index');
	}

}

?>