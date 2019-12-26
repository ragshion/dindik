<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['data'] = $this->db->order_by('tgl_input','desc')->get('galeri')->result_array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/media/galeri',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$data['tgl_input'] = date('Y-m-d H:i:s');

		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './assets/images/galeri/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|PNG';
                // $config['allowed_types'] = '*';
                // $config['file_name'] = strtotime(date('Y-m-d h:i:s')).'-'.$data['nik'].'-'.$x.'.'.$ext;
				
				$config['file_name'] = uniqid().$x.'.jpg';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('userFile')){
                	$filedata = array(
                		'nama_foto' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s')
                	);

                	$this->db->insert('galeri',$filedata);
                	echo 'berhasil';

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data galeri berhasil disimpan.</div>');

            redirect('admin/galeri');
        }else{
        	echo 'nofile';
        }
	}

	function hapus($id){
		$data = $this->db->where('id',$id)->get('galeri')->row_array();
		$this->db->where('id',$id)->delete('galeri');
		unlink('./assets/images/galeri/'.$data['nama_foto']);
		redirect('admin/galeri');
	}

	function edit(){
		$data = $this->db->where('id',$this->input->post('id'))->get('galeri')->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$data['id'] = $this->input->post('xid');
		unset($data['xid']);

		if ($_FILES['foto']['size'] == 0 && $_FILES['foto']['error'] == 0) {
			// echo 'kosong';
		}else{
			// echo 'ora koosng';

			$config['upload_path'] = './assets/images/galeri/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = uniqid().'.jpg';

			$this->load->library('upload', $config);
	 
			if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				// $this->load->view('v_upload', $error);
			}else{
				$filedata = array(
					'nama_foto' => $config['file_name']
				);
				$u = $this->db->where('id',$data['id'])->get('galeri')->row_array();
				unlink('./assets/images/galeri/'.$u['foto']);

				$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="fal fa-window-close"></i></span> </button> <strong>Berhasil!</strong> Data carousel berhasil diperbarui.</div>');

				$this->db->where('id',$data['id'])->update('galeri',$filedata);
				redirect('admin/galeri');
			}
		}

	}

}
