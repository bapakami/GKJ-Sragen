<?php
$kat = $doa->num_rows();
if ($kat == 1) {
    $kate = $doa->row_array();
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
                                        <h3>Pendaftaran Pelayanan Doa</h3>
                                    </center>
                                    <hr />
                                </div>
                                <div class="row">
                                    <form id="xyz">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label>Jenis Pelayanan</label>
                                                <input type="text" name="jenis" id="suami" class="form-control" required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nama Pelayan 1</label>
                                                <input type="text" disabled name="pelayan1" id="istri" class="form-control" required="required" value="<?php (isset($doa->row()->nama_pelayan1)?$doa->row()->nama_pelayan1 : '')?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nama Pelayan 2</label>
                                                <input type="text" disabled name="pelayan2" id="saksi" class="form-control" required="required" value="<?php (isset($doa->row()->nama_pelayan2)?$doa->row()->nama_pelayan2 : '')?>">
                                            </div>
                                            <br><br><br>
                                        </div>
                                        <div class="col-md-6">                                        
                                            <div class="col-md-12">
                                                <label>Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" class="form-control "></textarea>
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
    $(document).ready(function() {
        $('.tanggal').datepicker({
            format: "dd-mm-yyyy",
            autoclose:true
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

        $('#xyz').on('submit', (function(e) {
            e.preventDefault();
            var state = true;
            
            if(state == true) {
                $.ajax({
                    url: '<?= site_url("warga/layanan/daftarDoa/") ?>',
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
