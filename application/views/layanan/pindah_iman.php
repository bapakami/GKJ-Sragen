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

$kat = $iman->num_rows();
if ($kat == 1) {
    $kate = $iman->row_array();
    $st = $kate['state'];
    if ($st == 1) {
        $marquee = "<marquee behavior='alternate'>Selamat Permohonan Pindah Iman Anda Diterima</marquee>";
        $disabled = 'disabled';
    } elseif ($st == 2) {
        $marquee = "<marquee bgcolor='red'>Mohon Maaf, Permohonan Pindah Iman Anda Ditolak</marquee>";
        $disabled = '';
    } elseif ($st == 3) {
        $marquee = "<marquee>Permohonan Pindah Iman Anda Sedang Diproses</marquee>";
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
                                        <h3>Pendaftaran Pindah Iman</h3>
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
                                        <label>Gereja </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php $this->lib->nama_gereja($jemaat['gerejaid']); ?></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Iman Baru </label>
                                    </div>
                                    <div class="col-md-8" style="margin: 5px;">
                                        <select class="form-control" id="id_iman" name="id_iman">                                            
                                            <option value="" selected="">--Pilih Iman--</option>
                                            <?php foreach ($daftar_iman as $row => $key) { ?>
                                                <option value="<?= $key['id']?>"><?= $key['agama']?></option>    
                                            <?php } ?>                                            
                                        </select>  
                                    </div>
                                    <div class="col-md-3">
                                        <label>Alasan</label>
                                    </div>
                                    <div class="col-md-8" style="margin: 5px;">
                                        <textarea id="alasan" name="alasan" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-12" id="announ"></div>
                                    <br><br><br>
                                    <div class="col-md-8 pull-right">
                                        <div>
                                            <?= $marquee; ?>
                                        </div>
                                        <button <?= $disabled; ?> class="btn btn-danger btn-sm pull-left" id="ubah" style="margin: 4px;">Ubah Data</button>
                                        <button class="btn btn-warning btn-sm pull-left" type="button" id="chatting" style="margin: 4px;">Chat</button>
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
    </div>
</section>
</div>

<script>
    $(document).ready(function() {

        $(document).on('click','#chatting',function(){
            $('#tampil_form2').load("<?=site_url()?>/warga/layanan/chat/8",function(){
                $('#modal_form2').modal('show');
            });
        });

        $('textarea').wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": true, //Button to insert an image. Default true,
            "color": false //Button to change color of font  
        });

        $('#daftar').on('click', function(e) {
            e.preventDefault();
            var id = $('#id_iman').val();
            var alasan = $('#alasan').val();
            var state = true;

            if(id == ''){
                toastr.error('Pastikan anda memilih jenis Iman / Agama terlebih dahulu.');
                e.preventDefault(e);                
                var state = false;
            }

            if(alasan == ''){
                toastr.error('Isikan Alasan terlebih dahulu.');
                e.preventDefault(e);                
                var state = false;
            }
            
            if(state == true) {
                var fd = new FormData();
                var id = $('#id_iman').val();
                fd.append('id_iman_baru', id);
                fd.append('alasan', alasan);

                $.ajax({
                    url: '<?= site_url("warga/layanan/daftarPindahIman/") ?>',
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
