<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pemesan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(array('pemesan_m','dpesan_m','pesan_m','perusahaan_m'));
		$this->load->library(array('pagination','pquery','cart','email'));
		$this->load->helper('html');
	}
	function index(){
		$data['title'] = 'Data Pemesan';
		$data['main'] = 'tpemesan_v';
		$this->load->view('main_v', $data);
	}
	function add(){
		$data['title'] = 'Form Data Pemesan';
		$data['main'] = 'ipemesan_v';
		$this->load->view('main_v', $data);
	}
	function confirm_pesanan(){
		$data['title'] = 'Konfirmasi Pemesanan';
		$data['browse_perusahaan'] = $this->perusahaan_m->getAll();
		$data['main'] = 'tconfirmasi_pemesan_v';			
		$this->load->view('main_v', $data);
	}
	function save(){
		$this->load->library('form_validation');
		$config = array(
				array(
				      'field'   => 'nm_pms',
				      'label'   => 'Nama',
				      'rules'   => 'required'
				   ),
				array(
				      'field'   => 'alamat',
				      'label'   => 'Alamat',
				      'rules'   => 'required'
				   ),
				array(
				      'field'   => 'kota',
				      'label'   => 'Kota',
				      'rules'   => 'required'
				   ),
				array(
				      'field'   => 'kd_pos',
				      'label'   => 'Kode&nbsp;POS',
				      'rules'   => 'required'
				   ),
				array(
				      'field'   => 'email',
				      'label'   => 'Email',
				      'rules'   => 'required|valid_email'
				   ),
				array(
				      'field'   => 'telp',
				      'label'   => 'Telepon',
				      'rules'   => 'required'
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
			$data['title'] = 'Form Data Pemesan - Error';
			$data['main'] = 'ipemesan_v';
			$this->load->view('main_v', $data);
		}else{
			$this->pemesan_m->insert();
				$kdpemesan = $this->pemesan_m->getCode();
				$this->session->set_userdata('id_pms', $kdpemesan['id_pms']);
			$this->pesan_m->insert();
				$kdpesan = $this->pesan_m->getCode();
				$this->session->set_userdata('no_psn', $kdpesan['no_psn']);
			foreach($this->cart->contents() as $items):
				$this->dpesan_m->insert($items['id'], $items['qty']);
			endforeach;

			/* SEND EMAIL */
			/*$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('info@katalogbatik.com', 'Pengelola Katalog Batik');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Pemesanan Katalog Batik');
			$message = 'Kepada Yth. Sdr/i. '.$this->input->post('nama').
				'<br />Terimakasih atas pemesanan yang anda lakukan di <a href="http://katalogbatik.com">KatalogBatik.com</a> yang anda lakukan<br />';
			$message .= 'Kami akan memproses order Anda setelah kami menerima bukti atau info pembayaran(setelah kami cek) yang telah 
						Anda lakukan. Bila dalam waktu 1 minggu dari tanggal pendaftaran kami tidak menerima bukti atau info pembayaran dari Anda,
						kami menganggap Anda telah membatalkan order Anda. Silahkan untuk kunjungi
						<a href="http://katalogbatik.com">KatalogBatik.com</a> dan lakukan pemesanan kembali';
			$message .= 'Kirim Biaya Pemesanan ke<br />';
			$message .= 'Bank Name  :  Bank Syariah Mandiri(BSM)<br />
							Nomor Rekening  :  0117035448<br />
							Atas Nama  :  Nurul Huda<br />';
			$message .= '<b>Atau</b><br />Bank Name  :  Bank Muamalat<br />
							Nomor Rekening  :  0130836391<br />
							Atas Nama  :  Gatot Satriyo<br />';
			$this->email->message($message);
			if($this->email->send() == false){
				show_error($this->email->print_debugger());
			}else{
				$this->cart->destroy();
			}*/
			/* SELESAI SEND MAIL */
			$this->cart->destroy();
			redirect('pemesan/confirm_pesanan', 'refresh');
		}
	}
}
?>