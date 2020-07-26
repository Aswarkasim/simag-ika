<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logbook extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user/User_model', 'UM');
  }


  public function index()
  {
    $this->load->library('pagination');

    $id_peserta = $this->session->userdata('id_peserta');
    $logbook = $this->UM->listLogBook($id_peserta);

    $config['base_url']     = base_url('user/logbook/index/');
    $config['total_rows']   = count($logbook);
    $config['per_page']     = 5;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $logbook = $this->UM->listLogBook($id_peserta, $config['per_page'], $from);

    $data = [
      'title'     => 'Tambah Peserta',
      'add'       => 'user/logbook/add',
      'back'      => 'user/logbook',
      'from'      => $from,
      'logbook'   => $logbook,
      'pagination' => $this->pagination->create_links(),
      'content'   => 'user/logbook/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function add()
  {
    $id_peserta = $this->session->userdata('id_peserta');
    $i = $this->input;
    $data = [
      'id_peserta'     => $id_peserta,
      'tanggal'        => $i->post('tanggal'),
      'waktu_dari'     => $i->post('waktu_dari'),
      'waktu_sampai'   => $i->post('waktu_sampai'),
      'aktifitas'      => $i->post('aktifitas')
    ];
    $this->Crud_model->add('tbl_logbook', $data);
    $this->session->set_flashdata('msg', 'ditambah');
    redirect('user/logbook', 'refresh');
  }

  function edit($id_logbook)
  {
    $id_peserta = $this->session->userdata('id_peserta');
    $i = $this->input;
    $data = [
      'id_peserta'     => $id_peserta,
      'tanggal'        => $i->post('tanggal'),
      'waktu_dari'     => $i->post('waktu_dari'),
      'waktu_sampai'   => $i->post('waktu_sampai'),
      'aktifitas'      => $i->post('aktifitas')
    ];
    $this->Crud_model->edit('tbl_logbook', 'id_logbook', $id_logbook, $data);
    $this->session->set_flashdata('msg', 'data diubah');
    redirect('user/logbook', 'refresh');
  }

  function delete($id_logbook)
  {
    $this->Crud_model->delete('tbl_logbook', 'id_logbook', $id_logbook);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('user/logbook');
  }

  function printLogbook()
  {
    $this->load->library('pagination');

    $id_peserta = $this->session->userdata('id_peserta');
    $logbook = $this->UM->listLogBook($id_peserta);

    $data = [
      'logbook' => $logbook
    ];
    $this->load->view('user/logbook/cetak', $data, FALSE);
  }
}
