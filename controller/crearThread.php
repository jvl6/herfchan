<?php
    require_once("../model/Data.php");

    $size = $_FILES['imagen']['size'];
    $name = $_FILES['imagen']['name'];
    $temp = $_FILES['imagen']['tmp_name'];
    $type = $_FILES['imagen']['type'];

    $prefijo = rand();
    $ruta_destino = "../res/content/".$prefijo."_".$name;
    $copiar = copy($temp, $ruta_destino);

    $usuario = $_REQUEST["usuario"];
    $titulo = $_REQUEST["titulo"];
    $comentario = $_REQUEST["comentario"];
    $board = $_REQUEST["board"];
    $location = $_REQUEST["location"];
    // $ipaddress = $_SERVER['REMOTE_ADDR']; -> Para después (para ver quién es el op del thread).

    $dat = new Data();

    $dat->crearThread($usuario, $titulo, $comentario, $board);

    sleep(2);

    header("location:".$location);

?>