<?php
    require_once("../model/Data.php");

    $usuario = $_REQUEST["usuario"];
    $titulo = $_REQUEST["titulo"];
    $comentario = $_REQUEST["comentario"];
    $board = $_REQUEST["board"];
    $location = $_REQUEST["location"];
    // $ipaddress = $_SERVER['REMOTE_ADDR']; -> Para después (para ver quién es el op del thread).

    $dat = new Data();

    session_start();

    $dat->crearPost($usuario, $titulo, $comentario, $board);
?>