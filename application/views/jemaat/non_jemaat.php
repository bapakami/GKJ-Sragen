<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard <button id="tambah" class="btn btn-sm btn-warning pull-right">Tambah</button>
      <small></small>
    </h1>
    <ol class="breadcrumb">

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php if ($this->session->flashdata('status') == 'sukses') { ?>
        <div role="alert" class="alert alert-success alert-dismissible fade-in wrap-input100">
          <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
            <span aria-hidden="true" class="fa fa-times"></span>
          </button>
          <?php echo $this->session->flashdata('message'); ?>
        </div>
      <?php  } ?>
      <div class="col-xs-12">
        <!-- <div class="box"> -->
          <div class="box-body table-responsive">
            <div class="right_col" role="main">
              <?php 
              if($non_jemaat->num_rows() > 0) {
                foreach($non_jemaat->result_array() as $bj => $bb):
                  if ($bb['jenis_kelamin'] == 'Perempuan') {
                    $fotox = base_url() . 'assets/img/avatar2.png';
                  } else {
                    $fotox = base_url() . 'assets/img/avatar5.png';
                  }
                  ?>
                  <div class="col-md-3">

                    <!-- data keluarga  -->
                    <!-- Profile Image -->
                    <div class="box box-primary">
                      <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?= $fotox?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?= $bb['nama_lengkap']?></h3>

                        <p class="text-muted text-center"><strong><?= $bb['status_keluarga']?></strong></p>

                        <ul class="list-group list-group-unbordered">

                          <!-- /.box-header -->
                          <div class="box-body">
                            <strong><i class="fa fa-home margin-r-5"></i> Gereja</strong>

                            <p class="text-muted">
                              <?= $bb['status_warga']?> <?php $this->lib->nama_gereja($bb['gerejaid']); ?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                            <p class="text-muted"><?= $bb['alamat_tinggal']?></p>
                          </div>
                        </ul>

                        <a href="<?= site_url('warga/jemaat/editNonJemaat/'.$bb['id'])?>" class="btn btn-primary btn-block"><b>Lebih Detail <i class="fa fa-arrow-circle-right"></i></b></a>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                <?php endforeach; } else { ?>
                  <div class="col-xs-12">
                    <div class="error-page">
                      <h2 class="headline text-yellow"> <i class="fa fa-warning text-yellow"></i></h2>

                      <div class="error-content">
                        <h3>Oops! Tidak ada Data.</h3>

                        <p>
                          Belum ada data.
                          Silahkan Klik tombol Tambah untuk menambahkan data.
                        </p>
                      </div>
                      <!-- /.error-content -->
                    </div>
                  </div>
                <?php } ?> 
                <!-- end data keluarga  -->
              </div>
            </div>
            <!-- </div> -->
          </div>
        </div>
      </section>
    </div>
    <script>
      $('#tambah').on('click', function() {
        window.location.href = '<?= site_url("warga/jemaat/tambahNonJemaat")?>';
      });
    </script>
