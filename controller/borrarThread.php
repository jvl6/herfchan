<?php
    require_once("../model/Data.php");

    $usuario = $_REQUEST["usuario"];
    $password = $_REQUEST["password"];
    $idThread = $_REQUEST["idThread"];
    $location = $_REQUEST["location"];

    $dat = new Data();

    if(!$dat->checkMod($usuario,$password)){

        // Se supone que da error, pero recarga la web al ser incorrecto.
        header("location:".$location);

    }else{
        $dat->eliminarThread($IdThread);

        sleep(2);

        header("location:".$location);
    }
?>