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

            $query = "CALL crearThread ('$nombreUsuario', '$titulo', '$comentario', '$board')";
            $this->con->conectar();
            $this->con->ejecutar($query);
            $this->con->desconectar();
        }

        public function verThread($board)
        {
            $query = "SELECT * FROM thread_alive WHERE Board = '$board';";
            $this->con->conectar();
            $rs = $this->con->ejecutar($query);
            $threads = array();

            while($reg = $rs->fetch_array()){
                $threads[] = $reg;
            }

            $this->con->desconectar();
            return $threads;
        }
    }
?>