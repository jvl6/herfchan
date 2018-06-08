<?php

    Class Moderador{
        private $id;
        private $usuario;
        private $fk_board;
    
    function __construct($id, $usuario, $fk_board){
        $this ->id       = $id;
        $this ->usuario  = $usuario;
        $this ->fk_board = $fk_board;
    }

    public function getId(){
        return $this ->id;
    }

    public function getUsuario(){
        return $this ->usuario;
    }

    public function getFk_board(){
        return $this->fk_board;
    }
    
}
?>