<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order extends CI_Controller{
	function __construct(){
		parent::__construct();
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
		$n = count($this->input->post('ukuran_pesan'));
		$data = array(
					   array(
							   'id'      => $this->input->post('kode'),
							   /*'qty'     => $this->input->post('jumlah')*$n,*/
							   'qty'     => $n,
							   'price'   => $this->input->post('harga')*$n,
							   'name'    => $this->input->post('nama'),
							   'options' => array('Size' => implode(',',$this->input->post('ukuran_pesan')))
							)
					);
		$this->cart->insert($data);
		redirect('order/browse', 'refresh');
	}
	function browse(){
		$data['title'] = 'Keranjang Belanja';
		$data['main'] = 'tcart_v';
		$this->load->view('main_v', $data);
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
		redirect('order/browse','refresh');
	}
	function detail(){
		/*$data['title'] = 'Detail Order';
		$data['main'] = 'tdbatik_v';
		$this->load->view('main_v', $data);*/
	}
}
?>