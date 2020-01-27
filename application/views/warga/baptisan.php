   <form onsubmit="return validateForm()" action="<?php echo base_url('warga/C_layanan/action_baptisan')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Pendaftaran Baptisan</h5>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
                            <label for="validationCustom01">Nama Lengkap</label>
                            <input type="text" class="form-control" id="validationCustom01" name="namalengkap" placeholder="Nama Yang Dibaptis" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                            <label for="validationCustom02">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="validationCustom02" name="jeniskelamin" placeholder="Jenis Kelamin"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4 ">
                            <label for="validationCustom02">Tempat Lahir</label>
                            <input type="text" class="form-control" id="validationCustom02" name="tempatlahir" placeholder="Tempat Lahir"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                            <label for="validationCustom02">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="validationCustom02" name="tanggallahir" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4 ">
                            <label for="validationCustom02">Nama Ayah</label>
                            <input type="text" class="form-control" id="validationCustom02" name="namaayah" placeholder="Nama Ayah"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4 ">
                            <label for="validationCustom02">Nama Ibu</label>
                            <input type="text" class="form-control" id="validationCustom02" name="namaibu" placeholder="Nama Ibu"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4 ">
                            <label for="validationCustom02">Saksi Baptis 1</label>
                            <input type="text" class="form-control" id="validationCustom02" name="saksi1" placeholder="Saksi Dari Keluarga"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4 ">
                            <label for="validationCustom02">Saksi Baptis 2</label>
                            <input type="text" class="form-control" id="validationCustom02" name="saksi2" placeholder="Saksi Dari Keluarga"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                           <div class="form-group">
                            
                           </div>
                       </div>

                       
                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        <button class="btn btn-primary" type="submit">Daftar</button>
                        <div><?php echo $this->session->flashdata('msg');?></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</form>