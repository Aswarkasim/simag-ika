<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_instansi();
        if ($this->session->userdata('id_instansi') == "") {
            redirect('instansi/auth');
        }
    }


    public function index()
    {
        $id_instansi = $this->session->userdata('id_instansi');
        $instansi = $this->Crud_model->listingOne('tbl_instansi', 'id_instansi', $id_instansi);

        $data = [
            'title'     => 'Dashboard',
            'instansi'  => $instansi,
            'surat'  => $this->Crud_model->listingOneAll('tbl_surat', 'id_instansi', $id_instansi),
            'peserta'  => $this->Crud_model->listingOneAll('tbl_peserta', 'id_instansi', $id_instansi),
            'pembimbing' => $this->Crud_model->listingOneAll('tbl_pembimbing', 'id_instansi', $id_instansi),
            'content'   => 'instansi/dashboard/index'
        ];

        $this->load->view('instansi/layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
