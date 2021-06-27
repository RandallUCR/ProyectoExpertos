<?php
    include_once 'View/headerView.php';
?>
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Destinos Turísticos
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="destinations-area section-gap">
        <div class="container">
            <!--Filtro con combo box-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                    <form class="form-wrap" action="?controlador=Index&accion=destinosFiltrado" method="post">
                        <h4>Seleccione las opciones</h4>&nbsp;&nbsp;
                        <div class="row">
                            <div class="col-4">
                                <h4>Tipo de Turista</h4>&nbsp;&nbsp;
                                <select id="tipoTurista" class="form-control" name="tipoTurista" style="width:200px;" required>
                                    <option value="1">Niños</option>
                                    <option value="2">Adultos</option>
                                    <option value="3">Todo público</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h4>Precio</h4>&nbsp;&nbsp;
                                <select id="tipoPrecio" class="form-control" name="tipoPrecio" style="width:200px;" required>
                                    <option value="1">Económico</option>
                                    <option value="2">Regular</option>
                                    <option value="3">Premium</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <h4>Provincia</h4>&nbsp;&nbsp;
                                <select id="provincia" class="form-control" name="provincia" style="width:200px;" required>
                                    <option value="1">San José</option>
                                    <option value="2">Cartago</option>
                                    <option value="3">Heredia</option>
                                    <option value="4">Guanacaste</option>
                                    <option value="5">Limón</option>
                                    <option value="6">Puntarenas</option>
                                    <option value="7">Alajuela</option>
                                </select>
                            </div>
                        </div><br>
                        <input class="btn btn-success" type="submit"  value="Buscar" type="button"/> <br><br>						
                    </form>
                </div> 
            </div>

            <!--Lista de destinos-->
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Características</th>
                        <th>Ubicación</th>
                        <th>Precio</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vars['destinosTuristicos'] as $item)
			    		{
                    ?>
                        <tr>
                            <form action="?controlador=Index&accion=mostrarDetalleTuristico" method="post">
                            <td>
                                <p><?php echo $item[1]?></p>
                                <img class="img-fluid" width="300px" height="auto" style="max-height:200px" src="<?php echo $item[7]?>"  alt="">
                            </td>
                            <td>
                                <p>➤ <?php echo $item[2]?></p>
                                <p>➤ <?php echo $item[3]?></p>
                                <p>➤ <?php echo $item[4]?></p>
                            </td>
                            <td>
                                <p><?php echo $item[5]?></p>
                            </td>
                            <td>
                                <p>₡<?php echo $item[6]?></p>
                            </td>
                            <td>
                                <input type="hidden" id="idDestino" name="idDestino"  value="<?php echo $item[0]?>"/> <br>
                                <input class="genric-btn primary e-large" type="submit"  value="Ver más"/> <br><br>
                            </td>
                            </form>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

<?php
    include_once 'View/footerView.php';
?>
