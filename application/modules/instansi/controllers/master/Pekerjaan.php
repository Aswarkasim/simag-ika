<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in_instansi();
    $this->load->model('instansi/Instansi_model', 'IM');
  }


  public function index()
  {

    $id_instansi = $this->session->userdata('id_instansi');

    $pekerjaan = $this->Crud_model->listingOneAll('tbl_pekerjaan', 'id_instansi', $id_instansi);

    $data = [
      'title'     => 'Tambah Peserta',
      'add'       => 'instansi/master/pekerjaan/add',
      'pekerjaan'   => $pekerjaan,
      'content'   => 'instansi/pekerjaan/index'
    ];
    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function add()
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $i = $this->input;
    $data = [
      'id_instansi'       => $id_instansi,
      'nama_pekerjaan'        => $i->post('nama_pekerjaan'),
      'keterangan'        => $i->post('keterangan')
    ];
    $this->Crud_model->add('tbl_pekerjaan', $data);
    $this->session->set_flashdata('msg', 'pekerjaan ditambah');
    redirect('instansi/master/pekerjaan', 'refresh');
  }

  function edit($id_pekerjaan)
  {
    $id_instansi = $this->session->userdata('id_instansi');
    $i = $this->input;
    $data = [
      'id_instansi'       => $id_instansi,
      'nama_pekerjaan'        => $i->post('nama_pekerjaan'),
      'keterangan'        => $i->post('keterangan')
    ];
    $this->Crud_model->edit('tbl_pekerjaan', 'id_pekerjaan', $id_pekerjaan, $data);
    $this->session->set_flashdata('msg', 'data diubah');
    redirect('instansi/master/pekerjaan', 'refresh');
  }

  function delete($id_pekerjaan)
  {
    $this->Crud_model->delete('tbl_pekerjaan', 'id_pekerjaan', $id_pekerjaan);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('instansi/master/pekerjaan');
  }
}
