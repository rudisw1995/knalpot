<?php
	Class Main extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model(array('barang_m'));
			$this->load->library(array('pagination','fpdf'));
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));

		}
		function index(){
			$data["main"] = "admin/home_v";
			$this->load->view("admin/main_v",$data);
		}
		function laporan(){
			$data_barang['lap'] = $this->barang_m->laporan_barang_m();
			$this->load->view('lap',$data_barang);

		}
	}
?>