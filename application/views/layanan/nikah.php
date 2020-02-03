<?php
$foto = $jemaat['foto'];
if ($foto == '' || $foto == null) {
    if ($jemaat['jenis_kelamin'] == 'Perempuan') {
        $fotox = base_url() . 'assets/img/avatar2.png';
    } else {
        $fotox = base_url() . 'assets/img/avatar5.png';
    }
} else {
    $fotox = base_url($jemaat['foto']);
}

$kat = $nikah->num_rows();
if ($kat == 1) {
    $kate = $nikah->row_array();
    $st = $kate['state'];
    if ($st == 1) {
        $marquee = "<marquee behavior='alternate'>Selamat Permohonan Nikah Anda Diterima</marquee>";
        $disabled = 'disabled';
    } elseif ($st == 2) {
        $marquee = "<marquee bgcolor='red'>Mohon Maaf, Permohonan Nikah Anda Ditolak</marquee>";
        $disabled = '';
    } elseif ($st == 3) {
        $marquee = "<marquee>Permohonan Nikah Anda Sedang Diproses</marquee>";
        $disabled = 'disabled';
    }
} else {
    $disabled = '';
    $marquee = '<button class="btn btn-info btn-sm pull-left" id="daftar" type="submit" style="margin: 4px;">Daftar Sekarang</button>';
}

$today = new DateTime();
$lahir = new DateTime($jemaat['tgl_lahir']);
$diff = $today->diff($lahir);
?>
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
                            <div class="row" id="formDatax">
                                <div class="col-md-12">
                                    <center>
                                        <h3>Pendaftaran Nikah</h3>
                                    </center>
                                    <hr />
                                </div>
                                <div class="row">
                                    <form id="xyz">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label>Nama Suami</label>
                                                <input type="hidden" name="id" value="<?= $jemaat['id']; ?>">
                                                <input type="text" name="suami" id="suami" class="form-control" required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nama Istri</label>
                                                <input type="text" name="istri" id="istri" class="form-control" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Tanggal Lahir Suami</label>
                                                <input type="text" name="tgl_suami" id="tgl_suami" class="form-control tanggal" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Tanggal Lahir Istri</label>
                                                <input type="text" name="tgl_istri" id="tgl_istri" class="form-control tanggal" required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nama Saksi</label>
                                                <input type="text" name="saksi" id="saksi" class="form-control" required="required">
                                            </div>
                                            <br><br><br>
                                        </div>
                                        <div class="col-md-6">                                        
                                            <div class="col-md-12">
                                                <div style="margin-bottom: 3%;">
                                                    <h4 class="card-title text-center">Foto Berpasangan</h4><br>
                                                    <input <?= $disabled; ?> onchange="simpanFoto('foto_berpasang')" type="file" id="foto_berpasang" class="dropify" <?php if ($dokumen['foto_berpasang'] != '' || $dokumen['foto_berpasang'] != null) { ?> data-default-file="<?= base_url($dokumen['foto_berpasang']) ?>" <?php } ?> /><br>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="announ"></div>
                                            <div class="col-md-12">
                                                <div>
                                                    <?php if ($diff->y >= 17) { ?>
                                                        <?= $marquee; ?>
                                                    <?php } else { ?>
                                                        <button class="btn btn-danger btn-sm pull-right" style="margin: 4px;">Maaf, umur minimum untuk mendaftar katekesasi adalah 17 Tahun</button>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                            <button <?= $disabled; ?> class="btn btn-danger btn-sm pull-left" id="ubah" style="margin: 4px;">Ubah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function simpanFoto(nm) {
        var fd = new FormData();
        var id = '<?= $id_jemaat; ?>';
        var files = $('#' + nm)[0].files[0];
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
        $('.tanggal').datepicker({
            format: "dd-mm-yyyy",
            autoclose:true
        });

        $('#xyz').on('submit', (function(e) {
            e.preventDefault();

            var akte1 = '<?= $dokumen["foto_berpasang"]?>';
            var akte2 = $('#foto_berpasang').val();

            var state = true;

            if(akte1 == '' && akte2 == ''){
                toastr.error('Pastikan anda mengupload dokumen Foto Berpasangan anda terlebih dahulu.');
                e.preventDefault(e);  
                var state = false;              
            }
            
            if(state == true) {
                var fd = new FormData();
                var id = '<?= $jemaat['id'] ?>';
                var nama = '<?= $jemaat['nama_lengkap'] ?>';
                fd.append('id', id);
                fd.append('nama', nama);
                $.ajax({
                    url: '<?= site_url("warga/layanan/daftarNikah/") ?>' + id,
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.s == 'sukses') {
                            toastr.success(response.m);
                            $('#daftar').attr('disabled', 'disabled');
                            $('#ubah').attr('disabled', 'disabled');
                            setTimeout(function() {
                                window.location.href = '<?= site_url("warga/jemaat/layanan") ?>';
                            }, 2000);
                        } else {
                            toastr.error(response.m);
                        }
                    },
                });
            }
        }));

        $('#ubah').on('click', function() {
            $('#formDatax').load('<?= site_url("warga/jemaat/editProfil")?>');
        });

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
