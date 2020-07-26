<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();

    $this->load->model('Instansi_model', 'IM');
  }


  public function index()
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $peserta = $this->Crud_model->listingOneAll('tbl_peserta', 'id_instansi', $id_instansi);
    $data = [
      'add'      => 'instansi/peserta/add',
      'edit'      => 'instansi/peserta/edit/',
      'delete'      => 'instansi/peserta/delete/',
      'is_active'      => 'instansi/peserta/is_active/',
      'peserta'      => $peserta,
      'content'   => 'instansi/peserta/index'
    ];

    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function is_active($id_peserta, $status)
  {
    $data = [
      'is_active'     => $status
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);

    if ($status == 1) {
      $id_instansi = $this->session->userdata('id_instansi');
      $aspek = $this->Crud_model->listingOneAll('tbl_aspek', 'id_instansi', $id_instansi);
      foreach ($aspek as $row) {
        $dataNilai = [
          'id_peserta' => $id_peserta,
          'id_aspek'   => $row->id_aspek,
          'nilai'      => 0
        ];
        $this->Crud_model->add('tbl_penilaian', $dataNilai);
      }
    }

    $this->session->set_flashdata('msg', 'diaktifkan');
    redirect('instansi/peserta', 'refresh');
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
        'add'       => 'instansi/peserta/add',
        'back'      => 'instansi/peserta',
        'content'   => 'instansi/peserta/add'
      ];
      $this->load->view('instansi/layout/wrapper', $data, FALSE);
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
      redirect('instansi/peserta/add', 'refresh');
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
        'edit'       => 'instansi/peserta/edit/',
        'back'      => 'instansi/peserta',
        'peserta'      => $peserta,
        'content'   => 'instansi/peserta/edit'
      ];
      $this->load->view('instansi/layout/wrapper', $data, FALSE);
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
      redirect('instansi/peserta/edit/' . $id_peserta, 'refresh');
    }
  }

  function delete($id_peserta)
  {
    $this->Crud_model->delete('tbl_peserta', 'id_peserta', $id_peserta);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('instansi/peserta');
  }

  public function nilai($id_peserta)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $nilai = $this->IM->nilaiAspek($id_instansi, $id_peserta);

    $data = [
      'add'       => 'instansi/peserta/updateNilai/' . $id_peserta,
      'back'       => 'instansi/peserta',
      'nilai'      => $nilai,
      'content'   => 'instansi/peserta/nilai'
    ];

    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function updateNilai($id_peserta)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $nilai = $this->IM->nilaiAspek($id_instansi, $id_peserta);
    $var = '';
    //$rerata = "SELECT AVG(nilai) FROM(tbl_penilaian) WHERE id_peserta = '$id_peserta'";

    foreach ($nilai as $row) {
      $var = 'aspek' . $row->id_aspek . $row->nama_aspek;

      $data = [
        //'rerata'  => $rerata,
        'nilai'   => $this->input->post($var)
      ];
      $this->IM->updateNilai($id_peserta, $row->id_aspek, $data);
    }
    $this->session->set_flashdata('msg', 'data diubah');
    redirect('instansi/peserta');
  }
}
