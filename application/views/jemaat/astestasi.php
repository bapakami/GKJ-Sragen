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
            <?php $state = isset($astestasi->row()->state)?$astestasi->row()->state:''; if($state == 2) {?>
                <div role="alert" class="alert alert-danger alert-dismissible fade-in wrap-input100">
                    <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
                        <span aria-hidden="true" class="fa fa-times"></span>
                    </button>
                    Permohonan Anda Ditolak dengan alasan <?php  echo '"'.isset($astestasi->row()->alasan)?$astestasi->row()->alasan:''.'"'; ?>
                </div>
            <?php } ?>
            <!-- gereja asal -->
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-body table-responsive">
                        <div class="right_col" role="main">
                            <div id="dataResponsive">
                               <div class="row">
                                <div class="col-md-12">
                                   <h4>Gereja Asal</h4>
                                   <form id="gereja_asal" style="font-size: 15px;">
                                       <i class="fa fa-home"> &nbsp;&nbsp;<?php $this->lib->nama_gereja($jemaat['gerejaid'])?></i>&nbsp;&nbsp;<br>
                                       <i class="fa fa-user"> &nbsp;&nbsp;&nbsp;<?= $jemaat['nama_lengkap'] ?></i><br>
                                       <i class="fa fa-user"> &nbsp;&nbsp;&nbsp;<?= $jemaat['jenis_kelamin']?></i><br>
                                       <i class="fa fa-envelope"> &nbsp;&nbsp;<?= $jemaat['alamat_email']?></i><br>
                                       <i class="fa fa-address-card"> &nbsp;&nbsp;<?= $jemaat['alamat_ktp']?></i><br>
                                       <i class="fa fa-home"> &nbsp;&nbsp;&nbsp;<?= $jemaat['alamat_tinggal']?></i><br>
                                       <br>
                                       <br>
                                       <div id="astestasixx">
                                           <div class="col-md-12">
                                            <div style="margin-bottom: 3%;"> 
                                                <h4 class="card-title text-center">Scan Akte Kelahiran</h4><br>
                                                <input onchange="simpanFoto('akte_lahir')" type="file" id="akte_lahir" class="dropify" <?php if ($dokumen['akte_lahir'] != '' || $dokumen['akte_lahir'] != null) { ?> data-default-file="<?= base_url($dokumen['akte_lahir']) ?>" <?php } ?> /><br>
                                            </div>
                                        </div>
                                        <div id="aksiAstestasi">
                                           <div class="row">
                                            <div class="col-md-6">
                                                <label>Gereja Tujuan</label>
                                                <select class='form-control' id='gereja_edit' name="gereja" required>
                                                    <option value=''>--pilih--</option>
                                                    <?php foreach ($gereja as $grj) { ?>
                                                        "<option value='<?= $grj["id"]?>'><?= $grj['namagereja']?></option>";
                                                    <?php } ?>
                                                </select>                               
                                            </div>
                                            <div class="col-md-6 ml-auto">
                                                <label>Pepanthan</label>
                                                <select class='form-control' id='pepantan_edit' name="pepantan" required>
                                                    <option>Pilih Pepantan</option>
                                                    <script>
                                                        $('#gereja_edit').on('change', function() {
                                                            var text = $('#gereja_edit option:selected').text();
                                                            $('#tujuanx').text(text);
                                                            var url = '<?= site_url("warga/jemaat/daftarPepantan/")?>'+$(this).val();
                                                            $('#pepantan_edit').load(url);
                                                            return false;
                                                        });
                                                    </script>
                                                </select>
                                            </div>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="id_jemaat" value="<?= $jemaat['id']?>">
                                    <input type="hidden" name="gereja_asal" value="<?= $this->session->userdata('gereja_id');?>">
                                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea><br>
                                    <button class="btn btn-info btn-sm" type="submit" id="astestasi">Proses Astestasi Keluar</button>                                           
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- astestasi keluar -->
<div class="col-xs-6" >
    <div class="box">
        <div class="box-body table-responsive">
            <div class="right_col" role="main">
                <div id="dataResponsive">
                   <div class="row">
                       <div class="col-md-6">
                           <h4>Gereja Tujuan</h4>
                           <form id="gereja_tujuan" style="font-size: 15px;" >
                            <i class="fa fa-home"> &nbsp;&nbsp;<span id="tujuanx"><?php $this->lib->nama_gereja($jemaat['gerejaid'])?></span></i><br>
                            <i class="fa fa-user"> &nbsp;&nbsp;&nbsp;<?= $jemaat['nama_lengkap'] ?></i><br>
                            <i class="fa fa-user"> &nbsp;&nbsp;&nbsp;<?= $jemaat['jenis_kelamin']?></i><br>
                            <i class="fa fa-envelope"> &nbsp;&nbsp;<?= $jemaat['alamat_email']?></i><br>
                            <i class="fa fa-address-card"> &nbsp;&nbsp;<?= $jemaat['alamat_ktp']?></i><br>
                            <i class="fa fa-home"> &nbsp;&nbsp;&nbsp;<?= $jemaat['alamat_tinggal']?></i><br>
                            <br>
                            <br>
                            <?php $state = isset($astestasi->row()->state)?$astestasi->row()->state:''; if($state == 1) {?>
                                <img src="<?= base_url().$dokumen['astestasi']?>" width="150"><br>
                                <i class="fa fa-download"> &nbsp;&nbsp;<a href="<?= base_url().$dokumen['astestasi']?>" download>Download File</a></i><br>
                            <?php } ?>
                        </form>
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
        $('.dropify').dropify();
    }); 
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
        var hidden = '<?= (isset($astestasi->row()->state)?$astestasi->row()->state:0); ?>';

        if(hidden == '3') {
            var idgereja = '<?= (isset($astestasi->row()->id_gereja_baru)?$astestasi->row()->id_gereja_baru:"")?>';
            var idxx = '<?php $this->lib->nama_gereja((isset($astestasi->row()->id_gereja_baru)?$astestasi->row()->id_gereja_baru:""))?>';
            $('#tujuanx').text(idxx);
            $('#astestasixx').hide();
        }

        $('textarea').wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": true, //Button to insert an image. Default true,
            "color": false //Button to change color of font  
        });


    });

    $('#gereja_asal').on('submit', (function(e) {
        e.preventDefault();
        var state = true;
        var gereja = $('#gereja_edit').val();
        var pepantan = $('#pepantan_edit').val();
        var keterangan = $('#keterangan').val();

        if(gereja == ''){
            toastr.error('Pastikan anda telah memilih Gereja Tujuan terlebih dahulu.');
            e.preventDefault(e);  
            var state = false;               
        }

        if(pepantan == ''){
            toastr.error('Pastikan anda telah memilih Pepantan terlebih dahulu.');
            e.preventDefault(e);  
            var state = false;              
        }

        if(keterangan == ''){
            toastr.error('Keterangan harus diisi.');
            e.preventDefault(e);  
            var state = false;              
        }

        if(state == true) {
            $.ajax({
                url: '<?= site_url("warga/jemaat/astestasiKeluar/") ?>',
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
                            window.location.href = '<?= site_url("warga/jemaat/kelola") ?>';
                        }, 1500);
                    } else {
                        toastr.error(response.m);
                    }
                },
            });
        }
    }));
</script>
