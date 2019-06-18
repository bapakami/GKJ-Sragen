<!-- SLIDER Start
    ================================================== -->


	<section id="slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-8">
						 <h1>Klasis Gereja-gereja Kristen Jawa GunungKidul</h1><br>
       					 <h4>Klasis GunungKidul merupakan klasis yang terdiri dari 13 GKJ (Gereja Kristen Jawa) sehingga klasis yang besar dan luas area pelayanannya. </h4>
					</div>

					

					<div class="col-md-4">
						
						<div id="slider" class="nivoSlider">
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjpanggang.jpg" alt="" /> 
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjbejiharjo.jpg" alt=""/>
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjsemanubaru.jpg" alt="" />
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjkemadang.jpg" alt="" /> 
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjpugeran.jpg" alt=""/>
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjsusukan.jpg" alt="" />
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjlogandeng.jpg" alt="" /> 
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjbaran.jpg" alt=""/>
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjwiladeg.jpg" alt="" />
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjpaliyan.jpg" alt="" /> 
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjwatusigar.jpg" alt=""/>
					    	<img src="<?php echo base_url();?>assets/assets_user/images/gkjwonosari.jpg" alt="" />
					    	<img src="<?php echo base_url();?>assets/assets_user/images/sabdaadisemanu.jpg" alt="" /> 
					    </div> 

					
					</div>
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section> <!-- End of Section -->


	
	<!-- FEATURES Start
    ================================================== -->



	<!-- CATAGORIE Start
    ================================================== -->

	<section id="catagorie">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Berita</h2>
						</div>	
						<div class="row">
							 <?php $i=0; foreach ($isi as $data) { ?>
							 	<?php if ($i < 3) { ?>
						  	<div class="col-sm-6 col-md-4">
						  		<?php 
									$artikel = $data->judul;
									$jumlahkata = strlen($artikel);
									if ($jumlahkata < 44){
										$potong = $artikel;
									}else {
										$potong = substr($artikel,0, 44)."...";
									}
									
									?>
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="blog-single.html">
										<img src="<?php echo base_url();?>assets/assets_user/images/event1.jpg" alt="..." class="img-responsive img-thumbnail">
										<h3> <?= $potong ?> </h3>
									</a>
							      	<div class="caption">
							      	
							        	<p>Lihat Selengkapnya .... </p>
							        	<p>
							        		<a href="<?= base_url()?>Welcome/viewBerita/<?=$data->id;?>" class="btn btn-default btn-transparent" role="button">
							        			<span>Detail</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  
						  	 <?php }$i++;}  ?>
						</div>	<!-- End of /.row -->
					</div>	<!-- End of /.block --> 
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->




	