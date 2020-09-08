<?php //$this->load->view('user/headprofil'); 
?>
<div class="container pt-4">
    <a href="<?= base_url('user/profil'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i><i></i> Kembali</a>
    <?php //$this->load->view('user/nav');

    if (isset($error)) {
        echo $error;
    }
    echo form_open_multipart('user/profil/edit');

    ?>
    <form method="post">
        <div class="row pt-5">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <?= validation_errors('<p class="alert alert-danger">', '</p>') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Nama Lengkap</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="namalengkap" placeholder="Nama Lengkap" type="text" value="<?= $peserta->namalengkap ?>">
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Username</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="username" placeholder="Username" type="text" value="<?= $peserta->username_peserta ?>">
                        </div>
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Alamat Email</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="email" placeholder="Email" type="email" value="<?= $peserta->email ?>">
                        </div>
                    </div>
                </div><br>

                <div class="form-gorup">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>No Hp</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nohp" placeholder="No. Hp" type="text" value="<?= $peserta->nohp ?>">
                        </div>
                    </div>
                </div>
                <br>


                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Asal Instansi</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="asal_instansi" placeholder="Asal Instansi" type="text" value="<?= $peserta->asal_instansi ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Jurusan</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="jurusan" placeholder="Jurusan" type="text" value="<?= $peserta->jurusan ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Alamat Instansi</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="alamat_instansi" placeholder="Alamat Instansi" type="text" value="<?= $peserta->alamat_instansi ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Nomor Telp. Instansi</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="no_telepon_instansi" placeholder="Nomor Telp. Instansi" type="text" value="<?= $peserta->no_telepon_instansi ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Nama Guru/Nama Pendamping</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nama_guru_pendamping" placeholder="Nama Guru/Nama Pendamping" type="text" value="<?= $peserta->nama_guru_pendamping ?>">
                        </div>
                    </div>
                </div>


                <hr>



                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Nama Panggilan</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nama_panggilan" placeholder="Nama Panggilan" type="text" value="<?= $peserta->nama_panggilan ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>No. Induk</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nomor_induk" placeholder="No. Induk" type="text" value="<?= $peserta->nomor_induk ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Tanggal Lahir</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" type="date" value="<?= $peserta->tgl_lahir ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Tempat Lahir</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" type="text" value="<?= $peserta->tempat_lahir ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Jenis Kelamin</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" type="text" value="<?= $peserta->jenis_kelamin ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Agama</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="agama" placeholder="Agama" type="text" value="<?= $peserta->agama ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Tinggi Badan</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="tinggi_badan" placeholder="Tinggi Badan" type="text" value="<?= $peserta->tinggi_badan ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Berat Badan</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="berat_badan" placeholder="Berat Badan" type="text" value="<?= $peserta->berat_badan ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Suku</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="suku" placeholder="Suku" type="text" value="<?= $peserta->suku ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Alamat Sekarang</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="alamat_sekarang" placeholder="Alamat Sekarang" type="text" value="<?= $peserta->alamat_sekarang ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Alamat Asal</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="alamat_asal" placeholder="Alamat Asal" type="text" value="<?= $peserta->alamat_asal ?>">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Nama Ayah</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nama_ayah" placeholder="Nama Ayah" type="text" value="<?= $peserta->nama_ayah ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Nama Ibu</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nama_ibu" placeholder="Nama Ibu" type="text" value="<?= $peserta->nama_ibu ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Pekerjaan Ayah</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" type="text" value="<?= $peserta->pekerjaan_ayah ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Pekerjaan Ibu</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" type="text" value="<?= $peserta->pekerjaan_ibu ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>No Telp. Ayah</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nohp_ayah" placeholder="No Telp. Ayah" type="text" value="<?= $peserta->nohp_ayah ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>No. Hp. Ibu</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="nohp_ibu" placeholder="No. Hp. Ibu" type="text" value="<?= $peserta->nohp_ibu ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Alamat Ayah</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="alamat_ayah" placeholder="Alamat Ayah" type="text" value="<?= $peserta->alamat_ayah ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Alamat Ibu</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" name="alamat_ibu" placeholder="Alamat Ibu" type="text" value="<?= $peserta->alamat_ibu ?>">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Pengalaman Organisasi</strong></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="pengalaman_organisasi" placeholder="Pengalaman organisasi" class="form-control" cols="30" rows="10"><?= $peserta->pengalaman_organisasi ?></textarea>
                            <small>Pisahkan dengan koma (;) jika lebih dari 1</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="pull-right"><strong>Hobi</strong></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="hobi" placeholder="Hobi" class="form-control" cols="30" rows="10"><?= $peserta->hobi ?></textarea>
                            <small>Pisahkan dengan koma (;) jika lebih dari 1</small>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right"><strong> Gambar</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="gambar">
                            <br>
                            <img width="200px" src="<?php if ($peserta->gambar == "") {
                                                        echo base_url('assets/uploads/images/default.jpg');
                                                    } else {
                                                        echo base_url($peserta->gambar);
                                                    } ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
<?= form_close() ?>
</div>