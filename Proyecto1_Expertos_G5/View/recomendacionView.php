<?php
    include_once 'View/headerView.php';
?>

			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Destinos Turisticos Recomendados
							</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start destinations Area -->
			<section class="destinations-area section-gap">
				<div class="container">

					<div class="row">
						<?php
						foreach($vars['DestinosR'] as $item)

						{
						?>

						<div class="col-lg-4">
							<form action="?controlador=Index&accion=detallesDestino" method="post">
								<div class="single-destinations">
									<div class="thumb">
										<img src="<?php echo $item[2]?>" alt="" width="100%" height="auto" style="max-height:200px">
									</div>
									<div class="details">
										<h4 class="d-flex justify-content-between">
											<span><?php echo $item[1]?></span>
											<input type="hidden" id="idDestino" name="idDestino"  value="<?php echo $item[0]?>"/> <br>
											<input type="hidden" id="tipoTurismo" name="tipoTurismo"  value="<?php echo $item[3]?>"/> <br>
										</h4>

										<ul class="package-list">

											<input class="genric-btn primary e-large" type="submit"  value="Ver más"/> <br><br>

										</ul>
									</div>
								</div>
							</form>


						</div>

						<?php
						}
						?>


					</div>


				</div>
			</section>
			<!-- End destinations Area -->

<?php
    include_once 'View/footerView.php';
?>
