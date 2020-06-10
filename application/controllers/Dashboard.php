<?php

/**
 * 
 */
class Dashboard extends CI_Controller {

	
	public function index()
	{
		//Allowing akses to admin only
			$data['title'] = 'Dashboard Fasteljab V.1';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('templates/footer');
		
	}

	function user(){
    //Allowing akses to user only

    	$data['title'] = 'Dashboard Fasteljab V.1';
    	
    	$this->load->view('templates/header', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('dashboard/index', $data);
  }
}