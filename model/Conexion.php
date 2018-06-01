<?php
class Conexion{
    private $mysql;
    private $bdName;
    private $user;
    private $pass;
    public function __construct($bdName){
        $this->bdName = $bdName;
        $this->user = "root";
        $this->pass = "";
    }
    public function conectar(){
        $this->mysql = new mysqli(
            "localhost",
            $this->user,
            $this->pass,
            $this->bdName
        );
        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }
    public function ejecutar($query){
        return $this->mysql->query($query);
    }
    public function desconectar(){
        $this->mysql->close();
    }
}
?>