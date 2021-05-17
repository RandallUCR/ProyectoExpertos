<?php

    session_start();


    if (!isset($_SESSION['destinosRecomendados'])) {
        $_SESSION['destinosRecomendados'] = array();
    }

class IndexController {
    public function __construct() {
        $this->view = new View();
    } // constructor
    
     public function mostrar(){    
         $this->view->show("IndexView.php", null);
     } // vista index

     public function destinosRecomendados(){   
         
        require 'Model/IndexModel.php';
        $principal = new IndexModel();

       //obtener los datos del form de criterios de busqueda
        $provincia = $_POST['provinciaCB'];
        $precio = $_POST['precioCB'];
        $tipoVisitas = $_POST['tipoVisitasCB'];
        $TipoTurismo = $_POST['tipoTurismoCB'];

        // en esta variable se va a guardar las 5 recomendaciones obtenidas a travez del algoritmo de euclides

        $_SESSION['recomendaciones'] =  $principal->euclides($provincia, $precio, $tipoVisitas, $TipoTurismo);
        


        $data['DestinosR'] = $principal->destinos_recomendados($_SESSION['recomendaciones'][0], $_SESSION['recomendaciones'][1], $_SESSION['recomendaciones'][2], $_SESSION['recomendaciones'][3], $_SESSION['recomendaciones'][4]);


        $this->view->show("recomendacionView.php", $data);
    } // vista index

    public function detallesDestino(){
        require 'Model/IndexModel.php';
        $principal = new IndexModel();

        //obtengo resultados del formulario
        //$TN_id_DT = $_POST['TN_id_DT'];

        $TN_id_DT='1';
        //obtengo array de BD con los atributos que se necesitan
        $data['detalles'] = $principal->mostrar_detalles_destino_turistico($TN_id_DT);
        $data['Galeria_D'] = $principal->mostrar_imagenes_destino_turistico($TN_id_DT);

        $data['Nombre_D'] = $data['detalles'][0][1];
        $data['Descripcion_D'] = $data['detalles'][0][2];
        $data['Ubicacion_D'] = $data['detalles'][0][3];
        $data['LinkU_D'] = $data['detalles'][0][4];
        $data['LinkV_D'] = $data['detalles'][0][5];
        $data['Precio_D'] = $data['detalles'][0][6];

        


        $this->view->show("detallesDestinoView.php", $data);
    } // vista index

    
} // fin clase