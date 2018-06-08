<?php

    Class Thread{
        private $id;
        private $titulo;
        private $fk_board;
        private $fk_user;
    
    function __construct($id, $titulo, $fk_board, $fk_user){
        $this ->id       = $id;
        $this ->nombre   = $nombre;
        $this ->fk_board = $fk_board;
        $this ->fk_user  = $fk_user;
    }

    public function getId(){
        return $this ->id;
    }

    public function getTitulo(){
        return $this ->titulo;
    }

    public function getFk_board(){
        return $this->fk_board;
    }
    
    public function getFk_user(){
        return $this->fk_user;
    }
}
?>