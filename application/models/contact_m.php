<?php
	// MODEL INI TIDAK KEPAKAI
	Class Contact_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function insert(){
			$data = array(
				/*"idpesan"=>$this->input->post("kodejenis"),
				"nama"=>$this->input->post("kode"),
				"email"=>$this->input->post("nama"),
				"telepon"=>$this->input->post("harga"),
				"pesan"=>$this->input->post("status")
				"tgl_input" => date('Y-m-d H:i:s')*/
			);
			$this->db->insert("pesan",$data);
		}
	}
?>