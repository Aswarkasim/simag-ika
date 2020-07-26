<?php
// $id_peserta = $this->session->userdata('id_peserta');
// $peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
?>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img width="100%" src="<?php if ($peserta->gambar == "") {
                                            echo base_url('assets/uploads/images/default.jpg');
                                        } else {
                                            echo base_url($peserta->gambar);
                                        } ?>" alt="">
            </div>
            <div class="col-md-6">
                <div class="author-prof">@<?= $this->session->userdata('username_peserta') ?></div>
                <h6 class="author-name"><?= $this->session->userdata('namalengkap') ?></h6>
                <p><?= $peserta->motto; ?></p>
            </div>
        </div>
    </div>
</div>