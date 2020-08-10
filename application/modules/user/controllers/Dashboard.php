<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model', 'UM');
    }


    public function index()
    {
        $id_peserta = $this->session->userdata('id_peserta');

        $id_instansi =  $this->session->userdata('id_instansi_peserta');
        $instansi = $this->Crud_model->listingOne('tbl_instansi', 'id_instansi', $id_instansi);

        $id_peserta = $this->session->userdata('id_peserta');
        $peserta = $this->UM->dataPeserta($id_peserta);

        $logbook = $this->Crud_model->listingOneAll('tbl_logbook', 'id_peserta', $id_peserta);

        $data = [
            'instansi'      => $instansi->nama_instansi,
            'peserta'      => $peserta,
            'logbook'      => $logbook,
            'content'       => 'user/dashboard/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
