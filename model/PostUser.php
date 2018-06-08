<?php

    Class PostUser{
        private $id;
        private $nombre;
    
    function __construct($id, $nombre){
        $this ->id       = $id;
        $this ->nombre   = $nombre;
    }

    public function getId(){
        return $this ->id;
    }

    public function getNombre(){
        return $this ->nombre;
    }
}
?>