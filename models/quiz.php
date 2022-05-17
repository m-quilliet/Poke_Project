<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class Quiz {
    private int $id=0;
    private string $name;
    private int $active=1;
    private int $id_categories=1;
    private int $id_users;

    private object $_pdo;



    public function __construct(int $id=0, string $name){
        $this->setId($id);
        $this->setName($name);
    
        $this->_pdo = Database::getInstance();
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

    // // METHODE DE CRÉATION ET MODIFICATION
        public function sav(){

            // si quiz existe en base on le modifie
        if($this->id != 0) {
            $sql = 'UPDATE `quiz` SET `id` = :id, `name` = :name, `active`, `id_categories` = :id_categories, `id_users`= :id_users
            WHERE `id` = :id';   
        }

        // si il n'existe pas on l'insert en base
        else { 
        // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `quiz` (`id`, `name`, `active`, `id_categories`,`id_users`) 
                VALUES (:name, :active, :id_categories,  :id_users);';
        }
        // On prépare la requête
        $sth = Database::getInstance()->prepare($sql);

        //Affectation des valeurs aux marqueurs nominatifs
        $sth->bindValue(':name', $this->getName(), PDO::PARAM_STR);
        $sth->bindValue(':active', $this->getActive(), PDO::PARAM_BOOL);
        $sth->bindValue(':Id_categories', $this->getIdCategories(), PDO::PARAM_INT);
        $sth->bindValue(':Id_users', $this->getIdUsers(), PDO::PARAM_INT);

        // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire

        return $sth->execute();
    }

    public function save(): bool{

        try{
            $sql = 'INSERT INTO `quiz` (`name`,`active`,`id_categories`,`id_users`) 
                    VALUES (:name,1, :id_categories, :id_users)';
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':name',$this->getName(),PDO::PARAM_STR);
            $sth->bindValue(':id_categories', $this->getIdCategories(), PDO::PARAM_INT);
            $sth->bindValue(':id_users', $this->getIdUsers(), PDO::PARAM_INT);
            return $sth->execute();

        }
        catch(PDOException $e){
            echo $e->getMessage();
            // On retourne false si une exception est levée
            return false;
        }

    }

    public static function getAll(): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM `quiz`';

            // On exécute la requête
            $sth = $pdo->query($sql);

            if ($sth === false) {
                throw new PDOException();
            } else {
                //dis tt récupérer sous forme de classe user// recupérer avec les classes et en premier la classe user
                return $sth->fetchAll(); //revoit un mapping ds ma classe users
            }
        } catch (PDOException $e) {
            return [];
        }
    }

}






