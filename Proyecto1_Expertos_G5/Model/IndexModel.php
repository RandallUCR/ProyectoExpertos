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

    public function mostrar_destinos_turisticos_by_turismo($tipo, $provincia) {
        $consulta = $this->db->prepare("CALL sp_obtener_destinos_turisticos_by_turismo(".$tipo.", ".$provincia.");");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function mostrar_destinos_categorias($idCategoria) {
        $consulta = $this->db->prepare("CALL sp_obtener_destinos_categorias ('$idCategoria');");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    function euclides($tipoTurista, $precio, $tipoVisitas, $TipoTurismo){
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
            $sumatoria= (pow($datosR['TN_tipo_turista'] - $tipoTurista, 2)) + (pow($datosR['TF_precio'] - $precio , 2)) + (pow($datosR['TN_tipo_visitas'] - $tipoVisitas, 2)) + (pow($datosR['TN_tipo_turismo'] - $TipoTurismo, 2));
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

    //Se divide bayes en dos, en primera instancia mediante bayes se obtiene el tipo de turismo mas recomandado para la persona (Montana, playa o cultural)
    public function bayes($tipoTurista, $tipoPrecio, $provincia){
        //cantidad de características
        $m = 3;

        //contar cantidad de elementos diferentes por característica(turista, precio, provincia)
        $qTipoTurista = 3;
        $qTipoPrecio = 3;
        $qProvincia = 7;

        //probabilidades de los elementos (1/qCaracteristica)
        $probsCarac = array(1/$qTipoTurista, 1/$qTipoPrecio, 1/$qProvincia);

        //cantidad de elementos por clase (1 = Turismo Montaña , 2 = Turismo Playa , 3 = Turismo Cultural)
        $tMontanna = $this->cantidad_tipo_turismo(1);
        $tPlaya = $this->cantidad_tipo_turismo(2);
        $tCultura = $this->cantidad_tipo_turismo(3);
        $qClases = array($tMontanna, $tPlaya, $tCultura);

        //cantidad de elementos totales por clase
        $totalClases = $tMontanna + $tPlaya + $tCultura;

        //probabilidad de elementos por clase (clase/total)
        $pMontanna = $tMontanna/$totalClases;
        $pPlaya = $tPlaya/$totalClases;
        $pCultura = $tCultura/$totalClases;
        $pClases = array($pMontanna, $pPlaya, $pCultura);

        //obtenemos los criterios de los destinos
        $data['criterios_destinos'] = $this->lista_criterios_destinos();

        $matriz = [];
        for($i = 0; $i < 3; $i++){
            for($x = 0; $x < 4; $x++){
                $matriz[$i][$x] = 0;
            }
        }

        //obtenemos las frecuencias
        for($i = 0; $i < 3; $i++){
            foreach ($data['criterios_destinos'] as $item) {
                if($item['TN_tipo_turismo'] == $i+1){
                    if($item['TN_tipo_turista'] == $tipoTurista){
                        $matriz[$i][0]++;
                    }
                    if($item['TF_precio'] == $tipoPrecio){
                        $matriz[$i][1]++;
                    }
                    if($item['TN_provincia'] == $provincia){
                        $matriz[$i][2]++;
                    }
                }
                $matriz[$i][3] = $i+1;
            }
        }

        //obtenemos las probabilidades de las frecuencias
        for($i = 0; $i < 3; $i++){
            for($x = 0; $x < 3; $x++){
                $matriz[$i][$x] = ($matriz[$i][$x] + $m * $probsCarac[$x]) / ($qClases[$i] + $m);
            }
        }

        //obtenemos los productos
        $productos = [0,0,0];
        $classaux = [1,2,3];

        for($i = 0; $i < 3; $i++ ){
            $productos[$i] = $matriz[$i][0] * $matriz[$i][1] * $matriz[$i][2] * $pClases[$i];
        }

        $resultadoUno = $this->ordenar($productos, $classaux);
        //print_r($productos);
        //print_r($resultadoUno);
        return $this->bayesDestinos($tipoTurista, $tipoPrecio, $provincia,$resultadoUno[0]);
    }

    //Srgunda instancia de Bayes, aqui se repite el procedimiento pero esta vez se evaluan los destinos mas recomendados segun los criterios_destinos
    //de la persona y tomando en cuenta el tipo de turismo sacado del paso anterior bayes()
    public function bayesDestinos($tipoTurista, $tipoPrecio, $provincia,$tipo_turismo){
        $principal = $this->mostrar_destinos_turisticos_by_turismo($tipo_turismo, $provincia);
        //echo $tipo_turismo . '|';
        $m = 3;
        //contar cantidad de elementos diferentes por característica(turista, precio, provincia)
        $qTipoTurista = 3;
        $qTipoPrecio = 3;
        $qProvincia = 7;

        $probsCarac = array(1/$qTipoTurista, 1/$qTipoPrecio, 1/$qProvincia);

        $totalClases = count($principal);
        //probabilidad de elementos por clase (clase/total)
        $pClases = 1/$totalClases;

        $matriz = [];
        for($i = 0; $i < $totalClases; $i++){
            for($x = 0; $x < 3; $x++){
                $matriz[$i][$x] = 0;
            }
        }

        for($i = 0; $i < $totalClases; $i++){
            foreach ($principal as $item) {
                if($item[8] == $tipoTurista){
                    $matriz[$i][0]++;
                }
                if($item[9] == $tipoPrecio){
                    $matriz[$i][1]++;
                }
                if($item[10] == $provincia){
                    $matriz[$i][2]++;
                }
            }
        }

        for($i = 0; $i < $totalClases; $i++){
            for($x = 0; $x < 3; $x++){
                $matriz[$i][$x] = ($matriz[$i][$x] + $m * $probsCarac[$x]) / (1 + $m);
            }
        }

        $productos = array();

        for($i = 0; $i < $totalClases; $i++ ){
            $productos[] = $matriz[$i][0] * $matriz[$i][1] * $matriz[$i][2];
        }

        return $this->ordenar($productos, $principal);
    }

    //Metodo burbuja de ordenamiento
    public function ordenar($array1, $array2){
      do{
          $swapped = false;
          for( $i = 0, $c = count( $array1 ) - 1; $i < $c; $i++ ){
              if( $array1[$i] < $array1[$i + 1] ){
                  list( $array1[$i + 1], $array1[$i] ) = array( $array1[$i], $array1[$i + 1] );
                  list( $array2[$i + 1], $array2[$i] ) = array( $array2[$i], $array2[$i + 1] );
                  $swapped = true;
                }
            }
        }
        while( $swapped );
        return $array2;
    }

    public function cantidad_tipo_turismo($tipo) {
        $consulta = $this->db->prepare("CALL sp_obtener_cantidad_tipo_turismo(".$tipo.");");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        foreach ($resultado as $item) {
            return $item[0];
        }
    }

    public function lista_criterios_destinos(){
        $consulta = $this->db->prepare("CALL sp_criterios();");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
}

?>
