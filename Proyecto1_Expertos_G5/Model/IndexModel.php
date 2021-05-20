<?php

class IndexModel {

    protected $db;

    public function __construct() {
        require 'Libs/SPDO.php';
        $this->db = SPDO::singleton();
    }


    public function mostrar_detalles_destino_turistico($TN_id_DT) {
        $consulta = $this->db->prepare("Call sp_obtener_destino_turistico('$TN_id_DT');");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function mostrar_imagenes_destino_turistico($TN_id_DT) {
        $consulta = $this->db->prepare("Call sp_obtener_ruta_imagen_destino('$TN_id_DT');");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function destinos_recomendados($R1,$R2, $R3, $R4, $R5 ) {
        $consulta = $this->db->prepare("Call sp_destinos_recomendados('$R1', '$R2', '$R3', '$R4', '$R5');");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function mostrar_destinos_turisticos() {
        $consulta = $this->db->prepare("CALL sp_obtener_destinos_turisticos ();");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    
    
    function euclides($provincia, $precio, $tipoVisitas, $TipoTurismo)
    {


       // se realizan 5 variables con una distacia alta y se van a actualizar con las distancias calculadas
       $resultado1 = 10000;
       $resultado2 = 10000;
       $resultado3 = 10000;
       $resultado4 = 10000;
       $resultado5 = 10000;

        // se realizan 5 variables para asignar los 5 destinos encontrados
       $destino1 = 0;
       $destino2 = 0;
       $destino3 = 0;
       $destino4 = 0;
       $destino5 = 0;

       $data['destinos'] = $this->lista_destinos();

       foreach ($data['destinos'] as $datosR) {

            $sumatoria = 0;

             //***************Algoritmo de Euclides******************
            $sumatoria= (pow($datosR['TN_provincia'] - $provincia, 2)) + (pow($datosR['TF_precio'] - $precio , 2)) + (pow($datosR['TN_tipo_visitas'] - $tipoVisitas, 2)) + (pow($datosR['TN_tipo_turismo'] - $TipoTurismo, 2)); 
            $distanciaAux=sqrt($sumatoria);
            //*******************************************************
            //if para comparar cual registro contiene una distancia menor de acuerdo a los datos ingresados y se ordena de mas a menos parecidas

            if ($distanciaAux < $resultado1) {
                $resultado5 = $resultado4;
                $resultado4 = $resultado3;
                $resultado3 = $resultado2;
                $resultado2 = $resultado1;
                $resultado1 = $distanciaAux;

                $destino5 = $destino4;
                $destino4 = $destino3;
                $destino3 = $destino2;
                $destino2 = $destino1;
                $destino1 = $datosR['TN_id_DT'];
                


            } else if ($distanciaAux < $resultado2) {
                $resultado5 = $resultado4;
                $resultado4 = $resultado3;
                $resultado3 = $resultado2;
                $resultado2 = $distanciaAux;

                $destino5 = $destino4;
                $destino4 = $destino3;
                $destino3 = $destino2;
                $destino2 = $datosR['TN_id_DT'];
               
                


            } else if ($distanciaAux < $resultado3) {
                $resultado5 = $resultado4;
                $resultado4 = $resultado3;
                $resultado3 = $distanciaAux;

                $destino5 = $destino4;
                $destino4 = $destino3;
                $destino3 = $datosR['TN_id_DT'];

                

            } else if ($distanciaAux < $resultado4) {
                $resultado5 = $resultado4;
                $resultado4 = $distanciaAux;

                $destino5 = $destino4;
                $destino4 = $datosR['TN_id_DT'];
                

            } else if ($distanciaAux < $resultado5) {
                $resultado5 = $distanciaAux;

                $destino5 = $datosR['TN_id_DT'];
            }

       }

       $rutasFiltradas = array(); //Array para cargar las 5 rutas mas parecidas a lo que el usuario ingresó

       $rutasFiltradas[0] = $destino1;
       $rutasFiltradas[1] = $destino2;
       $rutasFiltradas[2] = $destino3;
       $rutasFiltradas[3] = $destino4;
       $rutasFiltradas[4] = $destino5;

       return $rutasFiltradas;
    }

    public function lista_destinos() {
        $consulta = $this->db->prepare("CALL sp_lista_destinos;");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }


}

?>