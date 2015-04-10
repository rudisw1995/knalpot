<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('barang_m'));
		$this->load->library(array('pagination'));
		$this->load->helper(array('html','global'));
	}

	function index()
	{
		$data['title'] = 'Gallery Barang';
		
		$data['base_url'] = base_url().'main/index/ecommerce';
		$data['total_rows'] = $this->db->count_all('barang');
		$data['per_page'] = 9;
		$this->pagination->initialize($data);
		$data['browse_slide'] = $this->barang_m->getSlide();
		$data['browse_thumbs'] = $this->barang_m->getThumbs($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'home_v';
		$this->load->view('main_v', $data);
	}
}
?>