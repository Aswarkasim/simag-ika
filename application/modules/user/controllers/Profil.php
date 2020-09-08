<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_peserta();
    }


    public function index()
    {
        $id_peserta = $this->session->userdata('id_peserta');
        $profil = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);

        $instansi = $this->Crud_model->listing('tbl_instansi');
        $data = [
            'profil'    => $profil,
            'instansi'    => $instansi,
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

                        'namalengkap'       => $i->post('namalengkap'),
                        'username_peserta'  => $i->post('username'),
                        'nohp'              => $i->post('nohp'),
                        'email'             => $i->post('email'),
                        'id_instansi'       => $i->post('id_instansi'),

                        'asal_instansi'         => $i->post('asal_instansi'),
                        'alamat_instansi'       => $i->post('alamat_instansi'),
                        'no_telepon_instansi'   => $i->post('no_telepon_instansi'),
                        'nama_guru_pendamping'  => $i->post('nama_guru_pendamping'),
                        'jurusan'               => $i->post('jurusan'),


                        'nama_panggilan'        => $i->post('nama_panggilan'),
                        'nomor_induk'           => $i->post('nomor_induk'),
                        'tgl_lahir'         => $i->post('tgl_lahir'),
                        'tempat_lahir'          => $i->post('tempat_lahir'),
                        'jenis_kelamin'         => $i->post('jenis_kelamin'),
                        'agama'                 => $i->post('agama'),
                        'tinggi_badan'          => $i->post('tinggi_badan'),
                        'berat_badan'           => $i->post('berat_badan'),
                        'suku'                  => $i->post('suku'),
                        'alamat_sekarang'       => $i->post('alamat_sekarang'),
                        'alamat_asal'           => $i->post('alamat_asal'),

                        'nama_ayah'             => $i->post('nama_ayah'),
                        'nama_ibu'              => $i->post('nama_ibu'),
                        'nohp_ayah'             => $i->post('nohp_ayah'),
                        'nohp_ibu'              => $i->post('nohp_ibu'),
                        'pekerjaan_ayah'        => $i->post('pekerjaan_ayah'),
                        'pekerjaan_ibu'         => $i->post('pekerjaan_ibu'),
                        'alamat_ayah'           => $i->post('alamat_ayah'),
                        'alamat_ibu'            => $i->post('alamat_ibu'),

                        'pengalaman_organisasi' => $i->post('pengalaman_organisasi'),
                        'hobi'                  => $i->post('hobi'),

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

                    'namalengkap'       => $i->post('namalengkap'),
                    'username_peserta'  => $i->post('username'),
                    'nohp'              => $i->post('nohp'),
                    'email'             => $i->post('email'),
                    'id_instansi'       => $i->post('id_instansi'),

                    'asal_instansi'         => $i->post('asal_instansi'),
                    'alamat_instansi'       => $i->post('alamat_instansi'),
                    'no_telepon_instansi'   => $i->post('no_telepon_instansi'),
                    'nama_guru_pendamping'  => $i->post('nama_guru_pendamping'),
                    'jurusan'               => $i->post('jurusan'),


                    'nama_panggilan'        => $i->post('nama_panggilan'),
                    'nomor_induk'           => $i->post('nomor_induk'),
                    'tgl_lahir'         => $i->post('tgl_lahir'),
                    'tempat_lahir'          => $i->post('tempat_lahir'),
                    'jenis_kelamin'         => $i->post('jenis_kelamin'),
                    'agama'                 => $i->post('agama'),
                    'tinggi_badan'          => $i->post('tinggi_badan'),
                    'berat_badan'           => $i->post('berat_badan'),
                    'suku'                  => $i->post('suku'),
                    'alamat_sekarang'       => $i->post('alamat_sekarang'),
                    'alamat_asal'           => $i->post('alamat_asal'),

                    'nama_ayah'             => $i->post('nama_ayah'),
                    'nama_ibu'              => $i->post('nama_ibu'),
                    'nohp_ayah'             => $i->post('nohp_ayah'),
                    'nohp_ibu'              => $i->post('nohp_ibu'),
                    'pekerjaan_ayah'        => $i->post('pekerjaan_ayah'),
                    'pekerjaan_ibu'         => $i->post('pekerjaan_ibu'),
                    'alamat_ayah'           => $i->post('alamat_ayah'),
                    'alamat_ibu'            => $i->post('alamat_ibu'),

                    'pengalaman_organisasi' => $i->post('pengalaman_organisasi'),
                    'hobi'                  => $i->post('hobi'),

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

    function ubahInstansi()
    {
        $id_peserta = $this->session->userdata('id_peserta');
        $data = [
            'id_instansi'   => $this->input->post('id_instansi')
        ];
        $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
        $this->session->set_flashdata('msg', 'Instansi Telah diubah');
        redirect('user/profil', 'refresh');
    }
}
