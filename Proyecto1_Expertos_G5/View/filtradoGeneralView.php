
<?php
    include_once 'View/headerView.php';
?>
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Destinos Turisticos				
                    </h1>	
                </div>	
            </div>
        </div>
    </section>
    <section class="destinations-area section-gap">
        <div class="container">
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
                            <img class="img-fluid" width="300px" height="60%" src="<?php echo $item[7]?>"  alt="">
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
