<?php

/**
 * 
 */
class User extends CI_Controller
{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login Terlebih Dahulu!</div>');
			redirect('login');
		}

		$this->load->model('user_m', 'user');
		$this->load->library('form_validation');
	}	

	public function index()
	{
		$data['title'] = 'Data User ID';
		$data['user'] = $this->user->getAllUser();
		$data['witel'] = ['Kantor DIV IV', 'Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
	}

	public function add()
	{
		$data['title'] = 'Form Tambah User ID';

		$this->form_validation->set_rules('unit', 'Nama', 'required');
		$this->form_validation->set_rules('role', 'Unit', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/add', $data);
			$this->load->view('templates/footer');
		} else {
			$this->user->addUserId();
			$this->session->set_flashdata('flash_user', 'Ditambahkan');
			redirect('user');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Form Edit User';
		$data['user'] = $this->user->getUserById($id);

		// <!-- validasi untuk form tambah magang -->
		$this->form_validation->set_rules('unit', 'Unit', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->user->editUser();
			$this->session->set_flashdata('flash_user', 'Diedit');
			redirect('user');
		}
	}

	public function hapus($id)
	{
		$this->user->hapusUser($id);
		$this->session->set_flashdata('flash_user', 'Dihapus');
		redirect('user');
	}
}