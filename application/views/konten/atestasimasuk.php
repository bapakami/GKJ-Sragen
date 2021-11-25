  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Akun (Atestasi Masuk)
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="pendetaa/pendeta"><i class="fa fa-briefcase"></i> Menu Pendeta </a></li>
        <li class="active">Permintaan Atestasi Masuk </li>
      </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                  <tr>
                    <th style="width:38px;">#</th>
                    
                    <th>Nama Lengkap</th>
                    <th>Iman Lama</th>
                    <th>Pepantan</th>
                    <th>Keterangan</th>
                    <th style="text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data->result_array() as $i) :
                    $no++;
                    $id = $i['id_jemaat'];                 
                    ?>
                    <tr>
                      <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                      <td><?php  echo $i['nama_lengkap'];  ?></td>
                      <td><?php $this->lib->nama_gereja($i['id_gereja_lama']);  ?></td>
                      <td><?php $this->lib->nama_pepantan($i['pepantan']); ?></td>
                      <td><?php echo $i['keterangan']; ?></td>
                      <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Tinjau">
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Ambil Tindakan ">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-switch"></i> Ambil Tindakan</button>
                          </a>
                        </span> 

                      </td>
                    </tr>   
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>


          </section>
        </div>
        <!-- jk===================================================================================================================================================================== -->


        <!-- UPDATE -->

        <?php foreach ($data->result_array() as $i) :
          $id = $i['id_jemaat'];                       

          $foto = $i['foto'];
          if ($foto == '' || $foto == null) {
            if ($i['jenis_kelamin'] == 'Perempuan') {
              $fotox = base_url() . 'assets/img/avatar2.png';
            } else {
              $fotox = base_url() . 'assets/img/avatar5.png';
            }
          } else {
            $fotox = base_url($i['foto']);
          }
          ?>

          <div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">              
             <div class="modal-content">
              <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Tinjau berkas Atestasi Masuk</h3>
              </div>
              <div class="modal-body">
                <form id="xyz_<?= $id; ?>" class="form-horizontal" >


                  <label><b>Berkas Jemaat</b></label><br>
                  <hr>
                  <div class="form-group">
                    <div class="col-md-3">
                      <label><b>Surat Atestasi</b></label><br>
                      <img src="<?= base_url().$i['astestasi']?>" alt="foto" width="150">
                    </div>
                    <div class="col-md-3">
                      <label><b>Akte Lahir</b></label><br>
                      <img src="<?= $fotox; ?>" alt="foto" width="150">
                    </div>
                  </div>
                  <br>
                  <label><b>Data Lengkap Jemaat</b></label><br>
                  <hr>
                  <div class="form-group">
                    <div class="col-md-2">Nama</div>
                    <div class="col-md-10">: <?= $i['nama_lengkap']?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Gereja Asal</div>
                    <div class="col-md-10">: <?php $this->lib->nama_gereja($i['id_gereja_lama']);?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Gereja Tujuan</div>
                    <div class="col-md-10">: <?php $this->lib->nama_gereja($i['id_gereja_baru']);?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Pepantan</div>
                    <div class="col-md-10">: <?php $this->lib->nama_pepantan($i['pepantan']);?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Alamat Tinggal</div>
                    <div class="col-md-10">: <?= $i['alamat_tinggal']?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Alasan Atestasi</div>
                    <div class="col-md-10">: <?= str_replace('<p>', '', $i['keterangan'])?></div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">Email</div>
                      <div class="col-md-10">: <?= $i['alamat_email']?></div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">Telepon Rumah</div>
                      <div class="col-md-10">: <?= $i['telepon_rumah']?></div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">No handphone</div>
                      <div class="col-md-10">: <?= $i['telepon_wa']?></div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">Status Jemaat</div>
                      <div class="col-md-10">
                        <div class="form-group" style="margin-left: 5px;">
                          <input type="hidden" name="id_gereja_baru" value="<?= $i['id_gereja_baru'] ?>">
                          <input type="hidden" name="pepantan" value="<?= $i['pepantan'] ?>">
                          <input type="radio" value="1" required name="pilih">
                          <label for="terima">Terima</label>
                          <input type="radio" value="2" required name="pilih">
                          <label for="tolak">Tolak</label>
                        </div>
                      </div><br>
                    </div>
                    <div class="form-group">
                      <div class="col-md-2">Alasan Penolakan</div>
                      <div class="col-md-10">
                        <input type="hidden" name="id" value="<?= $i['id_jemaat']?>">
                        <textarea width="400" name="alasan" placeholder="Isikan Alasan Jika Menolak"></textarea>
                      </div>
                    </div><br>
                  </div>


                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Proses</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script>
          var id = "<?= $i['id_jemaat'] ?>";

          $('#xyz_'+id).on('submit', (function(e) {
          e.preventDefault();

          $.ajax({
            url: '<?= site_url("Atestasi/Atestasimasuk/insertData/") ?>',
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
              if (response.s == 'sukses') {
                toastr.success(response.m);
                setTimeout(function() {
                  location.reload();
                }, 1500);
              } else {
                toastr.error(response.m);
              }
            },
          });

        }));

        </script>
      <?php endforeach; ?>
      <!-- ======================================== -->
      <script type="text/javascript">
        $(document).ready(function() {   

          $('#example1').DataTable( {
            responsive: true
          });

          $('textarea').wysihtml5({
            "font-styles": true, 
            "emphasis": true, 
            "lists": true, 
            "html": false, 
            "link": true, 
            "image": true, 
            "color": false 
          });

          $('#alasan').hide();
          $('#pilih').on('change', function() {    
           if($('#pilih').val() == '2') {
             $('#alasan').show();
             $('#alasan').attr('required', 'required');
           } else {
            $('#alasan').hide();
            $('#alasan').removeAttr('required');
          } 
        }); 

        });

      </script>


