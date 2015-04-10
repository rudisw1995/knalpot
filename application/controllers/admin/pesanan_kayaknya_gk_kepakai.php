<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pesanan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('cart','pagination','pquery'));
		$this->load->model(array('pesanan_m','pemesan_m'));
		$this->load->helper('global');
	}
	function index(){
		$this->browse();
	}
	function browse(){
		$data['title'] = 'Daftar pesanan';
		$data['no'] = $this->uri->segment(4,0);
		$data['base_url'] = base_url().'index.php/main/index/KatalogBatik';
		$data['total_rows'] = $this->pesanan_m->countAll();
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_pesanan'] = $this->pesanan_m->getAll($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'admin/tpesanan_v';
		$this->load->view('admin/main_v', $data);
	}
	function delete(){
		$data = array(
			'rowid' => $this->uri->segment(3),
			'qty'	=> '0',
			'price'	=> '0',
			'name'	=> '',
			'options' => ''
		);
		$this->cart->update($data);
		redirect('pesanan/browse','refresh');
	}
	function detail(){
		$data['title'] = 'Detail pesanan';
		$data['detail_pemesan'] = $this->pemesan_m->getOne($this->uri->segment(4,0));
		$data['browse_pesanan'] = $this->pesanan_m->getById($this->uri->segment(4,0));
		$this->load->view('admin/tdpesanan_v', $data);
	}
}
?>