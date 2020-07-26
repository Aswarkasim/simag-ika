<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persuratan extends CI_Controller
{

  public function index()
  {
    //$id_peserta = $this->session->userdata('id_peserta');
    //$profil = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
    $data = [
      //'profil'    => $profil,
      'content'   => 'user/persuratan/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }
}

/* End of file Controllername.php */
