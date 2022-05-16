<?php
require_once(dirname(__FILE__) . '/../utils/database.php');


class Quiz {
    private int $id;
    private string $name='';
    private int $active='';
    private int $id_categories;
    private int $id_users;



    public function __construct(){
    }


    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id ;
    }


    public function setName(string $name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name ;
    }


    public function setactive(int $active){
        $this->active = $active;
    }

    public function getActive(){
        return $this->active ;
    }


    public function setIdCategories(int $id_categories){  
        $this->id_categories = $id_categories;
    }

    public function getIdCategories(){ 
        return $this->id_categories ;
    } 
    public function setIdUsers(int $id_users){  
        $this->id_users = $id_users;
    }

    public function getIdUsers(){ 
        return $this->id_users ;
    } 

    // METHODE DE CRÉATION ET MODIFICATION
    public function save(){

        // si quiz existe en base on le modifie
        if($this->id != 0) {
            $sql = 'UPDATE `quiz` SET `id` = :id, `name` = :name, `active`, `id_categories` = :id_categories, `id_users`= :id_users
            WHERE `id` = :id';   
        }

        // si il n'existe pas on l'insert en base
        else { 
         // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `users` (`login`, `mail`, `password`, `id_rights`) 
                VALUES (:login, :mail, :password,  :id_rights);';
        }
        // On prépare la requête
        $sth = Database::getInstance()->prepare($sql);

        //Affectation des valeurs aux marqueurs nominatifs
        $sth->bindValue(':login', $this->getLogin(), PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
        // $sth->bindValue(':id_rights', 2013, PDO::PARAM_INT);

        if($this->id != 0) {
            $sth->bindValue(':validated_at', $this->getValidatedAt());
            $sth->bindValue(':id',$this->id, PDO::PARAM_INT);
        } else{
            $sth->bindValue(':id_users',$this->getIdUsers(),PDO::PARAM_INT);
        }
        // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire

        return $sth->execute();


}