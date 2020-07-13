<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function index()
  {

    $data = [
      'content' => 'home/home/login'
    ];
    $this->load->view('home/layout/wrapper', $data);
  }

  public function register()
  {

    $data = [
      'content' => 'home/home/register'
    ];
    $this->load->view('home/layout/wrapper', $data);
  }
}
