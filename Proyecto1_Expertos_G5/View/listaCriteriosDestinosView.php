<?php
    include_once 'View/headerView.php';
?>
			
<!-- start banner Area -->
<section class="banner-area relative" >
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-between">
			<div class="col-lg-5 col-md-6 banner-left">
				<h1 class="text-white">Lista de Destinos Recomendados</h1>
			</div>
			<div class="col-lg-5 col-md-6 banner-right" style="margin-top: 105px" >
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Criterios de Búsqueda</a>
					</li>	  
				</ul>
				<div class="tab-content" id="myTabContent" >
					<div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
						<form class="form-wrap" action="?controlador=Index&accion=mostrarFiltrado" method="post">
							<div class="row">
								<h4>Provincia</h4>&nbsp;&nbsp;&nbsp;&nbsp;
								<select id="provinciaCB" class="form-control" name="provinciaCB" style="width:200px;" required>
									<option value="1">San José</option>
                                    <option value="2">Cartago</option>
                                    <option value="3">Heredia</option>
									<option value="4">Guanacaste</option>
                                    <option value="5">Limón</option>
                                    <option value="6">Puntarenas</option>
									<option value="7">Alajuela</option>
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
								<h4>Tipo Turista</h4>&nbsp;&nbsp;&nbsp;&nbsp;
                                <select id="tipoTuristaCB" class="form-control" name="tipoTurismoCB" style="width:200px;" required>
                                    <option value="1">Niños</option>
                                    <option value="2">Adultos</option>
									<option value="3">Todo público</option>
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


