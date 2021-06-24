<?php
    include_once 'View/headerView.php';
?>
			
			<!-- start banner Area -->
			<section class="banner-area relative" >
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-5 col-md-6 banner-left">
							<h2 class="text-white">En este sitio te ofrecemos distintas recomendaciones de destinos turísticos según tus criterios</h2>
						</div>
						<div class="col-lg-5 col-md-6 banner-right" style="margin-top: 105px" >
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Criterios de Busqueda</a>
							  </li>
							  
							</ul>
							<div class="tab-content" id="myTabContent" >
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" action="?controlador=Index&accion=destinosRecomendados" method="post">

								<div class="row">
								<h4>Tipo Turista</h4>&nbsp;&nbsp;&nbsp;&nbsp;

                                    <select id="tipoTuristaCB" class="form-control" name="tipoTuristaCB" style="width:200px;" required>

                                        <option value="1">Niños</option>
                                        <option value="2">Adultos</option>
                                        <option value="3">Todo Público</option>

                                    </select>

								</div><br>
								<div class="row">
								<h4>Precio</h4>&nbsp;&nbsp;&nbsp;&nbsp;

                                    <select id="precioCB" class="form-control" name="precioCB" style="width:200px;" required>

                                        <option value="1">Económico</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Premium</option>

                                    </select>

								</div><br>

								<div class="row">

								<h4>Tipo de Visitas</h4>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select id="tipoVisitasCB" class="form-control" name="tipoVisitasCB" style="width:200px;" required>

                                        <option value="1">Visitas rápidas</option>
                                        <option value="2">Estadías Largas</option>

                                    </select>

								</div><br>

								<div class="row">
								<h4>Tipo Turismo</h4>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select id="tipoTurismoCB" class="form-control" name="tipoTurismoCB" style="width:200px;" required>

                                        <option value="1">Turismo Montaña</option>
                                        <option value="2">Turismo Playa</option>
										<option value="3">Turismo Cultural</option>

                                    </select>

								</div><br>
					
										<input class="btn btn-success" type="submit"  value="Buscar" type="button"/> <br><br>						
								</form>
							  </div>
							 
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->


<?php
    include_once 'View/footerView.php';
?>


