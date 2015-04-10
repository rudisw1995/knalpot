<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Barang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(array('barang_m'));
		$this->load->library(array('pagination'));
		$this->load->helper(array('html','global'));
		$this->load->library('pquery');
	}
	function index(){
		/*$data['base_url'] = base_url().'index.php/main/index/Katalogbarang';
		$data['total_rows'] = $this->barang_m->CountGetThumbs();
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_thumbs'] = $this->barang_m->getThumbs($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'home_v';
		$this->load->view('main_v', $data);*/
	}
	function search_first(){
		$this->session->set_userdata('sesi_generalsearch', $this->input->post('txt_general'));
		$this->general_search();
	}
	function general_search(){
		$data['title'] = 'Hasil Pencarian Dengan Kata Kunci '.$this->session->userdata('sesi_generalsearch');
		$data['base_url'] = base_url().'barang/browse_perkategori/ecommerce';
		$data['total_rows'] = $this->barang_m->count_general_search();
		$data['per_page'] = 12;
		$this->pagination->initialize($data);
		$data['browse_hasil'] = $this->barang_m->general_search($data['per_page'],$this->uri->segment(4,0));
		// echo $this->db->last_query();
		$data['main'] = 'tresultsearch_v';
		$this->load->view('main_v', $data);
	}
	function carabeli(){
		$data['title'] = 'Cara Pembelian';
		$data['main'] = 'tcarabeli_v';
		$this->load->view('main_v', $data);
	}
	function detail(){
		$data['title'] = str_replace('%20','-',$this->uri->segment(5,0));
		// $data['browse_related'] = $this->barang_m->related($this->uri->segment(4,0));
		$data['detail_barang'] = $this->barang_m->getOne($this->uri->segment(4,0));
		$data['main'] = 'tdbarang_v';
		$this->load->view('main_v', $data);
	}
	function perkategori(){
		$arsesi = array(
			'sesi_namakategori' => $this->uri->segment(4,0),
			'sesi_kategori' => $this->uri->segment(3,0),
		);
		$this->session->set_userdata($arsesi);
		redirect('barang/browse_perkategori', 'refresh');
	}
	function browse_perkategori(){
		if($this->session->userdata('sesi_kategori') == false){
			redirect(base_url(),'redirect');
			return false;
		}	
		$data['title'] = str_replace('%20',' ',$this->session->userdata('sesi_namakategori'));
		$data['base_url'] = base_url().'barang/browse_perkategori/ecommerce';
		$data['total_rows'] = $this->barang_m->CountThumbsCategory();
		$data['per_page'] = 12;
		$this->pagination->initialize($data);
		$data['browse_perkategori'] = $this->barang_m->getThumbsCategory($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'tbarangkategori_v';
		$this->load->view('main_v', $data);
	}
}
?>