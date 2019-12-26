<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->where('kategori','download')->order_by('tgl_input','desc')->get('download')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/media/download',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$uid = uniqid();

        $ext = pathinfo($_FILES['userFile']['name'], PATHINFO_EXTENSION);
        $config['upload_path'] = './assets/download/';
        $config['allowed_types'] = '*';
        $config['file_name'] = $uid.'-'.str_replace(" ", "_", $_FILES['userFile']['name']);
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('userFile')){

        	$filedata = array(
        		'keterangan' => $data['keterangan'],
        		'nama_unduhan' => $config['file_name'],
        		'tgl_input' => date('Y-m-d H:i:s'),
        		'kategori' => 'download'
        	);

        	$this->db->insert('download',$filedata);

        }else{
			$error = array ('error' => $this->upload->display_errors());
			var_dump($error);
		}
		redirect('admin/download');
	}

	function hapus($id){
		$data = $this->db->where('id',$id)->get('download')->row_array();
		$this->db->where('id',$id)->delete('download');
		unlink('./assets/download/'.$data['nama_unduhan']);
		redirect('admin/download');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('download')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$data['id'] = $this->input->post('xid');
		unset($data['xid']);

		if ($_FILES['userFile']['size'] == 0) {
			$filedata = array(
				'keterangan' => $data['keterangan'],
			);

		}else{
			$uid = uniqid();

			$config['upload_path'] = './assets/download/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $uid.'-'.str_replace(" ", "_", $_FILES['userFile']['name']);

			$this->load->library('upload', $config);
	 
			if ( ! $this->upload->do_upload('userFile')){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			}else{
				$filedata = array(
					'keterangan' => $data['keterangan'],
					'nama_unduhan' => $config['file_name']
				);

				$u = $this->db->where('id',$data['id'])->get('download')->row_array();
				unlink('./assets/download/'.$u['nama_unduhan']);

			}
		}


		$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data Unduhan berhasil diperbarui.</div>');

		$this->db->where('id',$data['id'])->update('download',$filedata);
		redirect('admin/download');
	}

}
