<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('status') == "login"){
	        redirect(base_url('admin'));
	    }else{
			$this->load->view('backend/login');
	    }
	}

	function check(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array (
			'username' => $username,
			'password' => md5($password)
		);

		// $cek = $this->db->where($where)->get('user')->row_array();

		$cek = $this->db->select('*')
			->from('user')
			->join('bidang','user.id_bidang=bidang.id')
			->where($where)
			->get()->row_array();
		if($cek){
			$data_session = array (
				'username' => $cek['username'],
				'id_bidang' => $cek['id_bidang'],
				'nama_bidang' => $cek['nama_bidang'],
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('admin');
		}else{
			// $this->session->set_flashdata("berhasil","toastr.error('Maaf, Username atau Password Salah!')");
			redirect('');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	
}
