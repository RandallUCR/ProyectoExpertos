<?php
    require 'Libs/Config.php';
    $config= Config::singleton();
    $config->set('ControllerFolder','Controller/');
    $config->set('ModelFolder', 'Model/');
    $config->set('ViewFolder', 'View/');
    
    $config->set('dbhost', '163.178.107.10'); // ip
    $config->set('dbname', 'Proyecto_1_Exepertos_G5');
    $config->set('dbuser', 'laboratorios');
    $config->set('dbpass', 'KmZpo.2796');
    
?>

