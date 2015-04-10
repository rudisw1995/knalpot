<?php
	Class Tamu_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		// menambahkan semua data tamu
		function insert(){
			$data = array(
				"nama"=>$this->input->post("nama"),
				"alamat"=>$this->input->post("alamat"),
				"komentar"=>$this->input->post("komentar")
			);
			$this->db->insert("tamu",$data);
		}
		// mengambil semua data tamu
		function getAll(){
			return $this->db->get('tamu');
		}
	}
?>