<?php
    require_once("../model/Data.php");

    $usuario = $_REQUEST["usuario"];
    $titulo = $_REQUEST["titulo"];
    $comentario = $_REQUEST["comentario"];
    $board = $_REQUEST["board"];
    $location = $_REQUEST["location"];
    // $ipaddress = $_SERVER['REMOTE_ADDR']; -> Para después (para ver quién es el op del thread).

    $dat = new Data();

    $dat->crearThread($usuario, $titulo, $comentario, $board);

    sleep(2);

    switch ($board) {
        case "/h/":
            header("location: ../view/h/index.php");
            break;
        case "/o/":
            header("location: ../view/o/index.php");
            break;
    }

?>