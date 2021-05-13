<?php

    class FrontController{
        
        static function main(){
            require 'Libs/View.php';
            require 'Libs/configuration.php';
            
            if(!empty($_GET['controlador']))
                $controllerName=$_GET['controlador'].'Controller';
            else 
                //$controllerName='ProductoController';
                $controllerName='IndexController';
            
            if(!empty($_GET['accion']))
                $nombreAccion=$_GET['accion'];
            else 
                 $nombreAccion='mostrar';
            
            $rutaControlador=$config->get('ControllerFolder').$controllerName.'.php';
            
            if(is_file($rutaControlador))
                require $rutaControlador;
            else 
                die ('Controlador no encontrado - 404 not found');
            
            if(is_callable(array($controllerName, $nombreAccion))==FALSE){
                trigger_error($controllerName.'->'.$nombreAccion.' no existe', E_USER_NOTICE);
                return FALSE;
            }
            $controller=new $controllerName();
            $controller->$nombreAccion();
        } // main
        
        
    }
    
?>