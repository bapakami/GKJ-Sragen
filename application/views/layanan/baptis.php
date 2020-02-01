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

$kat = $baptis->num_rows();
if ($kat == 1) {
    $kate = $baptis->row_array();
    $st = $kate['state'];
    if ($st == 1) {
        $marquee = "<marquee behavior='alternate'>Selamat Permohonan Baptis Anda Diterima</marquee>";
        $disabled = 'disabled';
    } elseif ($st == 2) {
        $marquee = "<marquee bgcolor='red'>Mohon Maaf, Permohonan Baptis Anda Ditolak</marquee>";
        $disabled = '';
    } elseif ($st == 3) {
        $marquee = "<marquee>Permohonan Baptis Anda Sedang Diproses</marquee>";
        $disabled = 'disabled';
    }
} else {
    $disabled = '';
    $marquee = '<button class="btn btn-info btn-sm pull-left" id="daftar" type="submit" style="margin: 4px;">Daftar Sekarang</button>';
}

$today = new DateTime();
$lahir = new DateTime($jemaat['tgl_lahir']);
$diff = $today->diff($lahir);

if($diff->y <= 13) {
    $jns = 'Kecil';
} else {
    $jns = 'Dewasa';
}
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
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h3>Pendaftaran Baptis <?= $jns?></h3>
                                    </center>
                                    <hr />
                                </div>
                                <div class="col-md-4">
                                    <img src="<?= $fotox; ?>" alt="Foto User" id="fotoUser" width="200">
                                </div>
                                <div class="col-md-8" id="formDatax">
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
                                        <label>Nama Ibu </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?= $jemaat['nama_ibu'] ?></label>
                                    </div>
                                     <div class="col-md-3">
                                        <label>Saksi 1</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label><input type="text" name="saksi1" id="saksi1" class="form-control" value="<?= $baptis->row()->saksi1;?>"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Saksi 2</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label><input type="text" name="saksi2" id="saksi2" class="form-control" value="<?= $baptis->row()->saksi2;?>"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Berkas </label>
                                    </div>
                                    <div class="col-md-12">
                                            <div style="margin-bottom: 3%;">
                                                <h4 class="card-title text-center">Scan Akte Kelahiran</h4><br>
                                                <input <?= $disabled; ?> onchange="simpanFoto('akte_lahir')" type="file" id="foto_akte_lahir" class="dropify" <?php if ($dokumen['akte_lahir'] != '' || $dokumen['akte_lahir'] != null) { ?> data-default-file="<?= base_url($dokumen['akte_lahir']) ?>" <?php } ?> /><br>
                                            </div>
                                    </div>
                                    <br><br><br>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-12">
                                        <div>
                                            <?php if ($diff->y >= 17) { ?>
                                                <?= $marquee; ?>
                                            <?php } else { ?>
                                                <button class="btn btn-danger btn-sm pull-right" style="margin: 4px;">Maaf, umur minimum untuk mendaftar katekesasi adalah 17 Tahun</button>
                                            <?php } ?>
                                        </div>
                                        <button <?= $disabled; ?> class="btn btn-danger btn-sm pull-left" id="ubah" style="margin: 4px;">Ubah Data</button>
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
        $('#daftar').on('click', function(e) {
            e.preventDefault();
            var foto = document.getElementById('fotoUser');
            var jenis = foto.getAttribute('src');
            var value = jenis.split('/');

            // cek data scan an

            var akte1 = '<?= $dokumen["akte_lahir"]?>';
            var akte2 = $('#foto_akte_kelahiran').val();

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
            if($('#saksi1').val() == ''){
                toastr.error('Saksi 1 Wajid di isi');
                $('#saksi1').focus();
                e.preventDefault(e);  
                var state = false;              
            }
            if(akte1 == '' && akte2 == ''){
                toastr.error('Pastikan anda mengupload dokumen akte lahir anda terlebih dahulu.');
                e.preventDefault(e);  
                var state = false;              
            }
            if(state == true) {
                var fd = new FormData();
                var id = '<?= $jemaat['id'] ?>';
                var nama1 = $('#saksi1').val();
                var nama2 = $('#saksi2').val();
                fd.append('id', id);
                fd.append('nama1', nama1);
                fd.append('nama2', nama2);

                $.ajax({
                    url: '<?= site_url("warga/layanan/daftarBaptis") ?>',
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
            $('#formDatax').hide();
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
