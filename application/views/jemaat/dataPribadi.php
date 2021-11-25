<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola Data Akun
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li>dashboard</li>
            <li><a href="<?= site_url('warga/jemaat/kelola') ?>">Kelola</a></li>
            <li><a href="<?= site_url('warga/jemaat/dataJemaat') ?>">Data Akun</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <?php if ($this->session->flashdata('status') == 'sukses') { ?>
                    <div role="alert" class="alert alert-success alert-dismissible fade-in wrap-input100">
                        <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
                            <span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php } elseif ($this->session->flashdata('status') == 'gagal') { ?>
                    <div role="alert" class="alert alert-danger alert-dismissible fade-in wrap-input100">
                        <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
                            <span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <div class="right_col" role="main">

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#dataDiri">Data Diri</a>
                                </li>
                                <li>
                                    <a href="#dataGerejawi" data-toggle="tab">Data Gerejawi</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <!-- Data Diri -->
                                <div id="dataDiri" class="tab-pane fade-in active">
                                    <form class="form-horizontal validate-form" onsubmit="return validateForm()" action="<?php echo base_url('warga/jemaat/editData') ?>" method="post" enctype="multipart/form-data" role="form">

                                        <div class="jumbotron" style="background: transparent;">
                                            <div class="container-fluid">
                                                <h5 align="center"><strong> Biodata Jemaat </strong></h5> <br><br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="form_lastname">No. Induk</label>
                                                        <input type="hidden" value="<?= $jemaat['id_jemaats'] ?>" name="id_jemaats">
                                                        <input id="NoInduk" type="text" name="NoInduk" class="form-control" value="<?= $jemaat['no_induk'] ?>" placeholder="Nomor Induk" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">NIK*</label>
                                                        <input id="NoKtp" type="text" required name="NoKtp" class="form-control" value="<?= $jemaat['no_ktp'] ?>" placeholder="Nomor Induk Karyawan" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">No. KK*</label>
                                                        <input id="NoKK" type="text" required name="NoKK" value="<?= $jemaat['no_kk'] ?>" class="form-control" placeholder="Nomor KK" data-error="Lastname is required.">
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="form_name">Nama Lengkap*</label>
                                                        <input id="namaLengkap" type="text" value="<?= $jemaat['nama_lengkap'] ?>" required name="namaLengkap" class="form-control" placeholder="Nama Lengkap" data-error="Firstname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">Nama Panggilan</label>
                                                        <input id="NamaPanggilan" type="text" value="<?= $jemaat['nama_panggilan'] ?>" name="NamaPanggilan" class="form-control" placeholder="Nama Panggilan" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">Jenis Kelamin</label>
                                                        <div class="form-check">
                                                            <label>
                                                                <input type="radio" name="gender" value="Laki-laki" <?= ($jemaat['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>> <span class="label-text">Laki-laki</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label>
                                                                <input type="radio" name="gender" value="Perempuan" <?= ($jemaat['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> <span class="label-text">Perempuan</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="form_lastname">Tempat Lahir*</label>
                                                        <input id="tempatLahir" type="text" required name="tempatLahir" value="<?= $jemaat['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">Tanggal Lahir*</label>
                                                        <input id="datepicker" type="text" required name="tanggalLahir" value="<?= $jemaat['tgl_lahir'] ?>" class="form-control" placeholder="Tanggal Lahir" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Status dalam Keluarga</label>
                                                        <select class="form-control" name="status_keluarga">
                                                            <option value="<?= $jemaat['status_keluarga'] ?>"><?= $jemaat['status_keluarga'] ?></option>
                                                            <option>--Select Status--</option>
                                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                            <option value="Istri">Istri</option>
                                                            <option value="Anak">Anak</option>
                                                            <option value="Saudara">Saudara</option>
                                                            <option value="Menantu">Menantu</option>
                                                            <option value="Cucu">Cucu</option>
                                                            <option value="Kakek/Nenek">Kakek/Nenek</option>
                                                            <option value="Lain-lain">Lain-lain</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="form_lastname">Email*</label>
                                                        <input id="Email" type="email" value="<?= $jemaat['alamat_email'] ?>" required name="Email" class="form-control" placeholder="Email" data-error="Lastname is required.">
                                                    </div>                                            <div class="col-md-4">
                                                        <label class="control-label">Golongan Darah</label>
                                                        <select class="form-control" name="golonganDarah">
                                                            <option value="<?= $jemaat['gol_darah'] ?>"><?= $jemaat['gol_darah'] ?></option>
                                                            <option>--Select Golongan Darah--</option>
                                                            <option value="A">A</option>
                                                            <option value="AB">AB</option>
                                                            <option value="B">B</option>
                                                            <option value="O">O</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label" for="Overview (max 200 words)">Alamat sesuai KTP*</label>
                                                        <textarea class="form-control" required rows="3" id="Overview (max 200 words)" name="AlamatKTP" placeholder="Alamat sesuai KTP"><?= $jemaat['alamat_ktp'] ?></textarea>
                                                    </div>
                                                    <div class="col-md-6 ml-auto">
                                                        <label class="control-label" for="Overview (max 200 words)">Alamat Tinggal Sekarang*</label>
                                                        <textarea class="form-control" required rows="3" id="Overview (max 200 words)" name="AlamatTinggalSekarang" placeholder="Alamat"><?= $jemaat['alamat_tinggal'] ?></textarea>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="form_lastname">No Handphone</label>
                                                        <input id="NoTelp" type="text" value="<?= $jemaat['telepon'] ?>" name="NoTelp" class="form-control" placeholder="Nomor Handphone" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">No Telp Rumah</label>
                                                        <input id="NoTelp" type="text" name="NoTelprumah" value="<?= $jemaat['telepon_rumah'] ?>" class="form-control" placeholder="Nomor Rumah" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">No Telp WA</label>
                                                        <input id="NoTelp" type="text" name="NoTelpwa" value="<?= $jemaat['telepon_wa'] ?>" class="form-control" placeholder="Nomor WA" data-error="Lastname is required.">
                                                    </div>
                                                </div>

                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="form_lastname">Nama Ayah*</label>
                                                        <input id="namaAyah" type="text" required name="namaAyah" value="<?= $jemaat['nama_ayah'] ?>" class="form-control" placeholder="Nama Ayah" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-6 ml-auto">
                                                        <label for="form_lastname">Nama Ibu*</label>
                                                        <input id="namaIbu" type="text" required name="namaIbu" value="<?= $jemaat['nama_ibu'] ?>" class="form-control" placeholder="Nama Ibu" data-error="Lastname is required.">
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="form_lastname">Nama Suami</label>
                                                        <input id="namaSuami" type="text" name="namaSuami" value="<?= $jemaat['nama_suami'] ?>" class="form-control" placeholder="Nama Suami" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-6 ml-auto">
                                                        <label for="form_lastname">Nama Istri</label>
                                                        <input id="namIstri" type="text" name="namaIstri" value="<?= $jemaat['nama_istri'] ?>" class="form-control" placeholder="Nama Istri" data-error="Lastname is required.">
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Status Rumah Tinggal</label>
                                                        <select class="form-control" name="StatusRumahTinggal">
                                                            <option value="<?= $jemaat['status_rumah_tinggal'] ?>"><?= $jemaat['status_rumah_tinggal'] ?></option>
                                                            <option>--Select Status Rumah--</option>
                                                            <option value="Milik Sendiri">Milik Sendiri</option>
                                                            <option value="Milik orang tua">Milik Orang Tua</option>
                                                            <option value="Milik Saudara">Milik Saudara</option>
                                                            <option value="Numpang">Numpang</option>
                                                            <option value="Kontrak/Sewa">Kontrak/Sewa</option>
                                                            <option value="Lain-lain">Lain-lain</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label>Pendidikan Terakhir</label>
                                                        <select class="form-control" name="PendidikanTerakhir">
                                                            <option value="<?= $jemaat['pendidikan'] ?>"><?= $jemaat['pendidikan'] ?></option>
                                                            <option>--pilih--</option>
                                                            <?php
                                                            foreach ($pendidikan as $pnd) {
                                                                echo "<option value='" . $pnd['nama_strata'] . "'>" . $pnd['nama_strata'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label>Penghasil Per bulan</label>
                                                        <select class="form-control" name="PenghasilanPerBulan">
                                                            <option value="<?= $jemaat['penghasilan'] ?>"><?= $jemaat['penghasilan'] ?></option>
                                                            <option>--Select Penghasilan--</option>
                                                            <?php
                                                            foreach ($penghasilan as $png) {
                                                                echo "<option value='$png[penghasilan_perbulan]'>$png[penghasilan_perbulan]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Pekerjaan Pokok</label>
                                                        <select class="form-control" name="PekerjaanPokok">
                                                            <option value="<?= $jemaat['pekerjaan'] ?>"><?= $jemaat['pekerjaan'] ?></option>
                                                            <option>--Select Pekerjaan Pokok--</option>
                                                            <?php
                                                            foreach ($pekerjaan as $pkj) {
                                                                echo "<option value='$pkj[nama_pp]'>$pkj[nama_pp]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">Pekerjaan Sampingan*</label>
                                                        <input id="PekerjaanSampingan" value="<?= $jemaat['pekerjaan_sampingan'] ?>" required type="text" name="PekerjaanSampingan" class="form-control" placeholder="Pekerjaan Sampingan" data-error="Lastname is required.">
                                                    </div>
                                                    <div class="col-md-4 ml-auto">
                                                        <label for="form_lastname">Minat Usaha*</label>
                                                        <input id="minatUsaha" type="text" value="<?= $jemaat['minat_usaha'] ?>" required name="minatUsaha" class="form-control" placeholder="Minat Usaha" data-error="Lastname is required.">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="btn btn-info" type="submit" value="Perbaharui">
                                            <button class="btn btn-default" id="close" type="button">Close</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Data Gerejawi -->
                                <div id="dataGerejawi" class="tab-pane fade-in">
                                  <h5 align="center"><strong> Data Gerejawi Jemaat</strong></h5> <br><br>
                                  <form class="form-horizontal validate-form" onsubmit="return validateForm()" action="<?php echo base_url('warga/jemaat/editDataGerejawi') ?>" method="post" enctype="multipart/form-data" role="form">
                                    <?php if($jemaat['gerejaid'] == '' && $jemaat['Pepantan_id'] == '') { ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                              <label>Gereja Sekarang</label>
                                              <select class='form-control' id='gereja_edit' name="gereja_edit" required>
                                                <option value=''>--pilih--</option>
                                                <?php foreach ($gereja as $grj) { ?>
                                                    "<option value='<?= $grj["id"]?>' <?php if($this->session->userdata('gereja_id') == $grj['id']) { echo "selected"; } ?> ><?= $grj['namagereja']?></option>";
                                                <?php } ?>
                                            </select>                               
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                          <label>Asal Pepanthan</label>
                                          <select class='form-control' id='pepantan_edit' name="pepantan_edit" required>
                                           <?php if($this->session->userdata('gereja_id') != '') {?>                                   
                                               <option value='Gereja Induk'>Gereja Induk</option>
                                               <?php foreach ($pepantan as $pnt) { ?>
                                                <option value='<?= $pnt["id"] ?>' <?php if($jemaat['Pepantan_id'] == $pnt['id']){echo "selected"; }?>><?= $pnt["namapepantan"] ?></option>
                                            <?php } } else {?>
                                                <option>Pilih Pepantan</option>
                                                <script>
                                                    $('#gereja_edit').on('change', function() {
                                                        var url = '<?= site_url("warga/jemaat/daftarPepantan/")?>'+$(this).val();
                                                        $('#pepantan_edit').load(url);
                                                        return false;
                                                    });
                                                </script>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                  <label>Status Warga Gereja</label>
                                  <select class="form-control" name="StatusWargaGereja_edit" required>
                                     <option value="<?= $jemaat['status_warga']?>"><?= $jemaat['status_warga']?></option>
                                     <option value="Warga">Warga</option>
                                     <option value="Tamu">Tamu</option>
                                     <option value="Warga Belajar">Warga Belajar</option>                            
                                 </select>                               
                             </div>
                             <div class="col-md-6 ml-auto">
                              <label>Tempat Kebaktian</label>
                              <select class="form-control" name="TempatKebaktian_edit" required>
                                <option value="<?= $jemaat['tempat_kebaktian']?>"><?= $jemaat['tempat_kebaktian']?></option>
                                <option value="Induk">Induk</option>
                                <option value="Wilayan">Wilayan</option>
                                <option value="Gereja">Gereja</option>                            
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                          <label for="form_lastname">Pendeta yang Membaptis</label>
                          <input id="pdt_baptis_edit" type="text" name="pdt_baptis_edit" class="form-control" placeholder="Nama Pendeta" value="<?= $jemaat['pdt_baptis']?>">                               
                      </div>
                      <div class="col-md-4 ml-auto">
                          <label for="form_lastname">Tempat Baptis</label>
                          <input type="text" name="tempat_baptis_edit" class="form-control" placeholder="Tempat Baptis" value="<?= $jemaat['tempat_baptis']?>">
                      </div>
                      <div class="col-md-4 ml-auto">
                          <label for="form_lastname">Tanggal Baptis</label>
                          <input id="datepickerbaptis_edit" type="text" name="tanggal_baptis_edit" class="form-control tanggal" placeholder="Tanggal Baptis" value="<?= $jemaat['tgl_baptis']?>">
                      </div>
                  </div>

                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="form_lastname">Pendeta</label>
                      <input id="pdt_sidhi_edit" type="text" name="pdt_sidhi_edit" class="form-control" placeholder="Nama Pendeta" value="<?= $jemaat['pdt_sidhi']?>">                               
                  </div>
                  <div class="col-md-4 ml-auto">
                      <label for="form_lastname">Tempat Sidhi</label>
                      <input type="text" name="tempat_sidhi_edit" class="form-control" value="<?= $jemaat['tempat_sidhi']?>" placeholder="Tempat Sidhi">
                  </div>
                  <div class="col-md-4 ml-auto">
                      <label for="form_lastname">Tanggal Sidhi</label>
                      <input id="datepickersidhi_edit" type="text" name="tanggal_sidhi_edit" class="form-control tanggal" placeholder="Tanggal Sidhi" value="<?= $jemaat['tgl_sidhi']?>" >
                  </div>
              </div>

              <div class="modal-footer">
                <input class="btn btn-info" type="submit" value="Perbaharui">
                <button class="btn btn-default" id="close" type="button">Close</button>
            </div>
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
        $('.tanggal').datepicker(function(){
            format: 'dd-mm-yyyy';
        })
        $('#close').on('click', function() {
            window.location.href = '<?= site_url("warga/jemaat/kelola") ?>';
        });
    });
</script>
