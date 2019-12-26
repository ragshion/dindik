<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->select('*')
			->from('user')
			->join('bidang','bidang.id=user.id_bidang')
			->get('')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/master/user',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$data['password'] = md5($data['password']);
		$this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-trash"></i></span> </button> <strong>Berhasil!</strong> Data User berhasil disimpan.</div>');
		$this->db->insert('user',$data);
		redirect('admin/user');
	}

	function hapus($id){
		$this->db->where('username',$id)->delete('user');
		redirect('admin/user');
	}

	function edit(){
		$data = $this->db->where('username',$this->input->post('username'))->get('user')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$id = $data['xusername'];
		unset($data['xusername']);
		$data['password'] = md5($data['password']);
		$this->session->set_flashdata('alert','<div class="alert alert-info alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-trash"></i></span> </button> <strong>Berhasil!</strong> Data User berhasil diperbarui.</div>');
		$this->db->where('username',$id)->update('user',$data);
		redirect('admin/user');
	}

}
