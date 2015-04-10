<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Biaya_kirim extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(array('biaya_kirim_m'));
		$this->load->library(array('pagination'));
		$this->load->helper(array('html','global'));
	}
	function index()
	{
		$data['title'] = 'Daftar Biaya Kirim';
		$data['base_url'] = base_url().'biaya_kirim/index/ecommerce';
		$data['total_rows'] = $this->db->count_all('biaya_kirim');
		$data['per_page'] = 10;
		$data['no'] = $this->uri->segment(4,0);
		$this->pagination->initialize($data);
		$data['browse_biaya_kirim'] = $this->biaya_kirim_m->getAll($this->uri->segment(4,0),$data['per_page']);
		$data['main'] = 'tbiaya_kirim_v';
		$this->load->view('main_v', $data);
	}
}
?>