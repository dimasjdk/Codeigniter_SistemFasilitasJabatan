<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_m extends CI_model {

	public function selectAllKaryawan()
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrKantorDiv($lok_kerja = 'Kantor DIV IV')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrNonTreg($lok_kerja = 'Non TREG IV')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrSemarang($lok_kerja = 'Witel Semarang')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrSolo($lok_kerja = 'Witel Solo')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrYogyakarta($lok_kerja = 'Witel Yogyakarta')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrMagelang($lok_kerja = 'Witel Magelang')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrPekalongan($lok_kerja = 'Witel Pekalongan')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrPurwokerto($lok_kerja = 'Witel Purwokerto')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectHrKudus($lok_kerja = 'Witel Kudus')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_kerja', $lok_kerja);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	// Data export cc

	public function selectCcNonTreg($lok_fasteljab = 'Witel Non TREG IV')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectCcSemarang($lok_fasteljab = 'Witel Semarang')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}	
	
	public function selectCcSolo($lok_fasteljab = 'Witel Solo')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectCcYogyakarta($lok_fasteljab = 'Witel Yogyakarta')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectCcMagelang($lok_fasteljab = 'Witel Magelang')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectCcPekalongan($lok_fasteljab = 'Witel Pekalongan')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectCcPurwokerto($lok_fasteljab = 'Witel Purwokerto')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}

	public function selectCcKudus($lok_fasteljab = 'Witel Kudus')
	{

		$this->db->select('*');
		$this->db->from('tb_coba');
		$this->db->where('lok_fasteljab', $lok_fasteljab);
		$this->db->order_by('nik', 'asc');
		return $this->db->get();	
	}


}