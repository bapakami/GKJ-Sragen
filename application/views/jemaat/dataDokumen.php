<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola Dokumen
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li>dashboard</li>
            <li><a href="<?= site_url('warga/jemaat/kelola') ?>">Kelola</a></li>
            <li><a href="<?= site_url('warga/jemaat/dataDokumen') ?>">Data Dokumen</a></li>
        </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('status') == 'gagal') { ?>
                    <div role="alert" class="alert alert-danger alert-dismissible fade-in wrap-input100">
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
                            <div class="col-md-12"> <h3><span style="color: red">PERHATIAN</span> : Ukuran maksimal file sebesar 2mb</h3> </div>
                        </hr>
                        <br>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan KTP</h4><br>
                                    <input onchange="simpanFoto('ktp')" type="file" <?php if($dokumen['ktp'] != '' || $dokumen['ktp'] != null){ ?> data-default-file="<?= base_url($dokumen['ktp'])?>" <?php } ?> data-allowed-file-extensions="png jpg jpeg word pdf xls" name="foto_ktp" id="foto_ktp" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan KK</h4><br>
                                    <input onchange="simpanFoto('kk')" type="file" <?php if($dokumen['kk'] != '' || $dokumen['kk'] != null){ ?> data-default-file="<?= base_url($dokumen['kk'])?>" <?php } ?>  data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_kk" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Pengantar</h4><br>
                                    <input onchange="simpanFoto('surat_pengantar')"  <?php if($dokumen['surat_pengantar'] != '' || $dokumen['surat_pengantar'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_pengantar'])?>" <?php } ?>  type="file"data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_pengantar" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Baptis Anak</h4><br>
                                    <input onchange="simpanFoto('surat_baptis_anak')" <?php if($dokumen['surat_baptis_anak'] != '' || $dokumen['surat_baptis_anak'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_baptis_anak'])?>" <?php } ?> type="file"data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_baptis_anak" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Baptis Dewasa</h4><br>
                                    <input onchange="simpanFoto('surat_baptis_dewasa')" <?php if($dokumen['surat_baptis_dewasa'] != '' || $dokumen['surat_baptis_dewasa'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_baptis_dewasa'])?>" <?php } ?> type="file"data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_baptis_dewasa" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Sidhi</h4><br>
                                    <input onchange="simpanFoto('surat_sidhi')" type="file" <?php if($dokumen['surat_sidhi'] != '' || $dokumen['surat_sidhi'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_sidhi'])?>" <?php } ?>data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_sidhi" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Nikah</h4><br>
                                    <input onchange="simpanFoto('surat_nikah')" type="file" <?php if($dokumen['surat_nikah'] != '' || $dokumen['surat_nikah'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_nikah'])?>" <?php } ?>data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_nikah" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Kematian</h4><br>
                                    <input onchange="simpanFoto('surat_kematian')" type="file" <?php if($dokumen['surat_kematian'] != '' || $dokumen['surat_kematian'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_kematian'])?>" <?php } ?>data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_kematian" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Cerai</h4><br>
                                    <input onchange="simpanFoto('surat_cerai')" type="file" <?php if($dokumen['surat_cerai'] != '' || $dokumen['surat_cerai'] != null){ ?> data-default-file="<?= base_url($dokumen['surat_cerai'])?>" <?php } ?> data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_surat_cerai" class="dropify" /><br>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 3%;">
                                    <h4 class="card-title text-center">Scan Surat Akta Lahir</h4><br>
                                    <input onchange="simpanFoto('akte_lahir')" type="file" <?php if($dokumen['akte_lahir'] != '' || $dokumen['akte_lahir'] != null){ ?> data-default-file="<?= base_url($dokumen['akte_lahir'])?>" <?php } ?> data-allowed-file-extensions="png jpg jpeg word pdf xls" id="foto_akte_lahir" class="dropify" /><br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function simpanFoto(nm) {
        var fd = new FormData();
        var id = '<?= $id_jemaat; ?>';
        var files = $('#foto_' + nm)[0].files[0];
        fd.append('file', files);
        fd.append('jenis', nm);
        fd.append('id', id);

        $.ajax({
            url: '<?= site_url("warga/jemaat/asyncr") ?>',
            type: 'post',
            data: fd,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'sukses') {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
        });
    }

    $(document).ready(function() {
        $('.dropify').dropify();

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    });
</script>
