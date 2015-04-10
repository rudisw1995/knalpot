<?php
	Class Pemesan_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		// Menambahkan data kedalam tabel pemesan
		function insert(){
			$data = array(
				"nm_pms"	=> $this->input->post("nm_pms"),
				"alamat"	=> $this->input->post("alamat"),
				"kota"		=> $this->input->post("kota"),
				"kd_pos"	=> $this->input->post("kd_pos"),
				"email"		=> $this->input->post("email"),
				"telp"		=> $this->input->post("telp"),
				"pesan"		=> $this->input->post("pesan"),
				"tglinput" 	=> date('Y-m-d H:i:s')
			);
			$this->db->insert("pemesan",$data);
		}
		// Mengambil id_pms terbesar pada tabel pemesan
		function getCode(){
			$data = array();
			$this->db->select_max("id_pms");
			$hasil = $this->db->get('pemesan');
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}
		}
		// Mengambil data pemesan berdasarkan ID pemesan
		function getOne($id){
			$data = array();
			$this->db->select("*");
			$this->db->from("pemesan");
			$this->db->where("id_pms", $id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;		
		}
	}
?>