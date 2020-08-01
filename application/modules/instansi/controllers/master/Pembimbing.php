<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('instansi/Instansi_model', 'IM');
  }


  public function index()
  {

    $id_instansi = $this->session->userdata('id_instansi');

    $pembimbing = $this->Crud_model->listingOneAll('tbl_pembimbing', 'id_instansi', $id_instansi);

    $data = [
      'title'     => 'Tambah Peserta',
      'add'       => 'instansi/master/pembimbing/add',
      'pembimbing'   => $pembimbing,
      'content'   => 'instansi/pembimbing/index'
    ];
    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function add()
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $i = $this->input;
    $data = [
      'id_instansi'       => $id_instansi,
      'nama_pembimbing'        => $i->post('nama_pembimbing'),
      'keterangan'        => $i->post('keterangan')
    ];
    $this->Crud_model->add('tbl_pembimbing', $data);
    $this->session->set_flashdata('msg', 'pembimbing ditambah');
    redirect('instansi/master/pembimbing', 'refresh');
  }

  function edit($id_pembimbing)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $i = $this->input;
    $data = [
      'id_instansi'       => $id_instansi,
      'nama_pembimbing'        => $i->post('nama_pembimbing'),
      'keterangan'        => $i->post('keterangan')
    ];
    $this->Crud_model->edit('tbl_pembimbing', 'id_pembimbing', $id_pembimbing, $data);
    $this->session->set_flashdata('msg', 'data diubah');
    redirect('instansi/master/pembimbing', 'refresh');
  }

  function delete($id_pembimbing)
  {
    $this->Crud_model->delete('tbl_pembimbing', 'id_pembimbing', $id_pembimbing);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('instansi/master/pembimbing');
  }
}
