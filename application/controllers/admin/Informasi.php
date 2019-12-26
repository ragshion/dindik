<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('admin');
	}

	function renstra(){
		$data['data'] = $this->db->where('kategori','renstra')->order_by('tgl_input','desc')->get('download')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/media/renstra',$data);
		$this->load->view('backend/template/footer');
	}

	function save_renstra(){
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
        		'kategori' => 'renstra'
        	);

        	$this->db->insert('download',$filedata);

        }else{
			$error = array ('error' => $this->upload->display_errors());
			var_dump($error);
		}
		redirect('admin/informasi/renstra');
	}

	function hapus_renstra($id){
		$data = $this->db->where('id',$id)->get('download')->row_array();
		$this->db->where('id',$id)->delete('download');
		unlink('./assets/download/'.$data['nama_unduhan']);
		redirect('admin/informasi/renstra');
	}

	function update_renstra(){
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


		$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data Renstra berhasil diperbarui.</div>');

		$this->db->where('id',$data['id'])->update('download',$filedata);
		redirect('admin/informasi/renstra');
	}

	function lkpj(){
		$data['data'] = $this->db->where('kategori','lkpj')->order_by('tgl_input','desc')->get('download')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/media/lkpj',$data);
		$this->load->view('backend/template/footer');
	}

	function save_lkpj(){
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
        		'kategori' => 'lkpj'
        	);

        	$this->db->insert('download',$filedata);

        }else{
			$error = array ('error' => $this->upload->display_errors());
			var_dump($error);
		}
		redirect('admin/informasi/lkpj');
	}

	function hapus_lkpj($id){
		$data = $this->db->where('id',$id)->get('download')->row_array();
		$this->db->where('id',$id)->delete('download');
		unlink('./assets/download/'.$data['nama_unduhan']);
		redirect('admin/informasi/lkpj');
	}

	function update_lkpj(){
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


		$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data LKPJ berhasil diperbarui.</div>');

		$this->db->where('id',$data['id'])->update('download',$filedata);
		redirect('admin/informasi/lkpj');
	}

	function layanan_umum(){
		$data['data'] = $this->db->get('layanan_umum')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/media/layanan_umum',$data);
		$this->load->view('backend/template/footer');
	}

	function save_layanan(){
		$data = $this->input->post();
		$filedata = array(
    		'judul_layanan' => $data['judul_layanan'],
    		'deskripsi_layanan' => $data['deskripsi_layanan']
    	);

    	$this->db->insert('layanan_umum',$filedata);
		redirect('admin/informasi/layanan_umum');
	}

	function hapus_layanan($id){
		$this->db->where('id',$id)->delete('layanan_umum');
		redirect('admin/informasi/layanan_umum');
	}

	function edit_layanan(){
		$data = $this->db->where('id',$this->input->post('id'))->get('layanan_umum')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update_layanan(){
		$data = $this->input->post();
		$filedata = array(
    		'judul_layanan' => $data['judul_layanan'],
    		'deskripsi_layanan' => $data['deskripsi_layanan']
    	);
    	$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data Layanan Umum berhasil diperbarui.</div>');
    	$this->db->where('id',$data['xid'])->update('layanan_umum',$filedata);
		redirect('admin/informasi/layanan_umum');
	}

}
