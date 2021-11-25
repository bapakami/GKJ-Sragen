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

$kat = $katekesasi->num_rows();
if ($kat == 1) {
    $kate = $katekesasi->row_array();
    $st = $kate['state'];
    if ($st == 1) {
        $marquee = "<marquee behavior='alternate'>Selamat Permohonan Katekesasi Anda Diterima</marquee>";
        $disabled = 'disabled';
    } elseif ($st == 2) {
        $marquee = "<marquee bgcolor='red'>Mohon Maaf, Permohonan Katekesasi Anda Ditolak</marquee>";
        $disabled = '';
    } elseif ($st == 3) {
        $marquee = "<marquee>Permohonan Katekesasi Anda Sedang Diproses</marquee>";
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
                                        <h3>Pendaftaran Ketekesasi</h3>
                                    </center>
                                    <hr />
                                </div>
                                <div class="col-md-4">
                                    <img src="<?= $fotox; ?>" alt="Foto User" id="fotoUser" width="200">
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-3">
                                        <label>No KTP </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?= $jemaat['no_ktp'] ?></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Nama Lengkap </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?= $jemaat['nama_lengkap'] ?></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Nama Ayah </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?= $jemaat['nama_ayah'] ?></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Berkas </label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div style="margin-bottom: 3%;">
                                                <h4 class="card-title text-center">Scan Akte Kelahiran</h4><br>
                                                <input <?= $disabled; ?> onchange="simpanFoto('akte_lahir')" type="file" id="foto_akte_lahir" class="dropify" <?php if ($dokumen['akte_lahir'] != '' || $dokumen['akte_lahir'] != null) { ?> data-default-file="<?= base_url($dokumen['akte_lahir']) ?>" <?php } ?> /><br>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div style="margin-bottom: 3%;">
                                                <h4 class="card-title text-center">Scan Surat Baptis</h4><br>
                                                <input <?= $disabled; ?> onchange="simpanFoto('surat_baptis_anak')" type="file" <?php if ($dokumen['surat_baptis_anak'] != '' && $dokumen['surat_baptis_anak'] != null) { ?> data-default-file="<?= base_url($dokumen['surat_baptis_anak']) ?>" <?php } ?> id="foto_surat_baptis_anak" class="dropify" /><br>
                                            </div>

                                            <small>Bagi yang sudah baptis, atau surat pernyataan bagi yang belum dibaptis (non kristen)</small>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-12">
                                        <div>
                                            <?= $marquee; ?>
                                        </div>
                                        <button <?= $disabled; ?> class="btn btn-danger btn-sm pull-left" id="ubah" style="margin: 4px;">Ubah Data</button>
                                        <button class="btn btn-warning btn-sm pull-left" id="chat" style="margin: 4px;">Chat</button>
                                    </div>
                                    
                                    <div id="modal_form2" class="modal" data-width="800" data-height="400">
                                        <div style="width: 100%;" id="tampil_form2"></div>
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
        $(document).on('click','#chat',function(){
            $('#tampil_form2').load("<?=site_url()?>/warga/layanan/chat/1",function(){
                $('#modal_form2').modal('show');
            });
        });


        $('#daftar').on('click', function(e) {
            e.preventDefault();
            var foto = document.getElementById('fotoUser');
            var jenis = foto.getAttribute('src');
            var value = jenis.split('/');

            // cek data scan an

            var akte1 = '<?= $dokumen["akte_lahir"]?>';
            var akte2 = $('#foto_akte_kelahiran').val();

            var bapt1 = '<?= $dokumen["surat_baptis_anak"]?>';
            var bapt2 = $('#foto_surat_baptis_anak').val();

            var state = true;
            if(value[6] == 'avatar5.png' || value[6] == 'avatar2.png'){      
                toastr.error('Pastikan anda mengupload pas foto terbaru anda terlebih dahulu.');
                toastr.success('Gunakan menu ubah data dan ganti foto profile anda dengan yang terbaru.');
                e.preventDefault(e);                
                var state = false;
            } 

            if(akte1 == '' && akte2 == ''){
                toastr.error('Pastikan anda mengupload dokumen akte lahir anda terlebih dahulu.');
                e.preventDefault(e);  
                var state = false;              
            }

            if(bapt1 == '' && bapt2 == ''){
                toastr.error('Pastikan anda mengupload dokumen surat baptis anda terlebih dahulu.');
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
                    url: '<?= site_url("warga/layanan/daftarKatekesasi/") ?>' + id,
                    type: 'post',
                    data: fd,
                    dataType: "json",
                    contentType: false,
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
        });

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
