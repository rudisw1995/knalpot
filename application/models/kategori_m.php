<?php
	Class Kategori_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function insert(){
				$data = array(
					"nm_ktgr" => $this->input->post("nm_ktgr")
				);
			if($this->input->post('kd_ktgr')){
				$this->db->where("kd_ktgr", $this->input->post('kd_ktgr'));
				$this->db->update("kategori", $data);
			}else{
				$this->db->insert("kategori", $data);
			}
		}
		function update(){
		}
		function getAll(){
			$data = array();
			$this->db->select("*");
			$this->db->from("kategori");
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function getOne($id){
			$data = array();
			$this->db->select("*");
			$this->db->where("kd_ktgr", $id);
			$this->db->from("kategori");
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function select_slide(){
			$data = array();
			$this->db->select("*");
			$this->db->from("barang");
			$this->db->order_by("id_barang","DESC");
			$this->db->limit(5);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}		
		function delete($id){
			$this->db->where("kd_ktgr",$id);
			$this->db->delete("kategori");
		}
	}
?>