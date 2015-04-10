<?php
	// INI TIDAK JADI KEPAKAI
	Class Order_m extends CI_Model{
		var $data = '';
		function __construct(){
			parent::__construct();
		}
		function insert(){
			$data = array(
				"idpemesan"	=> $this->session->userdata('idpemesan'),
				"tglinput"	=> date('Y-m-d H:i:s'),
				"lunas"		=> "Belum Lunas",
				"status"	=> "Belum Diproses"
			);
			$this->db->insert("order",$data);
		}
		function getCode(){
			$data = array();
			$this->db->select_max("idorder");
			$hasil = $this->db->get('order');
			if($hasil->num_rows() > 0){
				return $hasil->row_array();
			}		
		}
		/* ============================MODEL ADMIN ==========================*/
		function getAll($limit1=10, $limit2=0){
			$this->db->select("*");
			$this->db->from("order");
			$this->db->join("pemesan","order.idpemesan=pemesan.idpemesan");
			$this->db->order_by("idorder","DESC");
			$this->db->limit($limit1,$limit2);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;			
		}
		function getById($id){
			$this->db->select("*");
			$this->db->from("order");
			// $this->db->join("pemesan","order.idpemesan=pemesan.idpemesan");
			$this->db->join("detilorder","detilorder.idorder=order.idorder");
			$this->db->join("batik","batik.kode=detilorder.kode");
			$this->db->where("order.idpemesan",$id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;			
		}
		function countAll(){
			$this->db->select("*");
			$this->db->from("order");
			return $this->db->count_all_results();
		}
		/* ========================= END MODEL ADMIN ========================*/
	}
?>