<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    is_logged_in_admin();
    $this->load->model('admin/Admin_model', 'AM');
  }


  public function index()
  {



    $peserta = $this->AM->listPeserta();
    $data = [
      'add'      => 'admin/peserta/add',
      'edit'      => 'admin/peserta/edit/',
      'delete'      => 'admin/peserta/delete/',
      'peserta'      => $peserta,
      'content'   => 'admin/peserta/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function detail($id_peserta)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $peserta = $this->AM->detailPeserta($id_peserta);
    $pembimbing = $this->Crud_model->listingOneAll('tbl_pembimbing', 'id_instansi', $id_instansi);
    $penugasan = $this->Crud_model->listingOneAll('tbl_pekerjaan', 'id_instansi', $id_instansi);

    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_peserta', $id_peserta);
    $data = [
      'peserta' => $peserta,
      'pembimbing' => $pembimbing,
      'penugasan' => $penugasan,
      'laporan'     => $laporan,
      'content'  => 'admin/peserta/detail'
    ];
    $this->load->view('/layout/wrapper', $data, FALSE);
  }



  function add()
  {

    $instansi =  $this->Crud_model->listing('tbl_instansi');

    $valid = $this->form_validation;

    $valid->set_rules('username', 'Nama Peserta', 'required');
    $valid->set_rules('email', 'Email', 'required|is_unique[tbl_peserta.email]|valid_email');
    $valid->set_rules('password', 'Password', 'required');
    $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Tambah Peserta',
        'add'       => 'admin/peserta/add',
        'instansi'  => $instansi,
        'back'      => 'admin/peserta',
        'content'   => 'admin/peserta/add'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;
      $data = [
        'id_peserta'        => random_string('numeric', '15'),
        'username_peserta'     => $i->post('username'),
        'email'         => $i->post('email'),
        'password'      => sha1($i->post('password')),
        'id_instansi'          => $i->post('id_instansi'),
        'is_active'     => 1
      ];
      $this->Crud_model->add('tbl_peserta', $data);
      $this->session->set_flashdata('msg', 'ditambah');
      redirect('admin/peserta/add', 'refresh');
    }
  }

  function edit($id_peserta)
  {
    $peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
    $instansi =  $this->Crud_model->listing('tbl_instansi');

    $valid = $this->form_validation;

    $valid->set_rules('username', 'Nama Peserta', 'required');
    $valid->set_rules('email', 'Email', 'required|valid_email');
    $valid->set_rules('password', 'Password', 'matches[re_password]');
    $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Edit ' . $peserta->username_peserta,
        'edit'       => 'admin/peserta/edit/',
        'back'      => 'admin/peserta',
        'peserta'      => $peserta,
        'instansi'      => $instansi,
        'content'   => 'admin/peserta/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;

      $password = "";
      if ($i->post('password') != "") {
        $password = sha1($i->post('password'));
      } else {
        $password = $peserta->password;
      }
      $data = [
        'id_peserta'       => $id_peserta,
        'username_peserta'     => $i->post('username'),
        'email'         => $i->post('email'),
        'password'      => $password,
        'id_instansi'          => $i->post('id_instansi'),
        'is_active'     => '1'
      ];
      $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
      $this->session->set_flashdata('msg', 'diedit');
      redirect('admin/peserta/edit/' . $id_peserta, 'refresh');
    }
  }

  function delete($id_peserta)
  {
    $this->Crud_model->delete('tbl_peserta', 'id_peserta', $id_peserta);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/peserta');
  }
}
