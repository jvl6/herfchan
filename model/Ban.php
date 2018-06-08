<?php

    Class Ban{
        private $ip;
        private $reason;
        private $fk_moderador;
    
    function __construct($ip, $reason, $fk_moderador){
        $this ->ip           = $ip;
        $this ->reason       = $reason;
        $this ->fk_moderador = $fk_moderador;
    }

    public function getIp(){
        return $this ->id;
    }

    public function getReason(){
        return $this ->nombre;
    }

    public function getFk_moderador(){
        return $this->Fk_moderador;
    }
    
}
?>