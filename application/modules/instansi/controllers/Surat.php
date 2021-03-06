<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in_instansi();
  }


  public function index()
  {

    $this->load->library('pagination');
    $this->load->model('instansi/Instansi_model', 'IM');


    $id_instansi = $this->session->userdata('id_instansi');

    $config['base_url']     = base_url('instansi/surat/index/');
    $config['total_rows']   = count($this->Crud_model->listingOneAll('tbl_surat', 'id_instansi', $id_instansi));
    $config['per_page']     = 15;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $surat = $this->IM->listSurat($id_instansi, $config['per_page'], $from);


    $data = [
      'title'     => 'Dashboard',
      'surat'      => $surat,
      'pagination' => $this->pagination->create_links(),
      'content'   => 'instansi/surat/index'
    ];

    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  public function cari()
  {

    $this->load->model('instansi/Instansi_model', 'IM');
    $id_instansi = $this->session->userdata('id_instansi');

    $where =  $this->input->post('where');

    $surat = $this->IM->cariSurat($id_instansi, $where);
    $data = [
      'surat'          => $surat,
      'content'        => 'instansi/surat/index'
    ];
    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function detail($id_surat)
  {

    $this->load->model('Instansi_model', 'IM');

    is_read('tbl_surat', 'id_surat', $id_surat);
    $surat = $this->IM->getDetailSurat($id_surat);
    $peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $surat->id_peserta);


    $data = [
      'surat'     => $surat,
      'peserta'     => $peserta,
      'content'   => 'instansi/surat/detail'
    ];
    $this->load->view('instansi/layout/wrapper', $data, FALSE);
  }

  function download($id_surat)

  {
    $this->load->helper('download');
    $surat = $this->Crud_model->listingOne('tbl_surat', 'id_surat', $id_surat);
    force_download($surat->dokumen, null);

    redirect('instansi/surat/detail/' . $id_surat, 'refresh');
  }

  function delete($id_surat)
  {
    $this->Crud_model->delete('tbl_surat', 'id_surat', $id_surat);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('instansi/surat');
  }

  function is_accept($id_peserta, $id_surat, $status)
  {
    $data = [
      'is_accept'     => $status
    ];
    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
    $this->session->set_flashdata('msg', 'diaktifkan');
    redirect('instansi/surat/detail/' . $id_surat, 'refresh');
  }
}

/* End of file Controllername.php */
