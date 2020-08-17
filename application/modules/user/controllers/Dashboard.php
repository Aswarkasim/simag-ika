<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model', 'UM');
        is_logged_in_peserta();
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

    function penerimaan()
    {
        $this->load->library('pagination');

        $id_instansi = $this->session->userdata('id_instansi_peserta');
        $peserta = $this->UM->listPenerimaan($id_instansi);

        $config['base_url']     = base_url('user/penerimaan/index/');
        $config['total_rows']   = count($peserta);
        $config['per_page']     = 18;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $peserta = $this->UM->listPenerimaan($id_instansi, $config['per_page'], $from);

        $data = [
            'from'      => $from,
            'peserta'   => $peserta,
            'pagination' => $this->pagination->create_links(),
            'content'   => 'user/dashboard/penerimaan'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }

    function nilai()
    {
        $id_peserta = $this->session->userdata('id_peserta');
        $nilai = $this->UM->dataNilai($id_peserta);
        $rerata = $this->UM->rerata();

        $data = [
            'rerata'     => $rerata,
            'nilai'     => $nilai,
            'content'   => 'user/dashboard/nilai'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }

    function pengumuman()
    {
        $id_peserta = $this->session->userdata('id_peserta');
        $peserta = $this->UM->getPesertaInstansiDetail($id_peserta);

        $data = [
            'peserta'     => $peserta,
            'content'   => 'user/dashboard/pengumuman'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }


    function profil()
    {
        $id_peserta = $this->session->userdata('id_peserta');
        $peserta = $this->UM->getPesertaInstansiDetail($id_peserta);

        $data = [
            'peserta'     => $peserta,
            'content'   => 'user/dashboard/pengumuman'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
