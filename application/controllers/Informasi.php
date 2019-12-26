<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('');
	}

	public function renstra(){
		$data['breadcumbs'] = 'Informasi Publik / Renstra';
		$data['data'] = $this->db->where('kategori','renstra')->order_by('tgl_input','desc')->get('download')->result_array();
		$this->load->view('template/header');
		$this->load->view('informasi/renstra',$data);
		$this->load->view('template/footer');
	}

	function lkpj(){
		$data['breadcumbs'] = 'Informasi PUblik / LKPJ';
		$data['data'] = $this->db->where('kategori','lkpj')->order_by('tgl_input','desc')->get('download')->result_array();
		$this->load->view('template/header');
		$this->load->view('informasi/lkpj',$data);
		$this->load->view('template/footer');
	}

	function layanan_umum(){
		$data['breadcumbs'] = 'Informasi Publik / Prosedur Layanan';
		$data['data'] = $this->db->get('layanan_umum')->result_array();
		$this->load->view('template/header');
		$this->load->view('informasi/prosedur',$data);
		$this->load->view('template/footer');
	}

}