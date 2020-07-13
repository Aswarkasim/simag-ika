<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    $peserta = $this->Crud_model->listing('tbl_peserta');
    $data = [
      'add'      => 'admin/peserta/add',
      'edit'      => 'admin/peserta/edit/',
      'delete'      => 'admin/peserta/delete/',
      'peserta'      => $peserta,
      'content'   => 'admin/peserta/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }



  function add()
  {

    $valid = $this->form_validation;

    $valid->set_rules('pesertaname', 'Nama Peserta', 'required');
    $valid->set_rules('email', 'Email', 'required|is_unique[tbl_peserta.email]|valid_email');
    $valid->set_rules('password', 'Password', 'required');
    $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Tambah Peserta',
        'add'       => 'admin/peserta/add',
        'back'      => 'admin/peserta',
        'content'   => 'admin/peserta/add'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;
      $data = [
        'pesertaname'     => $i->post('pesertaname'),
        'email'         => $i->post('email'),
        'password'      => sha1($i->post('password')),
        'role'          => $i->post('role'),
        'is_active'     => $i->post('is_aktif')
      ];
      $this->Crud_model->add('tbl_peserta', $data);
      $this->session->set_flashdata('msg', 'ditambah');
      redirect('admin/peserta/add', 'refresh');
    }
  }

  function edit($id_peserta)
  {
    $peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);

    $valid = $this->form_validation;

    $valid->set_rules('pesertaname', 'Nama Peserta', 'required');
    $valid->set_rules('email', 'Email', 'required|valid_email');
    $valid->set_rules('password', 'Password', 'matches[re_password]');
    $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Edit ' . $peserta->pesertaname,
        'edit'       => 'admin/peserta/edit/',
        'back'      => 'admin/peserta',
        'peserta'      => $peserta,
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
        'pesertaname'     => $i->post('pesertaname'),
        'email'         => $i->post('email'),
        'password'      => $password,
        'role'          => $i->post('role'),
        'is_active'     => $i->post('is_aktif')
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

  public function role()
  {
    $role = $this->Crud_model->listing('tbl_peserta_role');
    $data = [
      'add'       => 'roleAdd',
      'edit'      => 'roleEdit/',
      'delete'    => 'roleDelete/',
      'role'      => $role,
      'content'   => 'admin/role/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
}
