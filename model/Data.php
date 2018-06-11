<?php
    require_once("Conexion.php");

    Class Data{
        private $con;

        public function __construct()
        {
            $this->con = new Conexion("bd_herfchan");
        }

        public function crearPost($usuario, $titulo, $comentario, $board)
        {
            $nombreUsuario;
            if($usuario == null){
                $nombreUsuario = "Herfino";
            } else {
                $nombreUsuario = $usuario;
            }

            $query = "CALL crearThread ('$nombreUsuario', '$titulo', '$comentario', '$board')";
            $this->con->conectar();
            $this->con->ejecutar($query);
            $this->con->desconectar();
        }

        public function FunctionName(Type $var = null)
        {
            # code...
        }
    }
?>