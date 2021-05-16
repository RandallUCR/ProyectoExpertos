<?php

class IndexController {
    public function __construct() {
        $this->view = new View();
    } // constructor
    
     public function mostrar(){    
         $this->view->show("IndexView.php", null);
     } // vista index

     public function destinosRecomendados(){    
        $this->view->show("recomendacionView.php", null);
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