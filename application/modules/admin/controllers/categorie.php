<?php
class Categorie extends AdminController{
	public function __construct(){
		parent::__construct();
		$this->load->model("Mcate");
	}
	public function index(){
		$this->load->helper('callcate');
		$this->_data['pageTitle']="Categorie list";
		$this->_data['info']=$this->Mcate->listAllCate(0, 0);
		$this->load->view($this->_data['path'], $this->_data);
	}
	public function del(){
		$id = $this->input->post("id");
		$this->Mcate->deleteCate($id);
		echo "deleted successfully!";
	}
	public function add(){
		$name = $this->input->post("name");
		$parent = $this->input->post("parent");
		$this->load->model("Mcate");
		$this->Mcate->addCate($name, $parent);
		echo "added successfully!";
	}
	public function reload(){
		$this->load->helper('callcate');
		$this->_data['info']=$this->Mcate->listAllCate(0, 0);
		$this->load->view("admin/categorie/reload_view.php", $this->_data);
	}
	public function edit(){
		$this->load->helper('callcate');
		$id = $this->uri->segment(4);
		$this->_data['pageTitle'] = "Edit Categorie";
		$this->_data['info'] = $this->Mcate->listCateById($id);
		$this->_data['cate_data'] = $this->Mcate->listAllCate(0);
		$this->load->view($this->_data['path'], $this->_data);
	}
}
?>