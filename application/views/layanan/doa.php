<?php
$kat = $doa->num_rows();
if ($kat == 1) {
    $kate = $doa->row_array();
    $st = $kate['state'];
    if ($st == 1) {
        $marquee = "<marquee behavior='alternate'>Selamat Permohonan Pelayanan Doa Anda Diterima</marquee>";
        $disabled = 'disabled';
        $button = '<a href="'. site_url("warga/layanan/hapus_doa/").'" style="margin-top:5px;" role="button" class="btn btn-sm btn-success">Buat Baru</a>';
    } elseif ($st == 2) {
        $marquee = "<marquee bgcolor='red'>Mohon Maaf, Permohonan Pelayanan Doa Anda Ditolak</marquee>";
        $disabled = '';
        $button = '';
    } elseif ($st == 3) {
        $marquee = "<marquee>Permohonan Pelayanan Doa Anda Sedang Diproses</marquee>";
        $button = '';
        $disabled = '';
    }
} else {
    $disabled = '';
    $button = '';
    $marquee = '<button class="btn btn-info btn-sm pull-left" id="daftar" type="submit" style="margin: 4px;">Daftar Sekarang</button>';
}

$today = new DateTime();
$lahir = new DateTime($jemaat['tgl_lahir']);
$diff = $today->diff($lahir);
$dd = $doa->row();
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
                                                <input type="text" name="jenis" id="suami" class="form-control" required="required" value="<?= isset($dd->jenis_pelayanan)?$dd->jenis_pelayanan:'' ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nama Pelayan 1</label>
                                                <input disabled type="text" name="pelayan1" id="istri" class="form-control" required="required" value="<?=(isset($dd->nama_pelayan1)?$dd->nama_pelayan1: '')?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nama Pelayan 2</label>
                                                <input disabled type="text" name="pelayan2" id="saksi" class="form-control" required="required" value="<?= (isset($dd->nama_pelayan2)?$dd->nama_pelayan2: '')?>">
                                            </div>
                                            <br><br><br>
                                        </div>
                                        <div class="col-md-6">                                        
                                            <div class="col-md-12">
                                                <label>Keterangan</label>
                                                <textarea name="keterangan" id="keterangan" class="form-control "><?= isset($dd->tujuan)?$dd->tujuan:'' ?></textarea>
                                            </div>
                                            <div class="col-md-12" id="announ"></div>
                                            <div class="col-md-12">
                                                <div>
                                                    <?= $marquee; ?>
                                                </div>
                                            </form>
                                            <div class="form-group pull-left">
                                                <?= $button ?>
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
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#chatting',function(){
            $('#tampil_form2').load("<?=site_url()?>/warga/layanan/chat/6",function(){
                $('#modal_form2').modal('show');
            });
        });


        $('.tanggal').datepicker({
            format: "dd-mm-yyyy",
            autoclose:true
        });

        $('#buat_baru').on('click', function() {
            var baru = "<?= site_url('warga/layanan/hapus_doa/'); ?>";
            toastr.success("Dalam proses, tunggu sebentar");
            // setTimeout(function() {
            //     location.reload();
            // }, 3000);
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
