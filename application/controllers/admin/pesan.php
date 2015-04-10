<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pesan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('cart','pagination','pquery'));
		$this->load->model(array('pesan_m','pemesan_m','biaya_kirim_m','barang_m'));
		$this->load->helper('global');
	}
	function index(){
		if($this->input->post('txtCari')){
			$this->session->set_userdata('sesicari_pemesan', $this->input->post('txtCari'));
		}else{
			$this->session->set_userdata('sesicari_pemesan', '');			
		}
		$this->browse();
	}
	function status(){
		if($this->input->post('batalpesan')){
			$this->db->delete('pesan', array('no_psn' => $this->input->post('no_psn')));
			$this->db->delete('dpesan', array('no_psn' => $this->input->post('no_psn')));
			$this->db->delete('pemesan', array('id_pms' => $this->input->post('id_pms')));
			redirect('admin/pesan', 'refresh');
			return false;
		}
		if($this->input->post('status') == 'sedang diproses'){
			$n = $this->input->post('total_brg');
			for($i=1; $i<=$n; $i++){
				// echo $this->input->post('kd_brg'.$i).'-'.$this->input->post('jum'.$i).'<br />';
				$this->barang_m->kurangi_stok($this->input->post('kd_brg'.$i),$this->input->post('jum'.$i));
			}
			$this->db->update('pesan', array('status'=>'dikirim'), array('no_psn' => $this->input->post('no_psn')));
			redirect('admin/pesan/detail/'.$this->input->post('id_pms'),'refresh');
		}elseif($this->input->post('status') == 'dikirim'){
			$this->db->update('pesan', array('status'=>'selesai'), array('no_psn' => $this->input->post('no_psn')));
			redirect('admin/pesan/detail/'.$this->input->post('id_pms'),'refresh');
		}
	}
	function browse(){
		$data['title'] = 'Daftar pesan';
		$data['no'] = $this->uri->segment(4,0);
		$data['base_url'] = base_url().'index.php/main/index/KatalogBatik';
		$data['total_rows'] = $this->pesan_m->countAll();
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_pesan'] = $this->pesan_m->getAll($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'admin/tpesan_v';
		$this->load->view('admin/main_v', $data);
	}
	function delete(){
		$this->pesan_m->delete($this->uri->segment(4));
		redirect('admin/pesan','refresh');
	}
	function laporan(){
		$data['title'] = 'Laporan Data Pemesan';
		$data['no'] = $this->uri->segment(4,0);
		$data['base_url'] = base_url().'index.php/main/index/KatalogBatik';
		$data['total_rows'] = $this->pesan_m->countAll();
		$data['per_page'] = 10;
		$this->pagination->initialize($data);
		$data['browse_pesan'] = $this->pesan_m->getAll($data['per_page'],$this->uri->segment(4,0));
		$data['main'] = 'admin/cpemesan_v';
		$this->load->view('admin/main_v', $data);
	}
	function detail(){
		$data['title'] = 'Detail Pesanan';
		$data['detail_pemesan'] = $this->pemesan_m->getOne($this->uri->segment(4,0));
		$data['browse_pesan'] = $this->pesan_m->getById($this->uri->segment(4,0));
		$data['main'] = 'admin/tdpesan_v';
		$this->load->view('admin/main_v', $data);
	}
	function laporan_detail(){
		$data['title'] = 'Laporan Data Pemesanan';
		$data['detail_pemesan'] = $this->pemesan_m->getOne($this->uri->segment(4,0));
		$data['browse_pesan'] = $this->pesan_m->getById($this->uri->segment(4,0));
		$data['main'] = 'admin/cpemesandetail_v';
		$this->load->view('admin/main_v', $data);
	}
}
?>