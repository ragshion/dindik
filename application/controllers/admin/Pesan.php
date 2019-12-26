<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->order_by('status','asc')->order_by('tgl_input','asc')->get('kontak')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/media/pesan',$data);
		$this->load->view('backend/template/footer');
	}

	function balas($id){
		$data = array(
			'status' => '1'
		);
		$this->db->where('id',$id)->update('kontak',$data);
		redirect('admin/pesan');
	}

	function hapus($id){
		$this->db->where('id',$id)->delete('kontak');
		redirect('admin/pesan');
	}

}
