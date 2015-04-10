<?php
	Class Login_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function insert(){
		}

		function update(){
		}

		function select($limit1,$limit2, $sesi_cari = ''){
			$data = array();
			$this->db->select("*");
			$this->db->from("login");
			$this->db->order_by("id_login","DESC");
			$this->db->limit($limit1,$limit2);
			if($sesi_cari){
				$this->db->like('judul', $sesi_cari);
			}
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
			$this->db->from("login");
			$this->db->order_by("id_login","DESC");
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
			$this->db->from('login');
			return $this->db->count_all_results();
		}

		function detail($id){
			$data = array();
			$this->db->select("*");
			$this->db->from("login");
			$this->db->where("id_login", $id);
			$hasil = $this->db->get();
			if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
			$hasil->free_result();
			return $data;
		}

		function delete($id){
			$this->delete_image($id);
			$this->db->where("id_login",$id);
			$this->db->delete("login");
		}

		function cek_login(){
			$data = array();
			$sql = "SELECT * FROM login WHERE username = '".$this->input->post('username')."'
					AND password = PASSWORD('".$this->input->post('password')."')";
			$hasil = $this->db->query($sql);
			if($hasil->num_rows() > 0){
				return $hasil->row_array(); //return row sebagai associative array
			}
		} 

		function delete_image($id){
			$dimg = $this->_nama_image($id);
			$nama_image = $dimg["gambar"];
			$file = "./asset/images/login/".$nama_image;
			$file2 = "./asset/images/login/thumbs/".$nama_image;
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
				'width' => 250,
				'height' => 200
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
	}
?>