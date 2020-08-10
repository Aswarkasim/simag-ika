<?php $this->load->view('user/headprofil'); ?>
<div class="container pt-0">
    <?php $this->load->view('user/nav'); ?>
    <div class="text-center">
        <h2></h2>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <p class="text-white"><strong> Instansi Tugas</strong></p>
                    <hr>
                    <h4 class="card-text text-white">
                        <strong> <?= $instansi ?></strong>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <p class="text-white"><strong> Pembimbing Lapangan</strong></p>
                    <hr>
                    <h4 class="card-text text-white">
                        <strong> <?php
                                    if ($peserta->id_pembimbing == '') {
                                        echo 'Belum ada pembimbing';
                                    } else {
                                        echo $peserta->nama_pembimbing;
                                    }
                                    ?></strong>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <p class="text-white"><strong> Data Logbook</strong></p>
                    <hr>
                    <h4 class="card-text text-white">
                        <strong> <?= count($logbook) . ' Data'; ?></strong>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <p class="text-white"><strong> Nilai Magang</strong></p>
                    <hr>
                    <h4 class="card-text text-white">
                        <strong> belum dikerja</strong>
                    </h4>
                </div>
            </div>
        </div>


    </div>
</div>