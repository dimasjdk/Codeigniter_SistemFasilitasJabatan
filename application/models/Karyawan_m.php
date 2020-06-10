<?php

/**
 * 
 */
class Karyawan_m extends CI_Model 
{ 
	public function getDataAll()
	{
		$this->db->select('*');
        $this->db->from('tb_coba'); 
        $this->db->order_by('nik', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDataAllByNik($id)
	{
		$query = $this->db->get_where('tb_coba', ['id' => $id])->row_array();
		return $query;
	}

	public function getDataKantorDiv()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Kantor DIV IV' ");
		return $query->result_array();
	}

	public function getDataNonTreg()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Non TREG IV' ");
		return $query->result_array();
	}

	public function getDataWitelSemarang()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Semarang' ");
		return $query->result_array();
	}

	public function getDataWitelSolo()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Solo' ");
		return $query->result_array();
	}

	public function getDataWitelYogya()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Yogyakarta' ");
		return $query->result_array();
	}

	public function getDataWitelMagelang()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Magelang' ");
		return $query->result_array();
	}

	public function getDataWitelPekalongan()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Pekalongan' ");
		return $query->result_array();
	}

	public function getDataWitelPurwokerto()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Purwokerto' ");
		return $query->result_array();
	}

	public function getDataWitelKudus()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_kerja = 'Witel Kudus' ");
		return $query->result_array();
	}
	
	public function addDataKaryawan()
	{
		$data = [

			"nik" => $this->input->post('nik', true),
			"nama" => $this->input->post('nama', true),
			"posisi" => $this->input->post('posisi', true),
			"jabatan" => $this->input->post('jabatan', true),
			"lok_kerja" => $this->input->post('lok_kerja', true),
			"lok_fasteljab" => $this->input->post('lok_fasteljab', true),
			"pagu_telp" => $this->input->post('pagu_telp', true),
			"non_fo" => $this->input->post('non_fo', true),
			"fo" => $this->input->post('fo', true),
			"kuota" => $this->input->post('kuota', true),
			"usee_tv" => $this->input->post('usee_tv', true),
			"no_internet" => $this->input->post('no_internet', true),
			"no_telp" => $this->input->post('no_telp', true),
			"alpro" => $this->input->post('alpro', true),
			"isiska" => $this->input->post('isiska', true),
			"segmen" => $this->input->post('segmen', true),
			"status" => $this->input->post('status', true)
		];

		$this->db->insert('tb_coba', $data);

	}

	public function editDataAll()
	{
		$getPost_pugu_telp 	= $this->input->post('pagu_telp', true);
		$getPost_non_fo 	= $this->input->post('non_fo', true);
		$getPost_fo 		= $this->input->post('fo', true);
		$getPost_useetv		= $this->input->post('usee_tv', true);
		$getData = $this->db->get_where('tb_coba', array('id' => $this->input->post('id') ) );
		$arrData = $getData->result_array();

		if ($arrData[0]['pagu_telp'] !== $getPost_pugu_telp || $arrData[0]['non_fo'] !== $getPost_non_fo || $arrData[0]['fo'] !== $getPost_fo || $arrData[0]['usee_tv'] !== $getPost_useetv) {
			$status = 'On Check';
		} else {
			//updated
			$status = $arrData[0]['status'];
		}

		$data = [

			"nama" => $this->input->post('nama', true),
			"posisi" => $this->input->post('posisi', true),
			"jabatan" => $this->input->post('jabatan', true),
			"lok_kerja" => $this->input->post('lok_kerja', true),
			"lok_fasteljab" => $this->input->post('lok_fasteljab', true),
			"pagu_telp" => $this->input->post('pagu_telp', true),
			"non_fo" => $this->input->post('non_fo', true),
			"fo" => $this->input->post('fo', true),
			"kuota" => $this->input->post('kuota', true),
			"usee_tv" => $this->input->post('usee_tv', true),
			"no_internet" => $this->input->post('no_internet', true),
			"no_telp" => $this->input->post('no_telp', true),
			"status" => $status
			
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_coba', $data);
	}

	
	
	public function hapusKaryawanById($id)
	{
		$this->db->delete('tb_coba', ['id' => $id]);
	}

	public function editDataCc()
	{
		$data = [

			"alpro" => $this->input->post('alpro', true),
			"segmen" => $this->input->post('segmen', true),
			"status" => $this->input->post('status', true),
			"isiska" => $this->input->post('isiska', true),
			"keterangan" => $this->input->post('keterangan', true)
			
			
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_coba', $data);
	}

	public function getCCWitelNon()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Non TREG IV' ");
		return $query->result_array();
	}

	public function getCCWitelSemarang()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Semarang' ");
		return $query->result_array();
	}

	public function getCCWitelSolo()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Solo' ");
		return $query->result_array();
	}

	public function getCCWitelYogya()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Yogyakarta' ");
		return $query->result_array();
	}

	public function getCCWitelMagelang()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Magelang' ");
		return $query->result_array();
	}

	public function getCCWitelPekalongan()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Pekalongan' ");
		return $query->result_array();
	}

	public function getCCWitelPurwokerto()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Purwokerto' ");
		return $query->result_array();
	}

	public function getCCWitelKudus()
	{
		$query = $this->db->query("SELECT * FROM tb_coba WHERE lok_fasteljab = 'Witel Kudus' ");
		return $query->result_array();
	}



}