<?php

    Class Post{
        private $id;
        private $mensaje;
        private $fk_thread;
        private $fk_user;
        private $isReply;

    function __construct($id, $mensaje, $fk_thread, $fk_user, $isReply){
        $this ->id          = $id;
        $this ->mensaje     = $mensaje;
        $this ->fk_thread   = $fk_thread;
        $this ->fk_user     = $fk_user;
        $this ->isReply     = $isReply;
    }
 
    public function getId(){
        return $this->id;
    }
 
    public function getMensaje(){
        return $this->mensaje;
    }
 
    public function getFk_thread(){
        return $this->fk_thread;
    }

    public function getFk_user(){
        return $this->fk_user;
    }
 
    public function getIsReply(){
        return $this->isReply;
    }
}
?>