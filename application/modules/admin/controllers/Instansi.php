<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Instansi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // if (($this->session->userdata('id_instansi') == "") || $this->session->userdata('role') != "Admin") {
        //     redirect('error_page');
        // }
    }


    public function index()
    {
        $instansi = $this->Crud_model->listing('tbl_instansi');
        $data = [
            'add'      => 'admin/instansi/add',
            'edit'      => 'admin/instansi/edit/',
            'delete'      => 'admin/instansi/delete/',
            'instansi'      => $instansi,
            'content'   => 'admin/instansi/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }



    function add()
    {

        $this->load->helper('string');


        $valid = $this->form_validation;

        $valid->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $valid->set_rules('username_instansi', 'username_instansi', 'required|is_unique[tbl_instansi.username_instansi]');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah Instansi',
                'add'       => 'admin/instansi/add',
                'back'      => 'admin/instansi',
                'content'   => 'admin/instansi/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_instansi'           => random_string('numeric', '14'),
                'username_instansi'     => $i->post('username_instansi'),
                'nama_instansi'         => $i->post('nama_instansi'),
                'password'              => sha1($i->post('password')),
                'is_active'             => $i->post('is_active')
            ];
            $this->Crud_model->add('tbl_instansi', $data);
            $this->session->set_flashdata('msg', $data['nama_instansi'] . ' ditambah');
            redirect('admin/instansi/add', 'refresh');
        }
    }

    function edit($id_instansi)
    {
        $instansi = $this->Crud_model->listingOne('tbl_instansi', 'id_instansi', $id_instansi);

        $valid = $this->form_validation;

        $valid->set_rules('instansiname', 'Nama Instansi', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('password', 'Password', 'matches[re_password]');
        $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ' . $instansi->username_instansi,
                'edit'       => 'admin/instansi/edit/',
                'back'      => 'admin/instansi',
                'instansi'      => $instansi,
                'content'   => 'admin/instansi/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $password = "";
            if ($i->post('password') != "") {
                $password = sha1($i->post('password'));
            } else {
                $password = $instansi->password;
            }
            $data = [
                'id_instansi'       => $id_instansi,
                'instansiname'     => $i->post('instansiname'),
                'email'         => $i->post('email'),
                'password'      => $password,
                'role'          => $i->post('role'),
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->edit('tbl_instansi', 'id_instansi', $id_instansi, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/instansi/edit/' . $id_instansi, 'refresh');
        }
    }

    function delete($id_instansi)
    {
        $this->Crud_model->delete('tbl_instansi', 'id_instansi', $id_instansi);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/instansi');
    }


    function detail($id_instansi)
    {
        $instasi = $this->Crud_model->listingOne('tbl_instansi', 'id_instansi', $id_instansi);
        $data = [
            'instansi'  => $instasi,
            'content'   => 'admin/instansi/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    function auth($id_instansi)
    {
        $instansi = $this->Crud_model->listingOne('tbl_instansi', 'id_instansi', $id_instansi);
        if ($this->session->userdata('id_instansi') != null) {
            session_destroy();
        } else {
            $s = $this->session;
            $s->set_userdata('id_instansi', $instansi->id_instansi);
            $s->set_userdata('nama_instansi', $instansi->nama_instansi);
            $s->set_userdata('username_instansi', $instansi->username_instansi);

            redirect(base_url('instansi/dashboard'), 'refresh');
        }
    }
}
