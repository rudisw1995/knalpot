<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pesan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('biaya_kirim_m'));
		$this->load->library(array('cart'));
	}
	function index(){
		/*$data['base_url'] = base_url().'index.php/main/index/KatalogBatik';
		$data['total_rows'] = $this->batik_m->CountGetThumbs();
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_thumbs'] = $this->batik_m->getThumbs($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'home_v';
		$this->load->view('main_v', $data);*/
	}
	function choose(){
		// echo $this->input->post('harga'); exit;
		if($this->input->post('jumlah')){
		$data = array(
					   array(
							   'id'      => $this->input->post('kode'),
							   /*'qty'     => $this->input->post('jumlah')*$n,*/
							   'qty'     => $this->input->post('jumlah'),
							   'price'   => $this->input->post('harga'),//*$this->input->post('jumlah'),
							   'name'    => $this->input->post('nama'),
							   'options' => array('Size' => $this->input->post('ukuran_pesan'))
							)
					);
		$this->cart->insert($data);
		}
		redirect('pesan/browse', 'refresh');
	}
	function browse(){
		$data['title'] = 'Keranjang Belanja';
		$data['main'] = 'tcart_v';
		$data['browse_kota'] = $this->biaya_kirim_m->getAll();
		$this->load->view('main_v', $data);
	}
	function biaya_kirim(){
		$this->session->set_userdata('sesi_kotakirim', $this->input->post('kd_biaya_krm'));
			$biaya = $this->biaya_kirim_m->biaya_kirim($this->input->post('kd_biaya_krm'));
			$biayakirim = $biaya['biaya_krm'];
		$this->session->set_userdata('sesi_biayakirim', $biayakirim);
		$this->browse();
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
		redirect('pesan/browse','refresh');
	}
	function detail(){
		/*$data['title'] = 'Detail pesan';
		$data['main'] = 'tdbatik_v';
		$this->load->view('main_v', $data);*/
	}
}
?>