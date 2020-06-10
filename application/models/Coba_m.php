<?php
class Coba_m extends CI_Model{

  

  function tampil_data()
  {
  	return $this->db->get('coba');

  }

  function input_data()
  {
  	return $this->db->insert('coba');
  }

}
