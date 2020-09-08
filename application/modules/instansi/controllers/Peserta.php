<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    is_logged_in_instansi();
    $this->load->model('Instansi_model', 'IM');
  }


  public function index()
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $peserta = $this->IM->listPeserta($id_instansi);

    $penugasan = $this->Crud_model->listingOneAll('tbl_pekerjaan', 'id_instansi', $id_instansi);
    $data = [
      'add'      => 'instansi/peserta/add',
      'edit'      => 'instansi/peserta/edit/',
      'delete'      => 'instansi/peserta/delete/',
      'is_active'      => 'instansi/peserta/is_active/',
      'is_accept'      => 'instansi/peserta/is_accept/',
      'peserta'      => $peserta,
      'penugasan'      => $penugasan,
      'content'   => 'instansi/peserta/index'
    ];

    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function detail($id_peserta)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $peserta = $this->IM->detailPeserta($id_peserta);
    $pembimbing = $this->Crud_model->listingOneAll('tbl_pembimbing', 'id_instansi', $id_instansi);
    $penugasan = $this->Crud_model->listingOneAll('tbl_pekerjaan', 'id_instansi', $id_instansi);

    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_peserta', $id_peserta);
    $data = [
      'peserta' => $peserta,
      'pembimbing' => $pembimbing,
      'penugasan' => $penugasan,
      'laporan'     => $laporan,
      'content'  => 'instansi/peserta/detail'
    ];
    $this->load->view('/layout/wrapper', $data, FALSE);
  }

  function download_laporan($id_peserta)
  {
    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_peserta', $id_peserta);
    $this->load->helper('download');
    force_download($laporan->dokumen, null);
  }

  function is_active($id_peserta, $status)
  {
    $data = [
      'is_active'     => $status
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
    $this->session->set_flashdata('msg', 'diaktifkan');
    redirect('instansi/peserta', 'refresh');
  }


  function is_accept($id_peserta, $status)
  {
    $data = [
      'is_accept'     => $status
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
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
    $aspek = $this->Crud_model->listingOneAll('tbl_aspek', 'id_instansi', $id_instansi);
    foreach ($aspek as $row) {
      $cek = $this->IM->cekAspek($id_peserta, $row->id_aspek);
      if (!$cek) {
        $dataNilai = [
          'id_peserta' => $id_peserta,
          'id_aspek'   => $row->id_aspek,
          'nilai'      => 0
        ];
        $this->Crud_model->add('tbl_penilaian', $dataNilai);
      }
    }

    $nilai = $this->IM->nilaiAspek($id_instansi, $id_peserta);
    $rerata = $this->IM->rerata();
    $this->updateRerata($id_peserta, $rerata->rerata);
    $data = [
      'add'       => 'instansi/peserta/updateNilai/' . $id_peserta,
      'back'       => 'instansi/peserta/detail/' . $id_peserta,
      'rerata'    =>  $rerata,
      'nilai'      => $nilai,
      'content'   => 'instansi/peserta/nilai'
    ];

    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  private function updateRerata($id_peserta, $nilaiRerata)
  {
    $dataNilai = [
      'nilai' => $nilaiRerata
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $dataNilai);
  }

  function updateNilai($id_peserta)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $nilai = $this->IM->nilaiAspek($id_instansi, $id_peserta);
    $var = '';

    foreach ($nilai as $row) {
      $var = 'aspek' . $row->id_aspek . $row->nama_aspek;

      $data = [
        'nilai'   => $this->input->post($var)
      ];
      $this->IM->updateNilai($id_peserta, $row->id_aspek, $data);
    }
    $this->session->set_flashdata('msg', 'data diubah');
    redirect('instansi/peserta/nilai/' . $id_peserta);
  }

  function editPenugasan($id_peserta)
  {
    $data = [
      'id_pekerjaan' => $this->input->post('id_pekerjaan')
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
    $this->session->set_flashdata('msg', 'Penugasan diubah');
    redirect('instansi/peserta/detail/' . $id_peserta, 'refresh');
  }

  function editPembimbing($id_peserta)
  {
    $data = [
      'id_pembimbing' => $this->input->post('id_pembimbing')
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
    $this->session->set_flashdata('msg', 'Pembimbing diubah');
    redirect('instansi/peserta/detail/' . $id_peserta, 'refresh');
  }

  function logbook($id_peserta)
  {
    $logbook = $this->Crud_model->listingOneAll('tbl_logbook', 'id_peserta', $id_peserta);
    $peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta)->namalengkap;
    $data = [
      'logbook' => $logbook,
      'peserta' => $peserta,
      'content'   => 'instansi/peserta/logbook'
    ];
    $this->load->view('/layout/wrapper', $data, FALSE);
  }

  function delete_logbook()
  {
    $id_peserta = $this->uri->segment(4);
    $id_logbook = $this->uri->segment(5);
    $this->Crud_model->delete('tbl_logbook', 'id_logbook', $id_logbook);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('instansi/peserta/logbook/' . $id_peserta);
  }
}
