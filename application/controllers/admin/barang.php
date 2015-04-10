<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Barang extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('kategori_m','barang_m'));
		$this->load->library(array('simpliparse','pquery','form_validation','pagination'));
		$this->load->library('fungsi');
		$this->load->helper('html');
	}
	function index(){
		if($this->input->post('txtCari'))
			$this->session->set_userdata('sesicari_barang', $this->input->post('txtCari'));
		else
			$this->session->set_userdata('sesicari_barang','');
		$this->browse();
	}
	function laporan(){
		$data['base_url'] = base_url().'admin/barang/laporan';
		$data['no'] = $this->uri->segment(4, 0);
		/*$data['total_rows'] = $this->barang_m->CountGetAll_adm();*/
		$data['total_rows'] = $this->db->count_all('barang');
		$data['perpage'] = 10;
		$this->pagination->initialize($data);
		$data["browse_barang"] = $this->barang_m->getAll_adm($data['no'],$data['perpage']);
		$data['title'] = 'Laporan Data Barang';
		$data['main'] = 'admin/cbarang_v';
		$this->load->view('admin/main_v', $data);
	}
	function browse(){
		$data['base_url'] = base_url().'admin/barang/browse';
		$data['no'] = $this->uri->segment(4, 0);
		/*$data['total_rows'] = $this->barang_m->CountGetAll_adm();*/
		$data['total_rows'] = $this->db->count_all('barang');
		$data['perpage'] = 10;
		$this->pagination->initialize($data);
		$data["browse_barang"] = $this->barang_m->getAll_adm($data['no'],$data['perpage']);
		$data['title'] = 'Daftar Data Barang';
		$data['main'] = 'admin/tbarang_v';
		$this->load->view('admin/main_v', $data);
	}
	function add()
	{
		$data['browse_kategori'] = $this->kategori_m->getAll();
		$data['main'] = 'admin/ibarang_v';
		$this->load->view('admin/main_v', $data);
	}
	function edit()
	{
		$data['browse_kategori'] = $this->kategori_m->getAll();
		$data['detail_barang'] = $this->barang_m->getOne($this->uri->segment(4));
		$data['main'] = 'admin/ebarang_v';
		$this->load->view('admin/main_v', $data);
	}
	function save(){
		$config = array(
				array(
					  'field'   => 'kd_ktgr',
					  'label'   => 'Kode Kategori',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'nm_brg',
					  'label'   => 'Nama Barang',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'bahan',
					  'label'   => 'Bahan',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'ukuran',
					  'label'   => 'Ukuran',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'harga',
					  'label'   => 'Harga',
					  'rules'   => 'required'
				   ),
				array(
					  'field'   => 'stok',
					  'label'   => 'Stok',
					  'rules'   => 'required'
				   )
				 );
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->add();		
		}else{
			$nm_foto = $this->barang_m->do_upload('nama_field');
			$this->barang_m->insert($nm_foto);
			redirect('admin/barang/browse', 'refresh');
		}
	}
	function update(){
		/*$nm_foto = $this->barang_m->do_upload('foto');
		$this->barang_m->update($nm_foto);
		redirect('admin/barang/browse', 'refresh');*/
	}
	function delete(){
		$this->barang_m->delete($this->uri->segment(4));
		redirect('admin/barang/browse','refresh');
	}
	/*function browse(){
		$this->load->library('pagination');
	
		$data['base_url'] = base_url().'index.php/admin/barang/browse';
		$data['total_rows'] = $this->barang_m->CountGetThumbs();
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_barang'] = $this->barang_m->getThumbs_adm($data['per_page'],$this->uri->segment(4,0));

		$data['total_rows'] = $this->db->count_all('barang');
		$data['title'] = 'Katalog barang';
		$data['main'] = 'admin/tbarang_v';
		$this->load->view('admin/main_v', $data);
	}*/
}
?>