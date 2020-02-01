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
                <div class="box">
                    <div class="box-body table-responsive">
                        <div class="right_col" role="main">
                            <a href="<?= site_url('warga/jemaat/katekesasi') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3>Katekesasi</h3>
                                            <?= $katekesasi; ?>
                                        </div>
                                        <div class="icon"><i class="fa fa-user"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/baptis') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3>Baptis</h3>
                                            <?= $baptis; ?>
                                        </div>
                                        <div class="icon"><i class="fa fa-file"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/sidhi') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h3>Sidhi</h3>
                                            <?= $sidi; ?>
                                        </div>
                                        <div class="icon"><i class="fa fa-users"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/layanan/nikah') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-blue">
                                        <div class="inner">
                                            <h3>Nikah</h3>
                                            <?= $nikah; ?>
                                        </div>
                                        <div class="icon"><i class="fa fa-users"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/sk') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-purple">
                                        <div class="inner">
                                            <h3>SK</h3>
                                            <p>Surat Keterangan</p>
                                        </div>
                                        <div class="icon"><i class="fa fa-file"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/doa') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-pink">
                                        <div class="inner">
                                            <h3>Doa</h3>
                                            <p>Pelayanan Doa</p>
                                        </div>
                                        <div class="icon"><i class="fa fa-users"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?= site_url('warga/jemaat/patuwen') ?>">
                                <div class="col-lg-3 col-xs-6" id="dataPribadi">
                                    <div class="small-box bg-orange">
                                        <div class="inner">
                                            <h3>Patuwen</h3>
                                            <p>Perkeunjungan / Patuwen</p>
                                        </div>
                                        <div class="icon"><i class="fa fa-users"></i></div>
                                        <div class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
