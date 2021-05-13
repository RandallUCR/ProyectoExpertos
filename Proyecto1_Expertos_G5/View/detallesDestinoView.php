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
                                    <?php echo $vars['Nombre_D'] ?>
							</h1>	
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start about-info Area -->
			<section class="about-info-area section-gap">
				<div class="container">
					<div class="row align-items-center">

                        <div class="col-lg-6 info-left">
							<h1>Destino</h1><br>
							<p style="font-size: 20px; text-align:justify">
                                <?php echo $vars['Descripcion_D'] ?>
							</p>

                            <h3>Precio: <?php echo $vars['Precio_D']?></h3><br>
                           
						</div>


                        <div class="col-lg-6 active-hot-deal-carusel info-rigth">
                    

                           <?php foreach($vars['Galeria_D'] as $item)
                                {
                            ?>
                                <div class="single-carusel">
                                    <div class="thumb relative">
                                        <div class="overlay overlay-bg"></div>
        
                                        <img class="img-fluid" width="50" height="50" src="<?php echo $item[0]?>"  alt="">
                                    </div>
                                            
                                </div>

                            <?php
                                }
                            ?>
                        </div>

						
					</div><br><br>


                    <div class="row align-items-center">

                        <div class="col-lg-6 info-left">

                        <iframe width="500" height="300" src="<?php echo $vars['LinkV_D']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							
                            

						</div>


                        <div class="col-lg-6 info-rigth">
                    
                            <h1>Ubicación</h1><br>
                            <div data-aos="fade-up" class="aos-init aos-animate">
                                <iframe src="<?php echo $vars['LinkU_D']?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
                            </div>

                        </div>

						
					</div>



				</div>	
			</section>
			<!-- End about-info Area -->




			<!-- Start other-issue Area -->
			<section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Otros destinos recomendados</h1>
		                    </div>
		                </div>
		            </div>					
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o1.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Rent a Car</h4>
								</a>
								<p>
									The preservation of human life is the ultimate value, a pillar of ethics and the foundation.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o2.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Cruise Booking</h4>
								</a>
								<p>
									I was always somebody who felt quite sorry for myself, what I had not got compared.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o3.jpg" alt="">					
								</div>
								<a href="#">
									<h4>To Do List</h4>
								</a>
								<p>
									The following article covers a topic that has recently moved to center stage–at least it seems.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o4.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Food Features</h4>
								</a>
								<p>
									There are many kinds of narratives and organizing principles. Science is driven by evidence.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End other-issue Area -->
			

<?php
    include_once 'View/footerView.php';
?>