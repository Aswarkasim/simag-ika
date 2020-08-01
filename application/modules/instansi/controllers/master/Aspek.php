<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aspek extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('instansi/Instansi_model', 'IM');
  }


  public function index()
  {
    $this->load->library('pagination');

    $id_instansi = $this->session->userdata('id_instansi');

    $aspek = $this->Crud_model->listingOneAll('tbl_aspek', 'id_instansi', $id_instansi);

    $data = [
      'title'     => 'Tambah Peserta',
      'add'       => 'instansi/master/aspek/add',
      'aspek'   => $aspek,
      'content'   => 'instansi/aspek/index'
    ];
    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function add()
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $i = $this->input;
    $data = [
      'id_instansi'       => $id_instansi,
      'nama_aspek'        => $i->post('nama_aspek'),
      'keterangan'        => $i->post('keterangan')
    ];
    $this->Crud_model->add('tbl_aspek', $data);
    $this->session->set_flashdata('msg', 'aspek ditambah');
    redirect('instansi/master/aspek', 'refresh');
  }

  function edit($id_aspek)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $i = $this->input;
    $data = [
      'id_instansi'       => $id_instansi,
      'nama_aspek'        => $i->post('nama_aspek'),
      'keterangan'        => $i->post('keterangan')
    ];
    $this->Crud_model->edit('tbl_aspek', 'id_aspek', $id_aspek, $data);
    $this->session->set_flashdata('msg', 'data diubah');
    redirect('instansi/master/aspek', 'refresh');
  }

  function delete($id_aspek)
  {
    $this->Crud_model->delete('tbl_aspek', 'id_aspek', $id_aspek);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('instansi/master/aspek');
  }

  function printLogbook()
  {
    $this->load->library('pagination');

    $id_instansi = $this->session->userdata('id_instansi');
    $instansi = $this->UM->listLogBook($id_instansi);

    $data = [
      'instansi' => $instansi
    ];
    $this->load->view('instansi/instansi/cetak', $data, FALSE);
  }
}
