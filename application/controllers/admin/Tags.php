<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->get('tags')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/master/tags',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$x = $this->db->where('tags',$data['tags'])->get('tags')->row_array();
		if ($x) {
			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-trash-alt"></i></span> </button> <strong>Maaf!</strong> Data tags tersebut sudah ada.</div>');
		}else{
			$this->db->insert('tags',$data);
		}
		redirect('admin/tags');
	}

	function hapus($id){
		$this->db->where('id',$id)->delete('tags');
		redirect('admin/tags');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('tags')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = array(
			'tags' => $this->input->post('tags')
		);
		$this->db->where('id',$this->input->post('id'))->update('tags',$data);
		redirect('admin/tags');
	}

}
