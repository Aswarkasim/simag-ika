<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

  public function index()
  {
    $id_peserta  = $this->session->userdata('id_peserta');
    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_peserta', $id_peserta);
    $data = [
      'laporan' => $laporan,
      'content' => 'user/laporan/index'
    ];
    $this->load->view('home/layout/wrapper', $data);
  }

  function kirim()
  {
    $i = $this->input;
    $valid = $this->form_validation;
    $valid->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => '%s tidak boleh kosong']);


    if ($valid->run()) {
      if (!empty($_FILES['dokumen']['name'])) {
        $config['upload_path']   = './assets/uploads/laporan/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dokumen')) {
          $data = [
            'error'     => $this->upload->display_errors(),
            'content' => 'user/laporan/index'
          ];
          $this->load->view('user/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];
          $data = [
            'id_instansi'     => $this->session->userdata('id_instansi_peserta'),
            'id_peserta'      => $this->session->userdata('id_peserta'),
            'deskripsi'       => $i->post('deskripsi'),
            'dokumen'         => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_laporan', $data);
          $this->session->set_flashdata('msg', 'Laporan telah diupload dikirim');
          redirect('user/laporan');
        }
      }
    }
    $this->index();
  }


  function delete($id_laporan)
  {
    $laporan = $this->Crud_model->listingOne('tbl_laporan', 'id_laporan', $id_laporan);
    unlink($laporan->dokumen);
    $this->Crud_model->delete('tbl_laporan', 'id_laporan', $id_laporan);
    redirect('user/laporan');
  }
}
