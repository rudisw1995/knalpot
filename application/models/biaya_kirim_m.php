<?php
	Class Biaya_kirim_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		// mengambil data biaya pengiriman berdasarkan kode biaya pengiriman
		function biaya_kirim($kode){
			$data = array();
			$this->db->select("*");
			$this->db->from("biaya_kirim");
			$this->db->where("kd_biaya_krm", $kode);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}
		}
		// Fungsi penyimpanan dan update data biaya pengiriman
		// Jika kd_biaya_krm ada pada form, maka diupdate. Jika tidak ada maka di simpan
		function save(){
			$data = array(
				'nm_kota' => $this->input->post('nm_kota'),
				'biaya_krm' => $this->input->post('biaya_krm')
			);
			if($this->input->post('kd_biaya_krm')){
				$this->db->where('kd_biaya_krm', $this->input->post('kd_biaya_krm'));
				$this->db->update('biaya_kirim', $data);
			}else{
				$this->db->insert('biaya_kirim', $data);
			}
		}
		function getOne($kd){
			$data = array();
			$this->db->select("*");
			$this->db->from("biaya_kirim");
			$this->db->where("kd_biaya_krm", $kd);
			return $hasil = $this->db->get();
		}
		// Menampilkan semua data biaya pengiriman dan menggunakan pembatasan (limit)
		function getAll($limit1='',$limit2=''){
			$data = array();
			$this->db->select("*");
			$this->db->from("biaya_kirim");
			$this->db->order_by('kd_biaya_krm', 'DESC');
			$this->db->limit($limit2, $limit1);
			return $hasil = $this->db->get();
		}		
		function count_all($sesi_cari = ''){
			if($sesi_cari == true){
				$this->db->like('judul', $sesi_cari);
			}
			$this->db->from('barang');
			return $this->db->count_all_results();
		}
		function detail($id){
			$data = array();
			$this->db->select("*");
			$this->db->from("barang");
			$this->db->where("id_barang", $id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		// Untuk menghapus data biaya pengiriman berdasarkan ID
		function delete($id){
			$this->db->where("kd_biaya_krm",$id);
			$this->db->delete("biaya_kirim");
		}	
	}
?>