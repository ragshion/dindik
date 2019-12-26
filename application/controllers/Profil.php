<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('');
	}

	public function sambutan(){
		$data['breadcumbs'] = 'Profil / Sambutan';
		$data['data'] = $this->db->where('page','sambutan')->get('page')->row_array();
		$this->load->view('template/header');
		$this->load->view('profil/sambutan',$data);
		$this->load->view('template/footer');
	}

	public function struktur_organisasi(){
		$data['breadcumbs'] = 'Profil / Struktur Organisasi';
		$data['data'] = $this->db->where('page','struktur')->get('page')->row_array();
		$this->load->view('template/header');
		$this->load->view('profil/struktur_organisasi',$data);
		$this->load->view('template/footer');
	}
}