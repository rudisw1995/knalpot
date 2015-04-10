<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(array('pesan_m'));
		$this->load->library(array('pagination','pquery'));
		$this->load->helper('html');
	}
	function index(){
		$data['title'] = 'Contact Us';
		$data['main'] = 'tcontact_v';
		$this->load->view('main_v', $data);
	}
	function detail(){
		/*$data['detail_batik'] = $this->batik_m->getOne('foto', $this->uri->segment(4,0));
		$data['main'] = 'tdbatik_v';
		$this->load->view('main_v', $data);*/
	}
	function save(){
		$this->load->library('form_validation');
		$config = array(
				array(
				      'field'   => 'nama',
				      'label'   => 'Nama',
				      'rules'   => 'required'
				   ),
				array(
				      'field'   => 'alamat',
				      'label'   => 'Alamat',
				      'rules'   => 'required'
				   ),
				array(
				      'field'   => 'email',
				      'label'   => 'Email',
				      'rules'   => 'required|valid_email'
				   ),
				array(
				      'field'   => 'pesan',
				      'label'   => 'Pesan',
				      'rules'   => 'required'
				   )
			     );
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$data['kode'] = $this->input->post('kode');
			$this->load->view('ipesan_v', $data);
		}else{
			$this->pesan_m->insert();		
			$this->load->view('tanks_v');
		}
	}
}
?>