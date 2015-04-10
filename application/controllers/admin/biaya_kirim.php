<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Biaya_kirim extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('biaya_kirim_m'));
		$this->load->library(array('simpliparse','pquery','form_validation'));
		$this->load->library('fungsi');
		$this->load->helper('html');
	}
	function index(){
		if($this->input->post('txtCari'))
			$this->session->set_userdata('sesicari_biaya_kirim', $this->input->post('txtCari'));
		else
			$this->session->set_userdata('sesicari_biaya_kirim','');
		$this->browse();
	}
	function browse(){
		$this->load->library('pagination');
		$data['no'] = $this->uri->segment(4, 0);
		// $data['total_page']	= $this->biaya_kirim_m->CountGetAll_adm();
		$data['total_rows'] = $this->db->count_all('biaya_kirim');
		$perpage	= 10;
		$this->pagination->initialize($data);
		$data["browse_biaya_kirim"] = $this->biaya_kirim_m->getAll($data['no'],$perpage);
		$data['title'] = 'Biaya Pengiriman Barang';
		$data['main'] = 'admin/tbiaya_kirim_v';
		$this->load->view('admin/main_v', $data);
	}
	function add()
	{
		$data['main'] = 'admin/ibiaya_kirim_v';
		$this->load->view('admin/main_v', $data);
	}
	function edit()
	{
		$data['detail_biaya_kirim'] = $this->biaya_kirim_m->getOne($this->uri->segment(4));
		$data['main'] = 'admin/ebiaya_kirim_v';
		$this->load->view('admin/main_v', $data);
	}
	function save(){
		$config = array(
				array(
					  'field'   => 'nm_kota',
					  'label'   => 'Nama Kota',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'biaya_krm',
					  'label'   => 'Biaya Pengiriman',
					  'rules'   => 'required'
				   )
				);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->add();		
		}else{
			$this->biaya_kirim_m->save();
			redirect('admin/biaya_kirim/browse', 'refresh');
		}
	}
	function update(){
		$nm_foto = $this->biaya_kirim_m->do_upload('foto');
		$this->biaya_kirim_m->update($nm_foto);
		redirect('admin/biaya_kirim/browse', 'refresh');
	}
	function delete(){
		$this->biaya_kirim_m->delete($this->uri->segment(4));
		redirect('admin/biaya_kirim/browse', 'refresh');
	}
}
?>