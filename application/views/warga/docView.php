   <form onsubmit="return validateForm()" action="<?php echo base_url('warga/C_Warga/lengkapidata')?>" method="post" enctype="multipart/form-data" role="form">
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Dokumen Pelengkap</h5>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="row">
                          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                             <!-- .card -->
                             <div class="card card-figure has-hoverable">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->ktp) ?>" alt="Card image cap">
                                   <!-- .figure-caption -->
                                   <figcaption class="figure-caption">
                                      <h6 class="figure-title">Kartu Tanda Penduduk</h6> 
                                  </figcaption>
                                  <!-- /.figure-caption -->
                              </figure>
                              <!-- /.card-figure -->
                          </div>
                          <!-- /.card -->
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                         <!-- .card -->
                         <div class="card card-figure has-hoverable">
                            <!-- .card-figure -->
                            <figure class="figure">
                               <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->kk) ?>" alt="Card image cap">
                               <!-- .figure-caption -->
                               <figcaption class="figure-caption">
                                  <h6 class="figure-title">Kartu Keluarga</h6>

                              </figcaption>
                              <!-- /.figure-caption -->
                          </figure>
                          <!-- /.card-figure -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                     <!-- .card -->
                     <div class="card card-figure has-hoverable">
                        <!-- .card-figure -->
                        <figure class="figure">
                           <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_baptis_anak) ?>" alt="Card image cap">
                           <!-- .figure-caption -->
                           <figcaption class="figure-caption">
                              <h6 class="figure-title"> Surat Baptis Anak</h6>

                          </figcaption>
                          <!-- /.figure-caption -->
                      </figure>
                      <!-- /.card-figure -->
                  </div>
                  <!-- /.card -->
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                 <!-- .card -->
                 <div class="card card-figure has-hoverable">
                    <!-- .card-figure -->
                    <figure class="figure">
                       <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_baptis_dewasa) ?>" alt="Card image cap">
                       <!-- .figure-caption -->
                       <figcaption class="figure-caption">
                          <h6 class="figure-title"> Surat Baptis Dewasa</h6>

                      </figcaption>
                      <!-- /.figure-caption -->
                  </figure>
                  <!-- /.card-figure -->
              </div>
              <!-- /.card -->
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
             <!-- .card -->
             <div class="card card-figure has-hoverable">
                <!-- .card-figure -->
                <figure class="figure">
                   <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_sidhi) ?>" alt="Card image cap">
                   <!-- .figure-caption -->
                   <figcaption class="figure-caption">
                      <h6 class="figure-title">Surat Sidhi </h6>

                  </figcaption>
                  <!-- /.figure-caption -->
              </figure>
              <!-- /.card-figure -->
          </div>
          <!-- /.card -->
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
         <!-- .card -->
         <div class="card card-figure has-hoverable">
            <!-- .card-figure -->
            <figure class="figure">
               <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_nikah) ?>" alt="Card image cap">
               <!-- .figure-caption -->
               <figcaption class="figure-caption">
                  <h6 class="figure-title"> Surat Nikah</h6>

              </figcaption>
              <!-- /.figure-caption -->
          </figure>
          <!-- /.card-figure -->
      </div>
      <!-- /.card -->
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
     <!-- .card -->
     <div class="card card-figure has-hoverable">
        <!-- .card-figure -->
        <figure class="figure">
           <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_kematian) ?>" alt="Card image cap">
           <!-- .figure-caption -->
           <figcaption class="figure-caption">
              <h6 class="figure-title"> Surat Kematian</h6>

          </figcaption>
          <!-- /.figure-caption -->
      </figure>
      <!-- /.card-figure -->
  </div>
  <!-- /.card -->
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
 <!-- .card -->
 <div class="card card-figure has-hoverable">
    <!-- .card-figure -->
    <figure class="figure">
       <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_pengantar) ?>" alt="Card image cap">
       <!-- .figure-caption -->
       <figcaption class="figure-caption">
          <h6 class="figure-title"> Surat Pengantar </h6>

      </figcaption>
      <!-- /.figure-caption -->
  </figure>
  <!-- /.card-figure -->
</div>
<!-- /.card -->
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
 <!-- .card -->
 <div class="card card-figure has-hoverable">
    <!-- .card-figure -->
    <figure class="figure">
       <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$data->surat_cerai) ?>" alt="Card image cap">
       <!-- .figure-caption -->
       <figcaption class="figure-caption">
          <h6 class="figure-title"> Surat Cerai </h6>

      </figcaption>
      <!-- /.figure-caption -->
  </figure>
  <!-- /.card-figure -->
</div>
<!-- /.card -->
</div>
</div>


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

</div>

<div><?php echo $this->session->flashdata('msg');?></div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
</div>
</div>
</form>
</div>
</div>
</div>
</form>