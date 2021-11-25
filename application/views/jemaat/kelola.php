<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('status') == 'sukses') { ?>
                    <div role="alert" class="alert alert-success alert-dismissible fade-in wrap-input100">
                        <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
                            <span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <div class="right_col" role="main">
                            <a href="<?= site_url('warga/jemaat/dataJemaat') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3>Data Diri</h3>
                                            <p>Kelola Data Diri</p>
                                        </div>
                                        <div class="icon"><img src="<?= base_url('assets/img/logoGKJ.png') ?>" width="70px" alt="logo GKJ"></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/dataDokumen') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3>Dokumen</h3>
                                            <p>Kelola Data Dokumen</p>
                                        </div>
                                        <div class="icon"><img src="<?= base_url('assets/img/logoGKJ.png') ?>" width="70px" alt="logo GKJ"></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/dataNonJemaat') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h3>Non Jemaat</h3>
                                            <p>Kelola Data Non Jemaat</p>
                                        </div>
                                        <div class="icon"><img src="<?= base_url('assets/img/logoGKJ.png') ?>" width="70px" alt="logo GKJ"></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/dataAstestasi') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>Atestasi</h3>
                                            <p>Atestasi Masuk / Keluar</p>
                                        </div>
                                        <div class="icon"><img src="<?= base_url('assets/img/logoGKJ.png') ?>" width="70px" alt="logo GKJ"></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="right_col" role="main">
                            <div id="dataResponsive">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
