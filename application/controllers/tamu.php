<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tamu extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('tamu_m');
		$this->load->helper('html');
	}
	function index(){
	}
	function order_step(){
	}
	function save(){
		$this->tamu_m->insert();
		redirect('main');
	}
}
?>