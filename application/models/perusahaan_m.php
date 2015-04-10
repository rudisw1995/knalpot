<?php
	Class Perusahaan_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function insert(){
			$data = array(
				"nama_perus" => $this->input->post("nama_perus"),
				"alamat_perus" => $this->input->post("alamat_perus"),
				"no_telp" => $this->input->post("no_telp"),
				"email" => $this->input->post("email"),
				"bank" => $this->input->post("bank"),
				"no_rek" => $this->input->post("no_rek"),
				"atas_nm" => $this->input->post("atas_nm"),
				"about" => $this->input->post("about")
			);
			if($this->input->post('id_perus')){
				$this->db->where("id_perus", $this->input->post('id_perus'));
				$this->db->update("perusahaan", $data);
			}else{
				$this->db->insert("perusahaan", $data);
			}
		}
		function getAll(){
			$data = array();
			$this->db->select("*");
			$this->db->from("perusahaan");
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function delete($id){
			$this->db->where("kd_ktgr",$id);
			$this->db->delete("perusahaan");
		}
	}
?>