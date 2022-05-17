<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class Categories {
    private int $id=1;
    private string $type="Qui suis-je?";


    public function __construct(){
    }


    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id ;
    }
    public function setType(string $type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type ;
    }
}