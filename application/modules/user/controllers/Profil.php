<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function index()
    {
        $id_peserta = $this->session->userdata('id_peserta');
        $profil = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
        $data = [
            'profil'    => $profil,
            'content'   => 'user/profil/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }



    // Edit
    public function edit()
    {

        $id_peserta = $this->session->userdata('id_peserta');
        $peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
        $i = $this->input;
        $valid = $this->form_validation;
        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('email', 'Email', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('nohp', 'Nomor HP', 'required', ['required' => '%s tidak boleh kosong']);


        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'peserta'      => $peserta,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/profil/edit'
                    ];
                    $this->load->view('home/layout/wrapper', $data, FALSE);
                } else {
                    if ($peserta->gambar != "") {
                        unlink('assets/uploads/images/' . $peserta->gambar);
                    }

                    $upload_data = ['uploads' => $this->upload->data()];

                    $data = [
                        'id_peserta'    => $id_peserta,
                        'namalengkap'   => $i->post('namalengkap'),
                        'asal_instansi' => $i->post('asal_instansi'),
                        'jenis_kelamin' => $i->post('jenis_kelamin'),
                        'alamat'        => $i->post('alamat'),
                        'motto'         => $i->post('motto'),
                        'email'         => $i->post('email'),
                        'nohp'          => $i->post('nohp'),
                        'is_active'     => 1,
                        'is_accept'     => 0,
                        'gambar'        => $config['upload_path'] . $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
                    $this->session->set_flashdata('msg', 'Profil diubah');
                    redirect('user/profil');
                }
            } else {
                $data = [
                    'id_peserta'    => $id_peserta,
                    'namalengkap'   => $i->post('namalengkap'),
                    'asal_instansi' => $i->post('asal_instansi'),
                    'jenis_kelamin' => $i->post('jenis_kelamin'),
                    'tgl_lahir'        => $i->post('tgl_lahir'),
                    'tempat_lahir'        => $i->post('tempat_lahir'),
                    'alamat'        => $i->post('alamat'),
                    'motto'         => $i->post('motto'),
                    'email'         => $i->post('email'),
                    'nohp'          => $i->post('nohp'),
                    'is_active'     => 1,
                    'is_accept'     => 0,
                ];
                $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
                $this->session->set_flashdata('msg', 'Profil diubah');
                redirect('user/profil');
            }
        }
        $data = [
            'peserta'      => $peserta,
            'content'   => 'user/profil/edit'
        ];

        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
