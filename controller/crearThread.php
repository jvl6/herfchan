<?php
    require_once("../model/Data.php");

    $name = $_FILES['imagen']['name'];
    $savename = NULL;
        
    if($name != NULL) {
        $size = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];
        $type = $_FILES['imagen']['type'];
            
        $prefijo = rand();
        $savename = $prefijo."_".$name;
        $ruta_destino = "../res/content/".$savename;
        $copiar = copy($temp, $ruta_destino);
    }

    $usuario = $_REQUEST["usuario"];
    $titulo = $_REQUEST["titulo"];
    $comentario = $_REQUEST["comentario"];
    $board = $_REQUEST["board"];
    $location = $_REQUEST["location"];
    // $ipaddress = $_SERVER['REMOTE_ADDR']; -> Para después (para ver quién es el op del thread).

    $dat = new Data();

    $dat->crearThread($usuario, $titulo, $comentario, $board, $savename);

    sleep(1);

    header("location:".$location);
        
?>