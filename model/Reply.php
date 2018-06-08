<?php

    Class Reply{
        private $id;
        private $fk_post;
        private $fk_reply;
    
    function __construct($id, $fk_post, $fk_reply){
        $this ->id           = $id;
        $this ->fk_post      = $fk_post;
        $this ->fk_reply     = $fk_reply;
    }

    public function getId(){
        return $this->id;
    }

    public function getFk_post(){
        return $this->fk_post;
    }

    public function getFk_reply(){
        return $this->fk_reply;
    }
}
?>