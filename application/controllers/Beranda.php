<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		// $this->output->cache(60);
		$data['bidang'] = $this->db->get('bidang')->result_array();
		$data['aplikasi'] = $this->db->get('aplikasi')->result_array();
		$data['carousel'] = $this->db->where('status','1')->get('carousel')->result_array();
		$data['terbaru'] = $this->db->select('bidang.*, posts.*')
				->from('posts')
				->join('bidang','bidang.id=posts.id_bidang')
				->where('status','1')
				->order_by('tanggal','desc')
				->limit(6)
				->get()->result_array();

		$z = 0;

	    while ($z < count($data['terbaru'])) {
      		$resp = $this->db->where('id_post',$data['terbaru'][$z]['id'])->get('thumbnail')->result_array();

      		if ($resp) {
      			foreach ($resp as $v) {
	      			$data['terbaru'][$z]['thumbnail'][] = array(
	      				'nama_file' => $v['nama_file']
	      			);
	      		}	
      		}else{
      			$data['terbaru'][$z]['thumbnail'] = array();
      		}
      		
        	$z += 1;
	    }
		$this->load->view('template/header');
		$this->load->view('beranda/index',$data);
		$this->load->view('template/footer');
	}
}
