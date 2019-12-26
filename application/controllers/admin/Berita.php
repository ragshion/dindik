<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$query = $this->db->select('bidang.*, posts.*')
				->from('posts')
				->join('bidang','bidang.id=posts.id_bidang')
				->order_by('status','desc')
				->order_by('tanggal','desc')
				->get();

		$data['post'] = $query->result_array();
	    $z = 0;

	    while ($z < count($data['post'])) {
      		$resp = $this->db->where('id_post',$data['post'][$z]['id'])->get('thumbnail')->result_array();

      		if ($resp) {
      			foreach ($resp as $v) {
	      			$data['post'][$z]['thumbnail'][] = array(
	      				'nama_file' => $v['nama_file']
	      			);
	      		}	
      		}else{
      			$data['post'][$z]['thumbnail'] = array();
      		}
      		
        	$z += 1;
	    }

		$this->load->view('backend/template/header');
		$this->load->view('backend/berita/index',$data);
		$this->load->view('backend/template/footer');
	}

	function hapus($id){
		$data = $this->db->where('id',$id)->get('posts')->row_array();
		$thumbnail = $this->db->where('id_post',$id)->get('thumbnail')->result_array();
		if ($thumbnail) {
			foreach ($thumbnail as $t) {
				unlink('./assets/images/posts/'.$t['nama_file']);
			}
			$this->db->where('id_post',$id)->delete('thumbnail');
		}
		$attachment = $this->db->where('id_post',$id)->get('attachment')->result_array();
		if ($attachment) {
			foreach ($attachment as $a) {
				unlink('./assets/attachment/'.$a['nama_file']);
			}
			$this->db->where('id_post',$id)->delete('attachment');
		}
		$this->db->where('id',$id)->delete('posts');
		redirect('admin/berita');
	}

	function status($status,$id){
		$data = array(
			'status' => $status
		);
		$this->db->where('id',$id)->update('posts',$data);
		redirect('admin/berita');
	}

	function tambah(){
		$data = array();
		$this->load->view('backend/template/header');
		$this->load->view('backend/berita/tambah_berita',$data);
		$this->load->view('backend/template/footer');
	}

	function save(){
		$data = $this->input->post();
		$data['tanggal'] = date('Y-m-d H:i:s');
		$data['id'] = uniqid();
		$data['link'] = str_replace(" ", "-", strtolower($data['judul'])).'-'.$data['id'];
		$data['tags'] = implode(";", $data['tags']);
		$data['username'] = $this->session->userdata('username');
		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './assets/images/posts/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|PNG';
				
				$config['file_name'] = $data['id'].'-'.$x.'.jpg';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('userFile')){

                	$filedata = array(
                		'id_post' => $data['id'],
                		'nama_file' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s')
                	);

                	$this->db->insert('thumbnail',$filedata);

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

            unset($data['userFiles']);
        	
        }else{
        	echo 'nofile';
        }

        if(!empty($_FILES['attachments']['name'])){
            $filesCount = count($_FILES['attachments']['name']);

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['attachment']['name'] = $_FILES['attachments']['name'][$i];
                $_FILES['attachment']['type'] = $_FILES['attachments']['type'][$i];
                $_FILES['attachment']['tmp_name'] = $_FILES['attachments']['tmp_name'][$i];
                $_FILES['attachment']['error'] = $_FILES['attachments']['error'][$i];
                $_FILES['attachment']['size'] = $_FILES['attachments']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './assets/attachment/';
                $config['allowed_types'] = '*';
                
				$ext = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);

                $fn = strtolower(str_replace(" ", "-", pathinfo($_FILES['attachment']['name'], PATHINFO_FILENAME)));
				
				$config['file_name'] = $fn.'-'.$data['id'].'-'.$x.'.'.$ext;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('attachment')){

                	$filedata = array(
                		'id_post' => $data['id'],
                		'nama_file' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s')
                	);

                	$this->db->insert('attachment',$filedata);

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

            unset($data['attachments']);
        	
        }else{
        	echo 'nofile';
        }

        $this->db->insert('posts',$data);
        	
    	$this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data Berita berhasil disimpan.</div>');


		redirect('admin/berita');
	}

	function edit($link){
		$this->load->view('backend/template/header');
		$this->load->view('backend/berita/edit');
		$this->load->view('backend/template/footer');
	}

	function json_edit(){
		$data = $this->db->select('bidang.*, posts.*')
				->from('posts')
				->join('bidang','bidang.id=posts.id_bidang')
				->where('link',$this->input->post('link'))
				->get()->row_array();

		$data['tags'] = explode(";", $data['tags']);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function update(){
		$data = $this->input->post();
		$data['tanggal'] = date('Y-m-d H:i:s');
		$data['id'] = $data['xid'];
		unset($data['xid']);
		$data['link'] = str_replace(" ", "-", strtolower($data['judul'])).'-'.$data['id'];
		$data['tags'] = implode(";", $data['tags']);
		$data['username'] = $this->session->userdata('username');

		if(!empty($_FILES['userFiles']['name'][0])){
            $filesCount = count($_FILES['userFiles']['name']);
            
            $zxc = $this->db->where('id_post',$data['id'])->get('thumbnail')->result_array();
            foreach ($zxc as $z) {
            	unlink('./assets/images/posts/'.$z['nama_file']);
            }
            $this->db->where('id_post',$data['id'])->delete('thumbnail');

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './assets/images/posts/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|PNG';
				
				$config['file_name'] = $data['id'].'-'.$x.'.jpg';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('userFile')){

                	$filedata = array(
                		'id_post' => $data['id'],
                		'nama_file' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s')
                	);

                	$this->db->insert('thumbnail',$filedata);

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}	
            }

        	unset($data['userFiles']);


        	// echo 'ada';
        }else{
			// echo 'no';
        }

        if(!empty($_FILES['attachments']['name'][0])){
            $filesCount = count($_FILES['attachments']['name']);
            
            $zxc = $this->db->where('id_post',$data['id'])->get('attachment')->result_array();
            foreach ($zxc as $z) {
            	unlink('./assets/attachment/'.$z['nama_file']);
            }
            $this->db->where('id_post',$data['id'])->delete('attachment');

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['attachment']['name'] = $_FILES['attachments']['name'][$i];
                $_FILES['attachment']['type'] = $_FILES['attachments']['type'][$i];
                $_FILES['attachment']['tmp_name'] = $_FILES['attachments']['tmp_name'][$i];
                $_FILES['attachment']['error'] = $_FILES['attachments']['error'][$i];
                $_FILES['attachment']['size'] = $_FILES['attachments']['size'][$i];

                $x = $i+1;

                $config['upload_path'] = './assets/attachment/';
                $config['allowed_types'] = '*';
				
				$ext = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
				$fn = strtolower(str_replace(" ", "-", pathinfo($_FILES['attachment']['name'], PATHINFO_FILENAME)));
				
				$config['file_name'] = $fn.'-'.$data['id'].'-'.$x.'.'.$ext;
                
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('attachment')){

                	$filedata = array(
                		'id_post' => $data['id'],
                		'nama_file' => $config['file_name'],
                		'tgl_input' => date('Y-m-d H:i:s')
                	);

                	$this->db->insert('attachment',$filedata);

                }else{
					$error = array ('error' => $this->upload->display_errors());
					var_dump($error);
				}
            }

        	unset($data['attachments']);


        	// echo 'ada';
        }else{
			// echo 'no';
        }

    	$this->db->where('id',$data['id'])->update('posts',$data);
    	
    	$this->session->set_flashdata('alert','<div class="alert alert-secondary alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="far fa-info"></i></span> </button> <strong>Berhasil!</strong> Data Berita berhasil diperbarui.</div>');

		redirect('admin/berita');
	}


}
