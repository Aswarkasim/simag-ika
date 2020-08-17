<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('home/Home_model', 'HM');
  }

  public function index()
  {
    $this->load->helper('string');

    if ($this->session->userdata('id_peserta')) {
      redirect('home');
    }
    $valid = $this->form_validation;

    $valid->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi'));
    $valid->set_rules('password', 'Password', 'required|min_length[6]', array('required' => 'Password harus diisi', 'min_length' => 'Password minimal 6 karakter'));

    if ($valid->run() === FALSE) {
      $data = array(
        'content'   => 'home/auth/login'
      );
      $this->load->view('home/layout/wrapper', $data);
    } else {
      $i          = $this->input;
      $username      = $i->post('username');
      $password   = $i->post('password');
      $cek_login  = $this->HM->loginUsername($username, $password);
      //print_r($email); die;

      if (!empty($cek_login) == 1) {
        if ($cek_login->is_active == 1) {
          $s = $this->session;
          $s->set_userdata('id_peserta', $cek_login->id_peserta);
          $s->set_userdata('username_peserta', $cek_login->username_peserta);
          $s->set_userdata('id_instansi_peserta', $cek_login->id_instansi);
          $s->set_userdata('namalengkap', $cek_login->namalengkap);
          redirect('user/dashboard', 'refresh');
        } else {
          $data = array(
            'error'     => 'Akun anda belum aktif. Silakan hubungi admin bagian untuk mengaktifkan akun',
            'content'   => 'home/auth/login'
          );
          $this->load->view('home/layout/wrapper', $data);
        }
      } else {
        $data = array(
          'error'     => 'username atau password salah',
          'content'   => 'home/auth/login'
        );
        $this->load->view('home/layout/wrapper', $data);
      }
    }
  }

  public function register()
  {
    $this->load->helper('string');

    $required = '%s tidak boleh kosong';
    $is_username = '%s ' . post('username') . ' telah ada, silakan masukkan %s yang lain';
    $is_email = '%s ' . post('email') . ' telah ada, silakan masukkan %s yang lain';
    $valid = $this->form_validation;
    $valid->set_rules('namalengkap', 'Nama Lengkap', 'required', array('required' => $required));
    $valid->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]', array('required' => $required, 'is_unique' => $is_username));
    $valid->set_rules('email', 'email', 'required|is_unique[tbl_user.email]|valid_email', array('required' => $required, 'is_unique' => $is_email, 'valid_email' => '%s yang anda  masukkan tidak valid'));
    $valid->set_rules('password', 'Password', 'required', array('required' => $required, 'is_unique' => $is_email));
    $valid->set_rules('re_password', 'Konfirmasi Password', 'required|matches[password]', array('required' => $required, 'matches' => '%s password yang anda masukkan tidak sama'));


    $instansi  = $this->Crud_model->listing('tbl_instansi');
    if ($valid->run() === FALSE) {
      $data = [
        'instansi'  => $instansi,
        'content'   => 'home/auth/register'
      ];
      $this->load->view('layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;
      $data = [
        'id_peserta'        => random_string('numeric', '15'),
        'namalengkap'       => $i->post('namalengkap'),
        'username_peserta'  => $i->post('username'),
        'nohp'              => $i->post('nohp'),
        'email'             => $i->post('email'),
        'id_instansi'       => $i->post('id_instansi'),
        'password'          => sha1($i->post('password')),
        'is_active'         =>  1,
      ];
      $this->Crud_model->add('tbl_peserta', $data);
      $this->session->set_flashdata('msg', 'ditambah');
      redirect('home/auth', 'refersh');
    }
  }

  function logout()
  {
    $s = $this->session;
    $s->unset_userdata('id_peserta');
    $s->unset_userdata('username_peserta');
    $s->unset_userdata('namalengkap');
    $s->unset_userdata('id_instansi_peserta');
    redirect(base_url('home'), 'refresh');
  }
}
