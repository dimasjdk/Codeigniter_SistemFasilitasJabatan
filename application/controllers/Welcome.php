<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Coba_m', 'coba');
	}

	public function index()
	{
		// $data['title'] = 'Detail Coba';
		// $data['magang'] = $this->coba->getAllMagang();
		$data['coba'] = $this->coba->tampil_data()->result();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('magang/coba_v', $data);
        $this->load->view('templates/footer');
	}

	public function add()
	{
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		

		$data = array(

			'nama' => $nama,
			'tgl_lahir' => $tgl_lahir
			);

		$this->coba->input_data('coba', $data);
		redirect('welcome/index');
	}


}
