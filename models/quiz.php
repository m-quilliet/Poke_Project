<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class Quiz {
    private int $id=0;
    private string $name='';
    private int $active=1;
    private int $id_categories=1;
    private int $id_users=30;

    private object $_pdo;



    public function __construct(){

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
    public function save(){

            // si quiz existe en base on le modifie
        if($this->id != 0) {
            $sql = 'UPDATE `quiz` 
            SET `id` = :id,
            `name` = :name,
            `id_categories` = :id_categories,
            `id_users`= :id_users
            WHERE `id` = :id';   
        }

        // si il n'existe pas on l'insert en base
        else { 
        // On créé la requête avec des marqueurs nominatif

            
            $sql = 'INSERT INTO `quiz` (`name`,`active`,`id_categories`,`id_users`) 
                VALUES (:name,1, :id_categories, :id_users)';
        
        }
        $sth = $this->_pdo->prepare($sql);
        $sth->bindValue(':name',$this->getName(),PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->getIdCategories(), PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->getIdUsers(), PDO::PARAM_INT);

        if ($this->id != 0) {
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        }

        $result= $sth->execute();
        if($result && $this->id == 0){
            return $this->_pdo->lastInsertId();
        }
        return $result;
    }
    // public function save(): bool{

    //     try{
    //         $sql = 'INSERT INTO `quiz` (`name`,`active`,`id_categories`,`id_users`) 
    //                 VALUES (:name,1, :id_categories, :id_users)';
    //         $sth = $this->_pdo->prepare($sql);
    //         $sth->bindValue(':name',$this->getName(),PDO::PARAM_STR);
    //         $sth->bindValue(':id_categories', $this->getIdCategories(), PDO::PARAM_INT);
    //         $sth->bindValue(':id_users', $this->getIdUsers(), PDO::PARAM_INT);
    //         return $sth->execute();

    //     }
    //     catch(PDOException $e){
    //         echo $e->getMessage();
    //         // On retourne false si une exception est levée
    //         return false;
    //     }


    public static function get(int $id): Quiz
    {
        $sql = 'SELECT * FROM `quiz` WHERE `id` = :id';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        //recupére donnée en base de données et ensuite hydrate le model quiz
        $quiz = $sth->fetchObject('\Quiz');
        if (!$quiz) {
            throw new PDOException('Utilisateur non-trouvé');
        } else {
            return $quiz;
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
                return $sth->fetchAll(); 
            }
        } catch (PDOException $e) {
            return [];
        }
    }
       //METHODE DELETE
        public static function delete(int $id): bool
        {
            $sql = "DELETE 
                FROM `quiz`
                WHERE `id`=:id;";
    
            try {
                $sth = Database::getInstance()->prepare($sql);
                $sth->bindValue(':id', $id, PDO::PARAM_INT);
                return $sth->execute();
            } catch (PDOException $e) {
                return false;
            }
        }

}






