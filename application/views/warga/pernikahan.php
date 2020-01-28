   <form onsubmit="return validateForm()" action="<?php echo base_url('warga/C_layanan/action_nikah')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Pendaftaran Pernikahan</h5>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
                            <label for="validationCustom01">Data Suami</label>
                            <input type="text" class="form-control" id="validationCustom01" name="namasuami" placeholder="Nama Lengkap" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                            <label for="validationCustom02"></label>
                            <input type="text" class="form-control" id="validationCustom02" name="ttl1" placeholder="Tempat, Tanggal Lahir"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                            <label for="validationCustom02">Data Isteri</label>
                            <input type="text" class="form-control" id="validationCustom02" name="namaistri" placeholder="Nama Lengkap"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                            <label for="validationCustom02"></label>
                            <input type="text" class="form-control" id="validationCustom02" name="ttl2" required placeholder="Tempat, Tanggal Lahir">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom02">Saksi Pernikahan</label>
                            <input type="text" class="form-control" id="validationCustom02" name="saksi" placeholder="Nama Lengkap Saksi"required>
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