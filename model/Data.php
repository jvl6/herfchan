<?php
    require_once("Conexion.php");

    Class Data{
        private $con;

        public function __construct()
        {
            $this->con = new Conexion("bd_herfchan");
        }

        public function crearThread($usuario, $titulo, $comentario, $board)
        {
            $nombreUsuario;
            if($usuario == null){
                $nombreUsuario = "Herfino";
            } else {
                $nombreUsuario = $usuario;
            }

            $query = "CALL crearThread ('$titulo', '$comentario', '$board', '$nombreUsuario')";
            $this->con->conectar();
            $this->con->ejecutar($query);
            $this->con->desconectar();
        }
    }
?>