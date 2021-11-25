<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Manajemen Data Jemaat
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-briefcase"></i> Manajemen </a></li>
      <li class="active">Manajemen Data Jemaat </li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">Preview Import Data Jemaat</div>
          <div class="box-body">
            <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:12px;">
              <thead>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No KTP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat Tinggal</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Status</th>
              </thead>
              <tbody>
                <?php $no=0; $state = 0; foreach($data_jemaat->result_array() as $dj => $a) {
                  if($a['state'] == 0) {
                    $state++;
                  }
                ?>
                  <tr>
                    <td><?= $no+=1; ?></td>
                    <td><?= $a['nama_lengkap'] ?></td>
                    <td><?= $a['alamat_email'] ?></td>
                    <td><?= $a['no_ktp'] ?></td>
                    <td><?= $a['tempat_lahir'] ?></td>
                    <td><?= $a['tanggal_lahir'] ?></td>
                    <td><?= $a['jenis_kelamin'] ?></td>
                    <td><?= $a['alamat_tinggal'] ?></td>
                    <td><?= $a['nama_ayah'] ?></td>
                    <td><?= $a['nama_ibu'] ?></td>
                    <td><?= $a['error'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <div class="form-group">
              <?php if($state <= 0) {?>
              <a href="<?= site_url('AdminGereja/Jemaat/proses_preview') ?>" role="button" class="btn btn-success">Simpan Jemaat</a>
            <?php } else { ?>
              <marquee>Masih terdapat data yg salah, mohon periksa kembali sebelum lanjut</marquee> 
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {
    $('#example1').DataTable( {
        responsive: true
    } );

    new $.fn.dataTable.FixedHeader( table );

    $('#pilih').hide();
    $('#mengerti').on('click', function() {
      $('#pilih').show();
    });
  });
</script>
