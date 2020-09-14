<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Instansi_model', 'IM');
    }


    public function index()
    {
        if ($this->session->userdata('id_instansi') != null) {
            redirect('instansi/dashboard');
        } else {
            $valid = $this->form_validation;

            $valid->set_rules(
                'email',
                'Email',
                'required',
                array('required' => '%s harus diisi')
            );
            $valid->set_rules(
                'password',
                'Password',
                'required|min_length[6]',
                array(
                    'required'     => 'Password harus diisi',
                    'min_length'  => 'Password minimal 6 karakter'
                )
            );

            if ($valid->run() === FALSE) {
                $this->load->view('instansi/auth/login_instansi');
            } else {
                $i          = $this->input;
                $email      = $i->post('email');
                $password   = $i->post('password');
                $cek_login  = $this->IM->loginUsername($email, $password);
                //print_r($email); die;

                if (!empty($cek_login) == 1) {
                    $s = $this->session;
                    $s->set_userdata('id_instansi', $cek_login->id_instansi);
                    $s->set_userdata('nama_instansi', $cek_login->nama_instansi);
                    $s->set_userdata('username_instansi', $cek_login->username_instansi);

                    redirect(base_url('instansi/dashboard'), 'refresh');
                } else {
                    $data = array(
                        'error'     => 'Email atau password salah',
                        'content'   => 'instansi/auth/content/'
                    );
                    $this->load->view('instansi/auth/login_instansi', $data);
                }
            }
        }
    }

    function logout()
    {
        $s = $this->session;
        session_destroy();
        redirect(base_url('instansi/auth'), 'refresh');
    }
}
