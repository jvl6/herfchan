<?php
    require_once("Conexion.php");

    Class Data{
        private $con;

        public function __construct()
        {
            $this->con = new Conexion("bd_herfchan");
        }

        public function crearThread($usuario, $titulo, $comentario, $board, $imagen)
        {
            $nombreUsuario;
            if($usuario == null){
                $nombreUsuario = "Herfino";
            } else {
                $nombreUsuario = $usuario;
            }

            $query = "CALL crearThread ('$nombreUsuario', '$titulo', '$comentario', '$board', '$imagen')";
            $this->con->conectar();
            $this->con->ejecutar($query);
            $this->con->desconectar();
        }

        public function verThread($board)
        {
            $query = "SELECT * FROM thread_alive WHERE Board = '$board' ORDER BY id ASC;";
            $this->con->conectar();
            $rs = $this->con->ejecutar($query);
            $threads = array();

            while($reg = $rs->fetch_array()){
                $threads[] = $reg;
            }

            $this->con->desconectar();
            return $threads;
        }

        public function verPosts($thread)
        {
            $query = "SELECT * FROM viewPosts WHERE Thread = $thread";
            $this->con->conectar();
            $rs = $this->con->ejecutar($query);
            $posts = array();

            while($reg = $rs->fetch_array()){
                $posts[] = $reg;
            }

            $this->con->desconectar();
            return $posts;
        }

        public function crearPost($usuario, $mensaje, $board, $idThread, $imagen)
        {
            $nombreUsuario;
            if($usuario == null){
                $nombreUsuario = "Herfino";
            } else {
                $nombreUsuario = $usuario;
            }

            $query = "CALL crearPost ('$nombreUsuario', '$mensaje', '$board', '$idThread', '$imagen')";
            $this->con->conectar();
            $this->con->ejecutar($query);
            $this->con->desconectar();
        }

        public function verStats($valor){
            $query = "SELECT COUNT(id) FROM $valor";
            $this->con->conectar();
            $rs = $this->con->ejecutar($query);
            $stats = array();

            while($reg = $rs->fetch_array()){
                $stats[] = $reg;
            }

            $this->con->desconectar();
            return $stats;
        }
    }
?>