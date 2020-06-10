<?php

/**
 * 
 */
class Magang_m extends CI_Model 
{ 
	// public function getDataCoba()
	// {
	// 	$query = $this->db->get('tb_data');
	// 	 return $query->result_array();
	// }
	
	public function getAllMagang()
	{	  
		$this->db->select('*');
        $this->db->from('tb_data');
        $this->db->join('tb_unit','unit = id_unit', 'left');
        $this->db->join('tb_sub_unit','sub = id_sub', 'left'); 
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getMagang($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('mulai', $keyword);
			$this->db->or_like('sekolah', $keyword);
			$this->db->or_like('jurusan', $keyword);
			$this->db->or_like('jenis', $keyword);
		}

		$this->db->order_by('id', 'desc');
		$query = $this->db->get('tb_data', $limit, $start);
		return $query->result_array();	  
	}

	public function countAllMagang()
	{
		return $this->db->get('tb_data')->num_rows();
	}

	public function getAllProses()
	{	  
		$this->db->select('*');
        $this->db->from('tb_proses');
        $this->db->join('tb_unit','unit = id_unit', 'left');
        $this->db->join('tb_sub_unit','sub = id_sub', 'left'); 
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getProses($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('unit', $keyword);
			$this->db->or_like('mentor', $keyword);
			$this->db->or_like('nik', $keyword);
		}

		$this->db->order_by('id', 'desc');
		$query = $this->db->get('tb_proses', $limit, $start);
		return $query->result_array();	

		// return $this->db->get('tb_proses')->result_array();
	}

	public function countAllProses()
	{
		return $this->db->get('tb_proses')->num_rows();
	}

	public function getAllSelesai()
	{
		$this->db->select('*');
        $this->db->from('tb_selesai');
        $this->db->join('tb_unit','unit = id_unit', 'left');
        $this->db->join('tb_sub_unit','sub = id_sub', 'left'); 
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getSelesai($limit)
	{

		$this->db->order_by('id', 'desc');
		$query = $this->db->get('tb_selesai', $limit);
		return $query->result_array();	

		// return $this->db->get('tb_proses')->result_array();
	}

	public function addDataMagang()
	{
		
		$data = [
		
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"nomor" => $this->input->post('nomor', true),
			"nomor2" => $this->input->post('nomor2', true),
			"sekolah" => $this->input->post('sekolah', true),
			"jurusan" => $this->input->post('jurusan', true),
			"tingkat" => $this->input->post('tingkat', true),
			"mulai" => $this->input->post('mulai', true),
			"akhir" => $this->input->post('akhir', true),
			"jenis" => $this->input->post('jenis', true),
			"tambahan" => $this->input->post('tambahan', true),
			"keterangan" => $this->input->post('keterangan', true),
			"date_created" => time()
		];

		$this->db->insert('tb_data', $data);

		// $data = $this->input->post();
		// $this->surat = $this-> _uploadImage();
		// $this->nama = $data['nama'];
		// $this->email = $data['email'];
		// $this->nomor = $data['sekolah'];
		// $this->jurusan = $data['jurusan'];
		// $this->tingkat = $data['tingkat'];
		// $this->mulai = $data['mulai'];
		// $this->akhir = $data['akhir'];
		// $this->jenis = $data['jenis'];
		// $this->tambahan = $data['tambahan'];
		// $this->db->insert($this->_table, $this);
	}

	

	public function hapusDataDraft($id)
	{
		// $this->db->where('id', $id); aslinya sama saja cuman syntac yang bawah lebih baru
		// $this->db->delete('tb_data');

		$this->db->delete('tb_data', ['id' => $id]);
	}

	public function hapusDataProses($id)
	{
		$this->db->delete('tb_proses', ['id' => $id]);
	}

	public function hapusDataSelesai($id)
	{
		$this->db->delete('tb_selesai', ['id' => $id]);
	}



//sini


	public function getMagangByProses($id)
	{

		$query = $this->db->get_where('tb_proses', ['id' => $id])->row_array();
		return $query;

	}

	public function getMagangBySelesai($id)
	{
		return $this->db->get_where('tb_selesai', ['id' => $id])->row_array();

	}

	public function getMagangByBatal($id)
	{
		return $this->db->get_where('tb_batal', ['id' => $id])->row_array();

	}

	public function ubahDataDraft()
	{
		$data = [
			// Berkas data
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"nomor" => $this->input->post('nomor', true),
			"nomor2" => $this->input->post('nomor2', true),
			"sekolah" => $this->input->post('sekolah', true),
			"jurusan" => $this->input->post('jurusan', true),
			"tingkat" => $this->input->post('tingkat', true),
			"mulai" => $this->input->post('mulai', true),
			"akhir" => $this->input->post('akhir', true),
			"jenis" => $this->input->post('jenis', true),
			"tambahan" => $this->input->post('tambahan', true),

			"unit" => $this->input->post('unit', true),
			"sub" => $this->input->post('sub', true),
			"mentor" => $this->input->post('mentor', true),
			"nik" => $this->input->post('nik', true),
			"keterangan" => $this->input->post('keterangan', true),
			
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_data', $data);
	}

	public function ubahDataStatus()
	{
		$data = [
			
			"keterangan" => $this->input->post('keterangan', true),	
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_proses', $data);
	}


	public function ubahDataProses()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"nomor" => $this->input->post('nomor', true),
			"nomor2" => $this->input->post('nomor2', true),
			"sekolah" => $this->input->post('sekolah', true),
			"jurusan" => $this->input->post('jurusan', true),
			"tingkat" => $this->input->post('tingkat', true),
			"mulai" => $this->input->post('mulai', true),
			"akhir" => $this->input->post('akhir', true),
			"jenis" => $this->input->post('jenis', true),
			"tambahan" => $this->input->post('tambahan', true),
			"surat" => $this->input->post('surat', true),

			// Validasi mentor & unit
			"unit" => $this->input->post('unit', true),
			"sub" => $this->input->post('sub', true),
			"mentor" => $this->input->post('mentor', true),
			"nik" => $this->input->post('nik', true),
			"keterangan" => $this->input->post('keterangan', true),


			// "tgl" => $this->input->post('tgl', true),

			
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_proses', $data);
	}

	public function updateMentorDraft()
	{
		$data = [
			"unit" => $this->input->post('unit', true),
			"sub" => $this->input->post('sub', true),
			"mentor" => $this->input->post('mentor', true),
			"nik" => $this->input->post('nik', true),
			"keterangan" => $this->input->post('keterangan', true),

		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_data', $data);

	}

	public function updateStatusFix()
	{
		$data = [
			
			"keterangan" => $this->input->post('keterangan', true),

		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_data', $data);

	}

	public function getDataWhere($tbl,$where="")
	{
		$data = $this->db->query('select * from '.$tbl.' '.$where);
		return $data->result_array();
	}

	public function getDataWhere2($tbl,$isi="")
	{
		$data = $this->db->query('select * from '.$tbl.' '.$isi);
		return $data->result_array();
	}

	public function insert($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function insertProses($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function insertSelesai($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function insertBatal($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	///hapus data array
	public function deleteProses($table,$where)
	{
		return $this->db->delete($table,$where);
	}

	public function deleteSelesai($table,$where)
	{
		return $this->db->delete($table,$where);
	}

	public function deleteBatal($table,$where)
	{
		return $this->db->delete($table,$where);
	}

	public function getMagangByDraft($id)
	{
		$query = $this->db->get_where('tb_data', ['id' => $id])->row_array();
		return $query;

	}

	function get_unit()
	{
		$query = $this->db->get('tb_unit');
        return $query;  
	}

	function get_sub_unit($id_unit)
	{
        $query = $this->db->get_where('tb_sub_unit', array('sub_unit_id' => $id_unit));
        return $query;
    }

    public function getAllBatal()
	{	  
		 $this->db->select('*');
        $this->db->from('tb_batal');
        $this->db->join('tb_unit','unit = id_unit', 'left');
        $this->db->join('tb_sub_unit','sub = id_sub', 'left'); 
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
	}


}




// private function _uploadImage()
	// {
	// 	//image adalah nama field db (petanikode)
	// 	$config['upload_path']          = './assets/berkas/';
	// 	$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 	$config['file_name']            = $this->id;
	// 	$config['overwrite']			= true;
	//     $config['max_size']             = 1024; // 1MB
	//     // $config['max_width']            = 1024;
	//     // $config['max_height']           = 768;

	//     $this->load->library('upload', $config);

	//     if ($this->upload->do_upload('surat')) {
	//     	return $this->upload->data("file_name");
	//     }
	    
	//     return "default.jpg";
	// }
	
	// private function _UploadImage()
	// {
	// 	$config['upload_path'] = '.assets/berkas';
	// 	$config['allowed_types'] = 'gif|jpg|png';
	// 	$config['file_name'] = $this->id;
	// 	$config['max_size'] = 1024;

	// 	$this->load->library('upload', $config);

	// 	if ($this->upload->do_upload('image')) {
	// 		return $this->upload->data("file_name");
	// 	}
	// }