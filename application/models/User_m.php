<?php

/**
 * 
 */
class User_m extends CI_Model
{
	
	public function getAllUser()
	{
		return $this->db->get('tb_user')->result_array();
	}

	public function addUserId()
	{
		
		$data = [
			"unit" 		=> $this->input->post('unit', true),
			"username" 	=> $this->input->post('username', true),
			"password" 	=> $this->input->post('password', true),
			"role" 		=> $this->input->post('role', true)
			

		];

		$this->db->insert('tb_user', $data);
	}

	public function editUser()
	{
		$data = [
			"unit" => $this->input->post('unit', true),
			"username" => $this->input->post('username', true),
			"password" => $this->input->post('password', true),

		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_user', $data);
	}

	public function getUserById($id)
	{
		return $this->db->get_where('tb_user', ['id' => $id])->row_array();

	}

	public function hapusUser($id)
	{
		$this->db->delete('tb_user', ['id' => $id]);
	}
}