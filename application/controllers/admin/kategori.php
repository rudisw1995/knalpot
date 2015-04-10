<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('kategori_m'));
		$this->load->library(array('simpliparse','pquery','form_validation'));
		$this->load->library('fungsi');
		$this->load->helper('html');
	}
	function index(){
		if($this->input->post('txtCari'))
			$this->session->set_userdata('sesicari_kategori', $this->input->post('txtCari'));
		else
			$this->session->set_userdata('sesicari_kategori','');
		$this->browse();
	}
	function browse(){
		$this->load->library('pagination');
		$data['no'] = $this->uri->segment(4, 0);
		// $data['total_page']	= $this->kategori_m->CountGetAll_adm();
		$data['total_rows'] = $this->db->count_all('kategori');
		$perpage	= 10;
		$this->pagination->initialize($data);
		$data["browse_kategori"] = $this->kategori_m->getAll($data['no'],$perpage);
		$data['title'] = 'Kategori Barang';
		$data['main'] = 'admin/tkategori_v';
		$this->load->view('admin/main_v', $data);
	}
	function add()
	{
		$data['main'] = 'admin/ikategori_v';
		$this->load->view('admin/main_v', $data);
	}
	function edit()
	{
		$data['detail_kategori'] = $this->kategori_m->getOne($this->uri->segment(4));
		$data['main'] = 'admin/ekategori_v';
		$this->load->view('admin/main_v', $data);
	}
	function save(){
		$config = array(
				array(
					  'field'   => 'nm_ktgr',
					  'label'   => 'Nama Kategori',
					  'rules'   => 'required'
				   )
				);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->add();		
		}else{
			$this->kategori_m->insert();
			redirect('admin/kategori/browse', 'refresh');
		}
	}
	function update(){
		$nm_foto = $this->kategori_m->do_upload('foto');
		$this->kategori_m->update($nm_foto);
		redirect('admin/kategori/browse', 'refresh');
	}
	function delete(){
		$this->kategori_m->delete($this->uri->segment(4));
		$this->browse();
	}
}
?>