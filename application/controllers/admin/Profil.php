<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('admin');
	}

	public function sambutan(){
		$data['data'] = $this->db->where('page','sambutan')->get('page')->row_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/profil/sambutan',$data);
		$this->load->view('backend/template/footer');
	}

	function edit_sambutan(){
		$data = $this->db->where('id',$this->input->post('id'))->get('page')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update_sambutan(){
		$data = array(
			'isi' => $this->input->post('isi')
		);
		$this->db->where('id',$this->input->post('xid'))->update('page',$data);
		redirect('admin/profil/sambutan');
	}

	public function struktur_organisasi(){
		$data['data'] = $this->db->where('page','struktur')->get('page')->row_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/profil/struktur',$data);
		$this->load->view('backend/template/footer');
	}

	function edit_struktur(){
		$data = $this->db->where('id',$this->input->post('id'))->get('page')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update_struktur(){
		$data = array(
			'isi' => $this->input->post('isi')
		);
		$this->db->where('id',$this->input->post('xid'))->update('page',$data);
		redirect('admin/profil/struktur_organisasi');
	}

}
