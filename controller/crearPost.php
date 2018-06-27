<?php
    require_once("../model/Data.php");

    $usuario = $_REQUEST["usuario"];
    $mensaje = $_REQUEST["mensaje"];
    $board = $_REQUEST["board"];
    $idThread = $_REQUEST["idThread"];
    $location = $_REQUEST["location"];
    // $ipaddress = $_SERVER['REMOTE_ADDR']; -> Para después (para ver quién es el op del thread).

    $dat = new Data();

    $dat->crearPost($usuario, $mensaje, $board, $idThread);

    sleep(2);

    header("location:".$location);
?>