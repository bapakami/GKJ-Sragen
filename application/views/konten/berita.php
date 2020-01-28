<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SI Jemaat Klasis GKJ Gunung Kidul</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet">
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/logoGKJ.png">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/wisdom/css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html"><!-- <i class="flaticon-cross"></i> --><img src="<?php echo base_url();?>assets/wisdom/images/logoGKJ.png" height="30" width="30"> <span>GKJ Klasis</span> <span>Gunung Kidul</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="<?php echo base_url();?>LandingPage" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?php echo base_url();?>LandingPage/berita" class="nav-link">Berita</a></li>
            <li class="nav-item"><a href="<?php echo base_url();?>LandingPage/Info" class="nav-link">Info</a></li>
            <li class="nav-item"><a href="<?php echo base_url();?>LandingPage/Kontak" class="nav-link">Kontak</a></li>
            <li class="nav-item"><a href="<?php echo base_url();?>Login" class="nav-link">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(<?php echo base_url();?>assets/wisdom/images/bg_1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
      <div class="overlay js-fullheight"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="LandingPage">Home</a></span> <span>Berita</span></p>
            <h1 class="mb-3 mt-0 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Berita</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
         <?php  
         function tanggal_indo($tanggal)
         {
           $bulan = array (1 =>   'Januari',
                 'Februari',
                 'Maret',
                 'April',
                 'Mei',
                 'Juni',
                 'Juli',
                 'Agustus',
                 'September',
                 'Oktober',
                 'November',
                 'Desember'
               );
           $split = explode('-', $tanggal);
           return $split[1] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
         }

          $no = 0;
            $i=1; 
           
            foreach ($isi as $data) { 
               $idx = $data->idx;
              if($data->image != null ){
                $image = $data->image;
              }else{
                $image = 'ChurchNews.jpg';
              }
              ?>
                                    
              <div class="col-md-4 ftco-animate">
                <div class="sermons">
                  <a href="<?php echo base_url().'LandingPage/detail_berita/'.$idx; ?>">
                  <img alt="Image Display Here" src="<?php echo base_url('gallery/'.$image); ?>" class="img-responsive img-thumbnail">  

                  </a>
                  <div class="text">
                    <h3><a href="<?php echo base_url().'LandingPage/detail_berita/'.$idx; ?>"><?= $data->judul ?></a></h3>
                    <span class="position"><?=$data->fullname?> - <?=$data->namagereja?></span>
                    <span class="position"><?= tanggal_indo($data->tanggal_berita) ?></span>
                    <p><a href="<?php echo base_url().'LandingPage/detail_berita/'.$idx; ?>">[ Read More... ]</a></p>
                  </div>
                </div>
              </div>
          <?php $i++;}  ?>
         
        </div>       
          <div class="row mt-5">
            <div class="col text-center">
              <!-- <div class="block-27"> -->
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
              <!-- </div> -->
            </div>
          </div>          
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
      <!--   <div class="row mb-5">
          <div class="col-md"> -->
            <div class="ftco-footer-widget mb-4">
              <h2 class="logo"><img src="<?php echo base_url();?>assets/wisdom/images/logoGKJ.png" height="30" width="30"> <a href="index.html"></i><span>GKJ Klasis</span><span>GunungKidul</span></a></h2>

              <br>
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
   Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | GKJ Klasis Gunung Kidul <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">SLS</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
          </div>
        </div>
   
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/aos.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/scrollax.min.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/https://maps.googleapis.com/maps/api/js?key=Gf9m5PCwpwb1EG9XyJgwVosLWYX7URUBcFY0H2s&sensor=false"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/google-map.js"></script>
  <script src="<?php echo base_url();?>assets/wisdom/js/main.js"></script>
    
  </body>
</html>