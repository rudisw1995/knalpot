<?php
	Class Pesan_m extends CI_Model{
		var $data = '';
		function __construct(){
			parent::__construct();
		}
		function insert(){
			$data = array(
				"id_pms"	=> $this->session->userdata('id_pms'),
				"tgl_psn"	=> date('Y-m-d H:i:s'),
				"status"	=> "sedang diproses",
				"kd_biaya_krm" => $this->session->userdata('sesi_kotakirim')
			);
			$this->db->insert("pesan",$data);
		}
		function getCode(){
			$data = array();
			$this->db->select_max("no_psn");
			$hasil = $this->db->get('pesan');
			if($hasil->num_rows() > 0){
				return $hasil->row_array();
			}		
		}
		/* ============================ ADMIN MODEL ==========================*/
		// Digunakan pada bagian admin.
		// Untuk menampilkan seluruh data pemesan menggunakan pembatasan (limit)
		function getAll($limit1=10, $limit2=0){
			$data = array();
			$this->db->select("*");
			$this->db->from("pemesan");
			$this->db->join("pesan","pemesan.id_pms = pesan.id_pms");
			if($this->session->userdata('sesicari_pemesan')){
				$this->db->like("nm_pms",$this->session->userdata('sesicari_pemesan'));
			}
			$this->db->limit($limit1,$limit2);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;			
		}
		function getById($id){
			$data = array();
			$this->db->select("*");
			$this->db->from("pesan");
			// $this->db->join("pemesan","pesan.idpemesan=pemesan.idpemesan");
			$this->db->join("dpesan","pesan.no_psn = dpesan.no_psn");
			$this->db->join("barang","dpesan.kd_brg = barang.kd_brg");
			$this->db->where("pesan.id_pms",$id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;			
		}
		function countAll(){
			$this->db->select("*");
			$this->db->from("pemesan");
			$this->db->join("pesan","pemesan.id_pms = pesan.id_pms");
			if($this->session->userdata('sesicari_pemesan')){
				$this->db->like("nm_pms",$this->session->userdata('sesicari_pemesan'));
			}
			return $this->db->count_all_results();
		}
		function delete($id){
			$this->db->where('no_psn', $id);
			$this->db->delete('pesan');
		}
		/* ========================= END MODEL ADMIN ========================*/
	}
?>