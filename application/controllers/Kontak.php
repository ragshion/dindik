<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('template/header');
		$this->load->view('kontak/index');
		$this->load->view('template/footer');
	}

	function message(){
		$data = $this->input->post();
		$data['tgl_input'] = date('Y-m-d H:i:s');
		$this->db->insert('kontak',$data);
		$resp = array(
			'respon' => 'Pesan Berhasil Dikirim'
		);

		header('Content-Type: application/json');
		echo json_encode($resp);
	}
}