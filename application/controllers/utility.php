<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Utility extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('batik_m');
		$this->load->helper('html');
	}
	function index(){
	}
	function order_step(){
		$data['title']	= 'Cara Pembelian Batik';
		$data['main']	= 'tcarabeli_v';
		$this->load->view('main_v', $data);
	}
	function make_order(){
		$data['title']	= 'Terima Pemesanan';
		$data['browse_related'] = $this->batik_m->related($this->uri->segment(4,0));
		$data['main']	= 'tterimapesanan_v';
		$this->load->view('main_v', $data);
	}
}
?>