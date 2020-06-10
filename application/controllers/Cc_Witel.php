<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cc_Witel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('logged_in') !== TRUE){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login Terlebih Dahulu!</div>');
			redirect('login');
		}

		$this->load->model('karyawan_m', 'karyawan');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function cc_non()
	{
		$data['title'] = 'CC Witel Non TREG IV | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelNon();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_non/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_non($id)
	{
		$data['title'] = 'Form Verifikasi CC | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('alpro', 'Alpro', 'required');
		$this->form_validation->set_rules('segmen', 'segmen Pelanggan', 'required');
		$this->form_validation->set_rules('isiska', 'Isiska', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_non/verify_non', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_non');
		}

	}

	/* Witel Semarang */

	public function cc_semarang()
	{
		$data['title'] = 'CC Witel Semarang | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelSemarang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_semarang/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_semarang($id)
	{
		$data['title'] = 'Pengecekan CC Semarang | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_semarang/verify_semarang', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_semarang');
		}

	}

	/* Witel Solo */

	public function cc_solo()
	{
		$data['title'] = 'CC Witel Solo | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelSolo();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_solo/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_solo($id)
	{
		$data['title'] = 'Pengecekan CC Solo | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_solo/verify_solo', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_solo');
		}

	}

	/* Witel Yogyakarta */

	public function cc_yogya()
	{
		$data['title'] = 'CC Witel Yogyakarta | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelYogya();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_yogya/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_yogya($id)
	{
		$data['title'] = 'Pengecekan CC Yogyakarta | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_yogya/verify_yogya', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_yogya');
		}

	}

	/* Witel Magelang */

	public function cc_magelang()
	{
		$data['title'] = 'CC Witel Magelang | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelMagelang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_magelang/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_magelang($id)
	{
		$data['title'] = 'Pengecekan CC Magelang | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_magelang/verify_magelang', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_magelang');
		}

	}

	/* Witel Pekalongan */

	public function cc_pekalongan()
	{
		$data['title'] = 'CC Witel Pekalongan | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelPekalongan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_pekalongan/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_pekalongan($id)
	{
		$data['title'] = 'Pengecekan CC Pekalongan | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_pekalongan/verify_pekalongan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_pekalongan');
		}

	}

	/* Witel Purwokerto */

	public function cc_purwokerto()
	{
		$data['title'] = 'CC Witel Purwokerto | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelPurwokerto();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_purwokerto/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_purwokerto($id)
	{
		$data['title'] = 'Pengecekan CC Pekalongan | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_purwokerto/verify_purwokerto', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_purwokerto');
		}

	}

	/* Witel Kudus */

	public function cc_kudus()
	{
		$data['title'] = 'CC Witel Kudus | Fasteljab V.1';

		$data['witel'] = $this->karyawan->getCCWitelKudus();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('cc_witel/cc_kudus/index', $data);
		$this->load->view('templates/footer');
	}

	public function verify_kudus($id)
	{
		$data['title'] = 'Pengecekan CC Kudus | Fasteljab V.1';
		$data['witel'] = $this->karyawan->getDataAllByNik($id);

		$data['bandposisi'] = ['I', 'II', 'III', 'IV', 'V'];
		$data['jabatan'] = ['AM', 'ASMAN', 'EAM', 'DEVP', 'DGN WITEL', 'EVP', 'GM WITEL', 'JM', 'JAM', 'JAM 1', 'JAM 2', 'KAKANDATEL', 'MGR', 'OFF 1', 'OFF 2', 'OFF 3', 'OSM', 'SAN SUPERVISORY', 'SAM', 'SA 2', 'SENIOR EXPERT', 'SENIOR STAFF III', 'SM', 'SPV PLAZA', 'SPV SITE OPERATION & POJ', 'MPP', 'PENSIUN', 'KDMP', 'Rehire', 'Prohire', 'Anak Perusahaan', 'Pelanggan BGES', 'Dinastel Kantor'];
		$data['lok_fasteljab'] = ['Witel Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Purwokerto', 'Witel Pekalongan', 'Witel Kudus'];
		$data['lok_kerja'] = ['Kantor DIV IV','Non TREG IV', 'Witel Semarang', 'Witel Solo', 'Witel Yogyakarta', 'Witel Magelang', 'Witel Pekalongan', 'Witel Purwokerto', 'Witel Kudus'];
		$data['non_fo']	= ['1 Mbps', '2 Mbps', '3 Mbps', '5 Mbps'];
		$data['fo']	= ['10 Mbps', '20 Mbps', '50 Mbps', '100 Mbps'];
		$data['kuota'] = ['20 GB', '100 GB', 'Unlimited'];
		$data['pagu_telp'] = ['Rp. 250.000,-', 'Rp. 300.000,-', 'Rp. 400.000,-', 'Rp. 500.000,-', 'Rp 600.000,-'];
		$data['usee_tv'] = ['All Channel', '64 Channel'];

		$data['alpro'] = ['On Check','FO', 'Non FO'];
		$data['segmen'] = ['On Check','Dinastel Rumah', 'Reguler(Berbayar)'];
		$data['status'] = ['On Check','Perlu Disesuaikan', 'Sudah Sesuai'];
		$data['isiska'] = ['On Check','Sudah Ada', 'Belum Ada', 'Tidak Perlu Ada'];

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('cc_witel/cc_kudus/verify_kudus', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editDataCc();
			$this->session->set_flashdata('flash_data', 'Diedit');
			redirect('cc_witel/cc_kudus');
		}

	}

}