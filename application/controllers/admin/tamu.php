<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tamu extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('pagination','pquery'));
		$this->load->model(array('tamu_m','pemesan_m'));
		$this->load->helper('global');
	}
	function index(){
		$this->browse();
	}
	function browse(){
		$data['title'] = 'Daftar tamu';
		$data['no'] = $this->uri->segment(4,0);
		$data['base_url'] = base_url().'index.php/admin/tamu/browse';
		$data['total_rows'] = $this->db->count_all('tamu');
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_tamu'] = $this->tamu_m->getAll($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'admin/ttamu_v';
		$this->load->view('admin/main_v', $data);
	}
	function save(){
		$this->tamu_m->insert();
		redirect('admin/tamu/browse', 'refresh');
	}
	function tampilkan(){
		$data = array(
			'tampil' => 1
		);
		$this->db->where('id_tamu', $this->uri->segment(4,0));
		$this->db->update('tamu',$data);
		redirect('admin/tamu/browse', 'refresh');
	}
	function notampilkan(){
		$data = array(
			'tampil' => 0
		);
		$this->db->where('id_tamu', $this->uri->segment(4,0));
		$this->db->update('tamu',$data);
		redirect('admin/tamu/browse', 'refresh');
	}
	function delete(){
		$this->db->delete('tamu',array('id_tamu'=>$this->uri->segment(4,0)));
		redirect('admin/tamu/browse','refresh');
	}
	function balas(){
		$data['title'] = 'Balas Pesan di Bukutamu';
		$data['detail_tamu'] = '';
		$data['main'] = 'admin/rtamu_v';
		$this->load->view('admin/main_v', $data);
	}
}
?>