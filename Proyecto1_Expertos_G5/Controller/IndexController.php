<?php

    session_start();

    if (!isset($_SESSION['destinosRecomendados'])) {
        $_SESSION['destinosRecomendados'] = array();
    }
    if (!isset($_SESSION['idDestinoRecomendado'])) {
        $_SESSION['idDestinoRecomendado'] = 0;
    }

class IndexController {
    public function __construct() {
        $this->view = new View();
    } // constructor
    
     public function mostrar(){    
         $this->view->show("IndexView.php", null);
     } // vista index
     
     public function mostrarFiltradoCategorias(){
        require 'Model/IndexModel.php';
        $principal = new IndexModel();

        //obtengo resultados del formulario
        $data['destinosTuristicos']=$principal->mostrar_destinos_turisticos();
        $this->view->show("filtradoCategoriaView.php", $data); 
     }
     public function destinosCategoria(){
         require 'Model/IndexModel.php';
         $principal = new IndexModel();

         //obtener los datos del form de criterios de busqueda
        $idCategoria = $_POST['tipoCategoria'];

        //obtener destinos segun su categoria
        $data['destinosTuristicos']=$principal->mostrar_destinos_categorias($idCategoria);
        $this->view->show("filtradoCategoriaView.php", $data); 
     }

     public function mostrarFiltrado(){    
        
        require 'Model/IndexModel.php';
        $principal = new IndexModel();

        //obtengo resultados del formulario
        $data['destinosTuristicos']=$principal->mostrar_destinos_turisticos();
        $this->view->show("filtradoGeneralView.php", $data);
    } // vista index

    public function mostrarFiltradoDestinos(){
        $this->view->show("listaCriteriosDestinosView.php", null);
    }
    
    public function destinosRecomendados(){   
         
        require 'Model/IndexModel.php';
        $principal = new IndexModel();

       //obtener los datos del form de criterios de busqueda
        $tipoTurista = $_POST['tipoTuristaCB'];
        $precio = $_POST['precioCB'];
        $tipoVisitas = $_POST['tipoVisitasCB'];
        $TipoTurismo = $_POST['tipoTurismoCB'];

        // en esta variable se va a guardar las 5 recomendaciones obtenidas a travez del algoritmo de euclides

        $data['recomendaciones'] =  $principal->euclides($tipoTurista, $precio, $tipoVisitas, $TipoTurismo);
        

        
        $data['DestinosR'] = $principal->destinos_recomendados($data['recomendaciones'][0], $data['recomendaciones'][1], $data['recomendaciones'][2], $data['recomendaciones'][3], $data['recomendaciones'][4]);
        $_SESSION['destinosRecomendados'] = $data['DestinosR'];
        $this->view->show("recomendacionView.php", $data);
    } // vista index

    public function detallesDestino(){
        require 'Model/IndexModel.php';
        $principal = new IndexModel();

        //obtengo resultados del formulario
        //$TN_id_DT = $_POST['TN_id_DT'];
        
        $TN_id_DT = $_POST['idDestino'];
        $tipoTurismo = $_POST['tipoTurismo'];
        $_SESSION['idDestinoRecomendado']= $TN_id_DT;

        //obtengo array de BD con los atributos que se necesitan
        $data['detalles'] = $principal->mostrar_detalles_destino_turistico($TN_id_DT);
        $data['Galeria_D'] = $principal->mostrar_imagenes_destino_turistico($TN_id_DT);

        $data['Nombre_D'] = $data['detalles'][0][1];
        $data['Descripcion_D'] = $data['detalles'][0][2];
        $data['Ubicacion_D'] = $data['detalles'][0][3];
        $data['LinkU_D'] = $data['detalles'][0][4];
        $data['LinkV_D'] = $data['detalles'][0][5];
        $data['Precio_D'] = $data['detalles'][0][6];
        $data['tipo_estadia'] = $data['detalles'][0][7];

        if($tipoTurismo == 1){//Si es de montaña
            $this->view->show("detallesDestinoMontanaView.php", $data);
        }else if ($tipoTurismo == 2){//Si es de playa
            $this->view->show("detallesDestinoPlayaView.php", $data);
        }else if($tipoTurismo == 3){//Si es cultural
            $this->view->show("detallesDestinoCulturalView.php", $data);
        }
    } // vista index

    public function mostrarDetalleTuristico(){
        require 'Model/IndexModel.php';
        $principal = new IndexModel();
        
        $TN_id_DT = $_POST['idDestino'];
        //obtengo array de BD con los atributos que se necesitan
        $data['detalles'] = $principal->mostrar_detalles_destino_turistico($TN_id_DT);
        $data['Galeria_D'] = $principal->mostrar_imagenes_destino_turistico($TN_id_DT);

        $data['Nombre_D'] = $data['detalles'][0][1];
        $data['Descripcion_D'] = $data['detalles'][0][2];
        $data['Ubicacion_D'] = $data['detalles'][0][3];
        $data['LinkU_D'] = $data['detalles'][0][4];
        $data['LinkV_D'] = $data['detalles'][0][5];
        $data['Precio_D'] = $data['detalles'][0][6];
        $data['tipo_estadia'] = $data['detalles'][0][7];

        
        $this->view->show("detallesDestinoTuristicoView.php", $data);
        
    }
    

    public function mostrarCreditos(){
        $this->view->show("creditosView.php", null);
    }

    
} // fin clase
?>
