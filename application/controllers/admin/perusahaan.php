<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Perusahaan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('perusahaan_m'));
		$this->load->library(array('form_validation'));
		$this->load->helper('html');
	}
	function index(){
		if($this->input->post('txtCari'))
			$this->session->set_userdata('sesicari_perusahaan', $this->input->post('txtCari'));
		else
			$this->session->set_userdata('sesicari_perusahaan','');
		$this->browse();
	}
	function browse(){
		$this->load->library('pagination');
		$data['no'] = $this->uri->segment(4, 0);
		$data['total_rows'] = $this->db->count_all('perusahaan');
		$perpage	= 10;
		$this->pagination->initialize($data);
		$data["detail_perusahaan"] = $this->perusahaan_m->getAll();
		$data['title'] = 'Data Perusahaan';
		$data['main'] = 'admin/tperusahaan_v';
		$this->load->view('admin/main_v', $data);
	}
	function add()
	{
		$data['main'] = 'admin/iperusahaan_v';
		$this->load->view('admin/main_v', $data);
	}
	function edit()
	{
		$data['detail_perusahaan'] = $this->perusahaan_m->getAll();
		$data['main'] = 'admin/eperusahaan_v';
		$this->load->view('admin/main_v', $data);
	}
	function save(){
		$config = array(
				array(
					  'field'   => 'nama_perus',
					  'label'   => 'Nama perusahaan',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'alamat_perus',
					  'label'   => 'Alamatperusahaan',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'no_telp',
					  'label'   => 'No. Telepon',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'email',
					  'label'   => 'eMail',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'bank',
					  'label'   => 'Nama Bank',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'atas_nm',
					  'label'   => 'Atas Nama Rekening Bank',
					  'rules'   => 'required'
				   )
				);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->edit();		
		}else{
			$this->perusahaan_m->insert();
			redirect('admin/perusahaan/browse', 'refresh');
		}
	}
	function delete(){
		$this->perusahaan_m->delete($this->uri->segment(4));
		$this->browse();
	}
}
?>