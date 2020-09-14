<?php

//$this->load->view('user/headprofil');

?>
<div class="jumbotron pt-3">
    <div class="container">
        <a href="<?= base_url(); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i><i></i> Kembali</a><br><br>
        <div class="row">
            <div class="col-md-2">
                <img width="100%" src="<?php if ($profil->gambar == "") {
                                            echo base_url('assets/uploads/images/default.jpg');
                                        } else {
                                            echo base_url($profil->gambar);
                                        } ?>" alt="">
            </div>
            <div class="col-md-6">
                <div class="author-prof">@<?= $this->session->userdata('username_peserta') ?></div>
                <h6 class="author-name"><?= $this->session->userdata('namalengkap') ?></h6>
                <p>
                    <span>Pendamping Guru Pendamping (Sekolah) : <?= $profil->nama_guru_pendamping; ?></span><br>
                    <span>Pendamping Lapangan : <?= $profil->nama_pembimbing; ?></span><br>
                    <span>Penugasan : <?= $profil->nama_pekerjaan; ?></span><br>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <?php include('ubah_instansi.php') ?>
            </div>

        </div>
    </div>


    <div class="row">

        <div class="col-md-12">
            <br>
            <strong>
                <h6>Profil <?= $this->session->userdata('namalengkap'); ?></h6>
            </strong>
            <!-- <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div><br> -->

            <!-- Ubah Instansi -->


            <table class="table">
                <tr>
                    <td width="300px">Nama Lengkap</td>
                    <td>: <?= $profil->namalengkap ?></td>
                </tr>
                <tr>
                    <td width="300px">Username</td>
                    <td>: <?= $profil->username_peserta ?></td>
                </tr>
                <tr>
                    <td width="300px">Email</td>
                    <td>: <?= $profil->email ?></td>
                </tr>
                <tr>
                    <td width="300px">No Hp</td>
                    <td>: <?= $profil->nohp ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="300px">Asal Instansi</td>
                    <td>: <?= $profil->asal_instansi ?></td>
                </tr>

                <tr>
                    <td width="300px">Jurusan</td>
                    <td>: <?= $profil->jurusan ?></td>
                </tr>

                <tr>
                    <td width="300px">Alamat Instansi</td>
                    <td>: <?= $profil->alamat_instansi ?></td>
                </tr>

                <tr>
                    <td width="300px">No. Telepon Instansi</td>
                    <td>: <?= $profil->no_telepon_instansi ?></td>
                </tr>
                <tr>
                    <td width="300px">Guru Pendamping</td>
                    <td>: <?= $profil->nama_guru_pendamping ?></td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="300px">Nama Panggilan</td>
                    <td>: <?= $profil->nama_panggilan ?></td>
                </tr>
                <tr>
                    <td width="300px">No. Induk</td>
                    <td>: <?= $profil->nomor_induk ?></td>
                </tr>
                <tr>
                    <td width="300px">Tanggal Lahir</td>
                    <td>: <?= $profil->tempat_lahir . ' ' . $profil->tgl_lahir ?></td>
                </tr>
                <tr>
                    <td width="300px">Jenis Kelamin</td>
                    <td>: <?= $profil->jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td width="300px">Tinggi Badan</td>
                    <td>: <?= $profil->tinggi_badan ?></td>
                </tr>
                <tr>
                    <td width="300px">Berat Badan</td>
                    <td>: <?= $profil->berat_badan ?></td>
                </tr>
                <tr>
                    <td width="300px">Suku</td>
                    <td>: <?= $profil->suku ?></td>
                </tr>
                <tr>
                    <td width="300px">alamat_sekarang</td>
                    <td>: <?= $profil->alamat_sekarang ?></td>
                </tr>
                <tr>
                    <td width="300px">Alamat Asal</td>
                    <td>: <?= $profil->alamat_asal ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="300px">Nama Ayah</td>
                    <td>: <?= $profil->nama_ayah ?></td>
                </tr>

                <tr>
                    <td width="300px">Nama Ibu</td>
                    <td>: <?= $profil->nama_ibu ?></td>
                </tr>
                <tr>
                    <td width="300px">Pekerjaan Ayah</td>
                    <td>: <?= $profil->pekerjaan_ayah ?></td>
                </tr>
                <tr>
                    <td width="300px">Pekerjaan Ibu</td>
                    <td>: <?= $profil->pekerjaan_ibu ?></td>
                </tr>
                <tr>
                    <td width="300px">No Hp. Ayah</td>
                    <td>: <?= $profil->nohp_ayah ?></td>
                </tr>
                <tr>
                    <td width="300px">No Hp. Ibu</td>
                    <td>: <?= $profil->nohp_ibu ?></td>
                </tr>
                <tr>
                    <td width="300px">Alamat Ayah</td>
                    <td>: <?= $profil->nohp_ayah ?></td>
                </tr>
                <tr>
                    <td width="300px">Alammat Ibu</td>
                    <td>: <?= $profil->nohp_ibu ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="300px">Pengalaman Organisasi</td>
                    <td>: <?= $profil->pengalaman_organisasi ?></td>
                </tr>
                <tr>
                    <td width="300px">Hobi</td>
                    <td>: <?= $profil->hobi ?></td>
                </tr>


            </table>
            <div class="pull-left">
                <a href="<?= base_url('user/profil/edit') ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
</div>