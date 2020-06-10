<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Karyawan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('logged_in') !== TRUE){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login Terlebih Dahulu!</div>');
			redirect('login');
		}

		$this->load->model('Karyawan_m', 'karyawan');
		$this->load->library('form_validation');
	}

	public function add_div()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-', 'SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/kantor_div/add_div', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/kantor_div');
		}
	}

	public function edit_div($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		
		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/kantor_div/edit_div', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/kantor_div');
		}

	}

	public function hapus_div($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/kantor_div');
	}

	public function kantor_div()
	{

		$data['title'] = 'Kantor DIV IV | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataKantorDiv();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/kantor_div/index', $data);
		$this->load->view('templates/footer');
	}

	public function all_karyawan()
	{

		$data['title'] = 'All Karyawan | Fasteljab V.1';

		$data['all'] = $this->karyawan->getDataAll();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/all/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_all($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/all_karyawan');
	}

	public function edit_all($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		
		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/all/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/all_karyawan');
		}

	}



	/* Non TREG IV */

	public function add_non()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/non_treg/add_non', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/non_treg');
		}
	}

	public function edit_non($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/non_treg/edit_non', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/non_treg');
		}

	}

	public function hapus_non($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/non_treg');
	}

	public function non_treg()
	{

		$data['title'] = 'Non TREG IV | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataNonTreg();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/non_treg/index', $data);
		$this->load->view('templates/footer');
	}

	/* Witel Semarang */

	public function add_semarang()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/semarang/add_semarang', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_semarang');
		}
	}

	public function edit_semarang($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/semarang/edit_semarang', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_semarang');
		}

	}

	public function hapus_semarang($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_semarang');
	}

	public function witel_semarang()
	{

		$data['title'] = 'Witel Semarang | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelSemarang();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/semarang/index', $data);
		$this->load->view('templates/footer');
	}


	/* Witel Solo */

	public function add_solo()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/solo/add_solo', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_solo');
		}
	}

	public function edit_solo($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/solo/edit_solo', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_solo');
		}

	}

	public function hapus_solo($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_solo');
	}

	public function witel_solo()
	{

		$data['title'] = 'Witel Solo | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelSolo();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/solo/index', $data);
		$this->load->view('templates/footer');
	}

	/* Witel Yogyakart */

	public function add_yogya()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/yogyakarta/add_yogya', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_yogya');
		}
	}

	public function edit_yogya($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/yogyakarta/edit_yogya', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_yogya');
		}

	}

	public function hapus_yogya($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_yogya');
	}

	public function witel_yogya()
	{

		$data['title'] = 'Witel Yogyakarta | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelYogya();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/yogyakarta/index', $data);
		$this->load->view('templates/footer');
	}

	/* Witel Magelang */

	public function add_magelang()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/magelang/add_magelang', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_magelang');
		}
	}

	public function edit_magelang($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/magelang/edit_magelang', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_magelang');
		}

	}

	public function hapus_magelang($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_magelang');
	}

	public function witel_magelang()
	{

		$data['title'] = 'Witel Magelang | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelMagelang();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/magelang/index', $data);
		$this->load->view('templates/footer');
	}

	/* Witel Pekalongan */

	public function add_pekalongan()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/pekalongan/add_pekalongan', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_pekalongan');
		}
	}

	public function edit_pekalongan($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/pekalongan/edit_pekalongan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_pekalongan');
		}

	}

	public function hapus_pekalongan($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_pekalongan');
	}

	public function witel_pekalongan()
	{

		$data['title'] = 'Witel Pekalongan | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelPekalongan();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/pekalongan/index', $data);
		$this->load->view('templates/footer');
	}

	/* Witel Purwokerto */

	public function add_purwokerto()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/purwokerto/add_purwokerto', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_purwokerto');
		}
	}

	public function edit_purwokerto($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/purwokerto/edit_purwokerto', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_purwokerto');
		}

	}

	public function hapus_purwokerto($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_purwokerto');
	}

	public function witel_purwokerto()
	{

		$data['title'] = 'Witel Purwokerto | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelPurwokerto();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/purwokerto/index', $data);
		$this->load->view('templates/footer');
	}

	/* Witel Kudus */

	public function add_kudus()
	{
		$data['title'] = 'Tambah Karyawan | Fasteljab V.1';

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/kudus/add_kudus', $data);
			$this->load->view('templates/footer');
			$this->session->set_flashdata('flash_gagal', 'Ditambahkan');
		} else {
			$this->karyawan->addDataKaryawan();
			$this->session->set_flashdata('flash_data', 'Ditambahkan');
			redirect('data_karyawan/witel_kudus');
		}
	}

	public function edit_kudus($id)
	{
		$data['title'] = 'Edit Karyawan | Fasteljab V.1';

		$data['karyawan'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V', 'VI'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor', 'Lainnya'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['0', '1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['0', '10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['0', '20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['0', 'Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-','SKO'];
		$data['usee_tv'] = ['0', 'All Channel', '64 Channel'];
		
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];

		// $this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Band Posisi', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		// $this->form_validation->set_rules('lok_kerja', 'Lokasi Kerja', 'required');
		$this->form_validation->set_rules('lok_fasteljab', 'Lokasi Fasteljab', 'required');
		$this->form_validation->set_rules('pagu_telp', 'Pagu Telvon Rumah', 'required');
		$this->form_validation->set_rules('non_fo', 'Pagu Internet Non FO', 'required');
		$this->form_validation->set_rules('fo', 'Pagu Internet FO (Speed)', 'required');
		$this->form_validation->set_rules('kuota', 'Pagu Internet FO (Kuota)', 'required');
		$this->form_validation->set_rules('usee_tv', 'Pagu Usee_Tv', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telephone Rumah', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data_karyawan/kudus/edit_kudus', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataAll();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('data_karyawan/witel_kudus');
		}

	}

	public function hapus_kudus($id)
	{
		$this->karyawan->hapusKaryawanById($id);
		$this->session->set_flashdata('flash_data', 'Dihapus');
		redirect('data_karyawan/witel_kudus');
	}

	public function witel_kudus()
	{

		$data['title'] = 'Witel Magelang | Fasteljab V.1';

		$data['kantor'] = $this->karyawan->getDataWitelKudus();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data_karyawan/kudus/index', $data);
		$this->load->view('templates/footer');
	}

	

}














