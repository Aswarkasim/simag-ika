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
    if (!empty($_FILES['gambar']['name'])) {
      $config['upload_path']   = './assets/uploads/logbook/';
      $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      $config['max_size']      = '24000'; // KB 
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('gambar')) {
        $this->index();
      } else {
        $upload_data = ['uploads' => $this->upload->data()];

        $data = [
          'id_peserta'     => $id_peserta,
          'tanggal'        => $i->post('tanggal'),
          'waktu_dari'     => $i->post('waktu_dari'),
          'waktu_sampai'   => $i->post('waktu_sampai'),
          'aktifitas'      => $i->post('aktifitas'),
          'gambar'        => $config['upload_path'] . $upload_data['uploads']['file_name']
        ];
        $this->Crud_model->add('tbl_logbook', $data);
        $this->session->set_flashdata('msg', 'Log diubah');
        redirect('user/logbook');
      }
    } else {
      echo 'tidak ada gambar';
    }
  }

  // function edit($id_logbook)
  // {
  //   $id_peserta = $this->session->userdata('id_peserta');
  //   $i = $this->input;
  //   $data = [
  //     'id_peserta'     => $id_peserta,
  //     'tanggal'        => $i->post('tanggal'),
  //     'waktu_dari'     => $i->post('waktu_dari'),
  //     'waktu_sampai'   => $i->post('waktu_sampai'),
  //     'aktifitas'      => $i->post('aktifitas')
  //   ];
  //   $this->Crud_model->edit('tbl_logbook', 'id_logbook', $id_logbook, $data);
  //   $this->session->set_flashdata('msg', 'data diubah');
  //   redirect('user/logbook', 'refresh');
  // }

  // Edit
  public function edit($id_logbook)
  {
    $id_peserta = $this->session->userdata('id_peserta');
    $logbook = $this->Crud_model->listingOne('tbl_logbook', 'id_logbook', $id_logbook);
    $i = $this->input;

    if (!empty($_FILES['gambar']['name'])) {
      $config['upload_path']   = './assets/uploads/logbook/';
      $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      $config['max_size']      = '24000'; // KB 
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('gambar')) {
        $this->index();
      } else {
        if ($logbook->gambar != "") {
          unlink('assets/uploads/logbook/' . $logbook->gambar);
        }

        $upload_data = ['uploads' => $this->upload->data()];

        $data = [
          'id_peserta'     => $id_peserta,
          'tanggal'        => $i->post('tanggal'),
          'waktu_dari'     => $i->post('waktu_dari'),
          'waktu_sampai'   => $i->post('waktu_sampai'),
          'aktifitas'      => $i->post('aktifitas'),
          'gambar'        => $config['upload_path'] . $upload_data['uploads']['file_name']
        ];
        $this->Crud_model->edit('tbl_logbook', 'id_logbook', $id_logbook, $data);
        $this->session->set_flashdata('msg', 'Log diubah');
        redirect('user/logbook');
      }
    } else {
      $data = [
        'id_peserta'     => $id_peserta,
        'tanggal'        => $i->post('tanggal'),
        'waktu_dari'     => $i->post('waktu_dari'),
        'waktu_sampai'   => $i->post('waktu_sampai'),
        'aktifitas'      => $i->post('aktifitas')
      ];
      $this->Crud_model->edit('tbl_logbook', 'id_logbook', $id_logbook, $data);
      $this->session->set_flashdata('msg', 'Log diubah');
      redirect('user/logbook');
    }
  }


  function delete($id_logbook)
  {
    $logbook = $this->Crud_model->listingOne('tbl_logbook', 'id_logbook', $id_logbook);
    if ($logbook->gambar != "") {
      unlink($logbook->gambar);
    }

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
