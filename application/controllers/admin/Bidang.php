<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->get('bidang')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/master/bidang',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$this->session->set_flashdata('alert','<div class="alert alert-info alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-trash"></i></span> </button> <strong>Berhasil!</strong> Data Bidang berhasil disimpan.</div>');
		$this->db->insert('bidang',$data);
		redirect('admin/bidang');
	}

	function hapus($id){
		$this->db->where('id',$id)->delete('bidang');
		redirect('admin/bidang');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('bidang')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$id = $data['xid'];
		unset($data['xid']);
		$this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-trash"></i></span> </button> <strong>Berhasil!</strong> Data Bidang berhasil diperbarui.</div>');
		$this->db->where('id',$id)->update('bidang',$data);
		redirect('admin/bidang');
	}

}
