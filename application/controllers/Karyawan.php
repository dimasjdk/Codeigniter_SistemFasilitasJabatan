<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('karyawan_m');
	}

	public function index()
	{
		$data['title'] = 'Fasteljab V.1';
		$data['karyawan'] = $this->karyawan_m->getDataAll();

		$this->load->view('front/header', $data);
		$this->load->view('front/index');
		$this->load->view('front/footer');
	}

}