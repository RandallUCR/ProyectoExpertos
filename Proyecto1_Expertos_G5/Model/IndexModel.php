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
    


    public function lista_info_profesor() {
        $consulta = $this->db->prepare("Call sp_lista_info_profesor();");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function lista_info_aprendizaje() {
        $consulta = $this->db->prepare("Call sp_lista_info_aprendizaje();");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }




}

?>