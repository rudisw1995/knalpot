<?php
	Class Barang_m extends CI_Model{
		var $gallery_path;
		var $gallery_path_url;
		function __construct(){
			parent::__construct();
			$this->gallery_path = realpath(APPPATH . '../asset/images/barang');
			$this->gallery_path_url = base_url().'asset/images/barang';
		}
		function _getKode(){
			$data = array();
			$this->db->select("kode");
			$this->db->from("barang");
			$this->db->order_by("idbarang", "DESC");
			$this->db->limit(1);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}
		}
		function _makeKode($kodejenis){
			$bln = date('m');
			$thn = substr(date('Y'),2,2);
			$wkt = $bln.$thn;
			$getkode = $this->_getKode();
			$kode = $getkode['kode'];
			if(substr($kode,2,4) == $wkt){
				$nourut = substr($kode, 6,10)+1;
			}else{
				$nourut = 1;
			}
			return $kodejenis.$wkt.$nourut;
		}
		// function Untuk menyimpan data barang kedalam tabel barang
		function insert($foto = ''){
			if(!$foto){
				$data = array(
					"kd_ktgr"	=> $this->input->post("kd_ktgr"),
					"nm_brg"	=> $this->input->post("nm_brg"),
					"bahan"		=> $this->input->post("bahan"),
					"ukuran"	=> $this->input->post("ukuran"),
					"harga"		=> $this->input->post("harga"),
					"stok"		=> $this->input->post("stok"),
					"keterangan"=> $this->input->post("keterangan")
				);
			}else{
				$data = array(
					"kd_ktgr"	=> $this->input->post("kd_ktgr"),
					"nm_brg"	=> $this->input->post("nm_brg"),
					"bahan"		=> $this->input->post("bahan"),
					"ukuran"	=> $this->input->post("ukuran"),
					"harga"		=> $this->input->post("harga"),
					"stok"		=> $this->input->post("stok"),
					"nama_field"=> $foto,
					"keterangan"=> $this->input->post("keterangan")
				);
			}
			if($this->input->post('kd_brg')){
				$this->db->where("kd_brg", $this->input->post('kd_brg'));
				$this->db->update("barang", $data);
			}else{
				$this->db->insert("barang",$data);
			}
		}
		// Menghitung jumlah stok awal sebelum dikurangi (pada pemesanan)
		function _stok_awal($kd_brg){
			$this->db->select('stok');
			$this->db->from('barang');
			$this->db->where('kd_brg', $kd_brg);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}			
		}
		// Pengurangan stok barang, stok awal dikurangi jumlah pesanan
		function kurangi_stok($kd_brg, $jum){
			$stok_awal = $this->_stok_awal($kd_brg);
			$stok = $stok_awal['stok'] - $jum;
			$data = array(
				'stok' => $stok
			);
			$this->db->where("kd_brg", $kd_brg);
			$this->db->update("barang", $data);		
		}
		// SLIDE SHOW dihalaman utama
		function getSlide(){
			$data = array();
			$sql = "SELECT * FROM barang WHERE nama_field <> '' ORDER BY kd_brg DESC
					LIMIT 5";
			$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		// Pencarian seluruh barang pada web
		function general_search($limit1 = '', $limit2 = ''){
			$data = array();
			$sql = "SELECT * FROM barang WHERE nama_field <> '' ";
			if($this->session->userdata('sesi_generalsearch')){
				$sql .= " AND nm_brg LIKE '%".$this->session->userdata('sesi_generalsearch')."%'";
			}
				$sql .= " LIMIT ".$limit2;
			if($limit1){
				$sql .= ", ".$limit1;
			}
			return $this->db->query($sql);
		}
		// jumlah hasil pencarian pada pencarian diweb
		function count_general_search(){
			$data = array();
			$sql = "SELECT * FROM barang WHERE nama_field <> '' ";
			if($this->session->userdata('sesi_generalsearch')){
				$sql .= " AND nm_brg LIKE '%".$this->session->userdata('sesi_generalsearch')."%'";
			}
			$hasil = $this->db->query($sql);
			return $hasil->num_rows();
		}
		function getThumbs($limit1='',$limit2=''){
			$data = array();
			$sql = "SELECT * FROM barang WHERE nama_field <> '' ORDER BY kd_brg DESC LIMIT ".$limit2;
			if($limit1){
				$sql .= ",".$limit1;
			}
			$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function getThumbsCategory($limit1='',$limit2=''){
			$data = array();
			$sql = "SELECT * FROM barang WHERE nama_field <> '' 
					AND kd_ktgr = ".$this->session->userdata('sesi_kategori').
					" ORDER BY kd_brg DESC LIMIT ".$limit2;
			if($limit1){
				$sql .= ",".$limit1;
			}
			$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function CountThumbsCategory(){
			$this->db->from('barang');
			$this->db->where('nama_field !=','');
			$this->db->where('kd_ktgr', $this->session->userdata('sesi_kategori'));
			return $this->db->count_all_results();
		}
		/* ADMIN THUMBS  */
		function getAll_adm($limit1='',$limit2=''){
			$data = array();
			$sql = "SELECT *
					FROM barang ";
			if($this->session->userdata('sesicari_barang')){
				$sql .= "WHERE nm_brg LIKE '%".$this->session->userdata('sesicari_barang')."%'";
			}
			$sql .= " ORDER BY kd_brg DESC LIMIT ".$limit2;
			if($limit1){
				$sql .= ",".$limit1;
			}
			$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		function CountGetAll_adm(){
			$this->db->from('barang');
			return $this->db->count_all_results();
		}
		function getOne($id=''){
			$data = array();
			$sql = "SELECT *
						FROM barang WHERE kd_brg ='".$id."'";
			$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		/*function CountGetThumbs(){
		}*/
		function select_slide(){
			$data = array();
			$this->db->select("*");
			$this->db->from("barang");
			$this->db->order_by("idbarang","DESC");
			$this->db->limit(5);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}
		
		function count_all($sesi_cari = ''){
			if($sesi_cari == true){
				$this->db->like('judul', $sesi_cari);
			}
			$this->db->from('barang');
			return $this->db->count_all_results();
		}
		function related($id){
			$data = array();
			$this->db->select("*");
			$this->db->from("barang");
			$this->db->where("idbarang !=",$id);
			$this->db->limit(5);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}

		function delete($id){
			$this->db->where("kd_brg",$id);
			$this->db->delete("barang");
		}

		function _nama_image($id = ''){
			$data = array();
			$this->db->select("*");
			$this->db->from("barang");
			$this->db->where("idbarang",$id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}
		} 

		function delete_image($id){
			$dimg = $this->_nama_image($id);
			$nama_image = $dimg["foto"];
			$file = "./asset/images/barang/".$nama_image;
			$file2 = "./asset/images/barang/thumbs/".$nama_image;
			if(is_file($file)){
				unlink($file);
				unlink($file2);
			}
		}
		function do_upload($nama_file) {
			$config = array(
				'allowed_types' => 'jpg|jpeg|gif|png',
				'upload_path' => $this->gallery_path,
				'max_size' => 20000
			);
			
			$this->load->library('upload', $config);
			$this->upload->do_upload($nama_file);
		            $data = $this->upload->data($nama_file);
			$image_data = $this->upload->data();
			$nama_filenya = $image_data['file_name'];
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 140,
				'height' => 140
			);

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $nama_filenya;
		}

		function get_images(){
			$files = scandir($this->gallery_path);
			$files = array_diff($files, array('.', '..', 'thumbs'));
			$images = array();
			foreach ($files as $file) {
				$images []= array (
					'url' => $this->gallery_path_url . $file,
					'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
				);
			}
			return $images;
		}	
		function laporan_barang_m(){
			$data_lap = $this->db->get('barang');
			return $data_lap->result();
		}
	}
?>