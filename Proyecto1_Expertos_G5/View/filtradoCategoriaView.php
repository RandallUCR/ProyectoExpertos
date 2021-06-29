
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
        <div>
            
        </div>
        <div class="container">
            <div class="tab-content" id="myTabContent" >
                    <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                    <form class="form-wrap" action="?controlador=Index&accion=destinosCategoria" method="post">

                    <div class="row">
                    <h4>Selecciona la categoria</h4>&nbsp;&nbsp;&nbsp;&nbsp;

                        <select id="tipoCategoria" class="form-control" name="tipoCategoria" style="width:200px;" required>

                            
                            <option value="1">Museos</option>
                            <option value="2">Hoteles</option>
                            <option value="3">Senderos</option>
                            <option value="4">Parques Nacionales</option>

                        </select>

                    </div><br>
                            <input class="btn btn-success" type="submit"  value="Buscar" type="button"/> <br><br>						
                    </form>
                    </div>
                    
                </div>
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
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
                            <input class="genric-btn success e-large" type="submit"  value="Ver más"/> <br><br>
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
