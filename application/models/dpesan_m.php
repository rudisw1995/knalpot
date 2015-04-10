<?php
	Class Dpesan_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function insert($kode, $jum){
			$data = array(
				"no_psn" => $this->session->userdata('no_psn'),
				"kd_brg" => $kode,
				"jum_brg"=> $jum
			);
			$this->db->insert("dpesan",$data);
		}
	}
?>