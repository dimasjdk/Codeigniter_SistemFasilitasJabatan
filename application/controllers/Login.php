<?php

class Login extends CI_Controller{


  function __construct(){

    parent::__construct();
    $this->load->model('login_model', 'login_m');
  }

  function index(){

    $data['title'] = 'Login Fasteljab V.1';
    
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/login', $data);
    $this->load->view('templates/auth_footer');
  }

  function auth(){
    $username = $this->input->post('username');
    $password = $this->input->post('password',TRUE);
    $validate = $this->login_m->validate($username,$password);
      if($validate->num_rows() > 0){
          $data     = $validate->row_array();
          $unit     = $data['unit'];
          $username = $data['username'];
          $role     = $data['role'];
          $sesdata  = array(
            'unit'      => $unit,
            'username'  => $username,
            'role'      => $role,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
          // access login for admin
          if($role === '1'){
            redirect('dashboard');

            // access login for user
          }elseif ($role === '2') {
            redirect('dashboard');

          }else{
            redirect('dashboard');
        }
      }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password Salah</div>');
        redirect('login');
      }
  }

  function logout(){
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('/');
  }

}