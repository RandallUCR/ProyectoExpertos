<?php
    include_once 'View/headerView.php';
?>

	  
	<section class="about-banner relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
							<?php echo $vars['Nombre_D'] ?>
					</h1>	
				</div>	
			</div>
		</div>
	</section>
	<!-- End banner Area -->				  

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">

			<div class="row">
					


				<div class="col-lg-8" style="margin-rigth:50px;">
						<h1 style="color: #84429D">Destino</h1><br>
						<p style="font-size: 20px; text-align:justify">
							<?php echo $vars['Descripcion_D'] ?>
						</p>
						<h4><?php echo $vars['tipo_estadia']?></h4><br>
						<h3 style="color: #FF6A28">Precio: ₡<?php echo $vars['Precio_D']?></h3><br>
					
				</div>

				<div class="col-lg-3" style="margin-left:50px;">
					<h1 style="color: #84429D">Galería</h1><br>
					<a data-toggle="modal" data-target="#myModal">
						<div class="single-gallery-image" style="background: url(img/picture.png);"></div>
					</a>
					
				</div>

			</div>

			<div>
		
				<h1 style="color: #84429D">Ubicación</h1><br>
				<p style="font-size: 20px; text-align:justify">
							<?php echo $vars['Ubicacion_D'] ?>
				</p>
				<div data-aos="fade-up" class="aos-init aos-animate">
					<iframe src="<?php echo $vars['LinkU_D']?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
				</div>

			</div>

			
		</div>	
	</section>

	
	

			<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" >
  	<div class="modal-dialog modal-lg " >

		<!-- Modal content-->
		<div class="modal-content" style="background-color: #84429D60">


			<div class="modal-header">
				<h3 class="modal-title" style="color: #FFFFFF">Galería</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<div class="modal-body">
				<div class="row"  >
					
						
					<?php foreach($vars['Galeria_D'] as $item)
					{
					?>
						<div class="col-sm-4" style="margin-top:20px;">
						
							<img class="img-fluid" width="100%" height="100%" src="<?php echo $item[0]?>"  alt="">
								
						</div>
						
					<?php
					}
					?>

				</div>
					
				<!-- End hot-deal Area -->

				<center>
					
				<div class="col-sm-6" style="margin-top:20px;">
					<iframe width="100%" height="250" src="<?php echo $vars['LinkV_D']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
				</div>
				</center>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<?php
    include_once 'View/footerView.php';
?>



