<?php
	Class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model(array('login_m'));
			$this->load->library(array('table'));
		}
		function index(){
			$this->cek_login();
		}
		function cek_login(){
			$data['title'] = "Login Administrator";
			$data['alert'] = '';
			if($cek = $this->login_m->cek_login()){
				$arsesi = array(
					'sesi_user' => $cek['username'],
					'sesi_status' => $cek['status'],
				);
				$this->session->set_userdata($arsesi);
				redirect('admin/main', 'refresh');
			}else{
				$data['alert'] = '<small>Masukkan Username dan Password Yang Benar</small>';
			}
			$this->load->view("admin/login_v",$data);
		}
		function logout(){
			$this->_removesesi();
			redirect('admin/login', 'refresh');
		}
		function _removesesi(){
			$arsesi = array(
				'sesi_user' => '',
				'sesi_status' => ''
			);
			$this->session->set_userdata($arsesi);
		}
	}
?>