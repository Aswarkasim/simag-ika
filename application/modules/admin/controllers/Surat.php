<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

  public function index()
  {
    $this->load->library('pagination');
    $this->load->model('admin/Admin_model', 'AM');


    //    $id_user = $this->session->userdata('id_user');

    $config['base_url']     = base_url('admin/surat/index/');
    $config['total_rows']   = count($this->Crud_model->listing('tbl_surat'));
    $config['per_page']     = 15;

    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $surat = $this->AM->listSurat($config['per_page'], $from);


    $data = [
      'title'     => 'Dashboard',
      'surat'      => $surat,
      'pagination' => $this->pagination->create_links(),
      'content'   => 'admin/surat/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function cari()
  {

    $this->load->model('admin/Admin_model', 'AM');

    $where =  $this->input->post('where');

    $surat = $this->AM->cariSurat($where);
    $data = [
      'surat'          => $surat,
      'content'   => 'admin/surat/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function detail($id_surat)
  {
    is_read('tbl_surat', 'id_surat', $id_surat);
    $surat = $this->Crud_model->listingOne('tbl_surat', 'id_surat', $id_surat);
    $data = [
      'surat'     => $surat,
      'content'   => 'admin/surat/detail'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function download($id_surat)

  {
    $this->load->helper('download');
    $surat = $this->Crud_model->listingOne('tbl_surat', 'id_surat', '1');
    force_download($surat->dokumen, null);

    redirect('admin/surat/detail/' . $id_surat, 'refresh');
  }

  function delete($id_surat)
  {
    $this->Crud_model->delete('tbl_surat', 'id_surat', $id_surat);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/surat');
  }
}

/* End of file Controllername.php */
