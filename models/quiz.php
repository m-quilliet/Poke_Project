<?php
require_once(dirname(__FILE__) . '/../utils/database.php');


class Quiz{

    private int $_id;
    private string $_name;
    private bool $_active;
    private int $_id_categories;
    private int $_id_users;
    private object $_pdo;


    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setActive(bool $active): void
    {
        $this->_active = $active;
    }

    public function getActive(): bool
    {
        return $this->_active
    }

    public function setId_categories(bool $id_categories): void
    {
        $this->_id_categories = $id_categories;
    }
    public function getId_users(): int
    {
        return $this->_id_users;
    }

    public function getId_Users(): int
    {
        return $this->_id_users;
    }

    /**
     * Méthode magique qui permet d'hydrater notre objet 'patient'
     * 
     * @return boolean
     */
    public function __construct(string $_name,bool $_active,int $_id_categories,int $_id_users){

        // Hydratation de l'objet contenant la connexion à la BDD
        $this->setName($name);
        $this->setActive($active);
        $this->setId_categories($id_categories);
        $this->setId_users($id_users);
        $this->_pdo = Database::getInstance();
    }


    /**
     * Méthode permettant de récupérer un quiz
     * @param int $id
     * 
     * @return object
     */
    public static function get(int $id): object
    {

        try {

            $sql = 'SELECT * FROM `quiz`
                    INNER JOIN `users` ON `users`.`id` = `quiz`.`id_users`
                    WHERE `quiz`.`id` = :id;';

            $sth = Database::getInstance()->prepare($sql);

            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $sth->execute();
            if ($result === false) {
                //Erreur générale
                throw new PDOException(ERRORS[8]);
            } else {
                $quiz = $sth->fetch();
                if ($quiz === false) {
                    //Rdv non trouvé
                    throw new PDOException(ERRORS[9]);
                } else {
                    return $quiz;
                }
            }
        } catch (PDOException $e) {
            return $e;
        }
    }


    /**
     * Méthode qui permet de créer un quiz
     * 
     * @return boolean
     */
    public function add(): bool{

        try{
            $sql = 'INSERT INTO `quiz` (`name`,`id_categories`,`id_users`) 
                    VALUES (:name,:active,:id_categories;:id_users)';
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':name',$this->getName(),PDO::PARAM_STR);
            $sth->bindValue(':active',$this->getActive(),PDO::PARAM_BOOL);
            $sth->bindValue(':id_categories',$this->getId_categories(),PDO::PARAM_INT);
            $sth->bindValue(':id_users',$this->getId_users(),PDO::PARAM_INT);
            return $sth->execute();
        }
        catch(PDOException $e){
            // On retourne false si une exception est levée
            return false;
        }

    }

    /**
     * Méthode qui permet de lister tous les rdv et leur patient
     * 
     * @return array
     */
    public static function getAll($id=NULL): array{

        $pdo = Database::getInstance();

        try{
            $sql = '    SELECT `quiz`.`id` as `appointmentId`, `users`.`id` as `patientId`, `users`.*, `quiz`.* 
                        FROM `quiz` 
                        INNER JOIN `users`
                        ON `quiz`.`idusers` = `users`.`id`';

            if(!is_null($id)){
                $sql .= ' WHERE `quiz`.`idusers` = :id';
            }

            $sql .= ' ORDER BY `quiz`.`dateHour` DESC';

            $sth = $pdo->prepare($sql);

            if(!is_null($id)){
                $sth->bindValue(':id',$id,PDO::PARAM_INT);
            }

            if (!$sth->execute()) {
                throw new PDOException();
            } else {
                return $sth->fetchAll();
            }
        } catch (PDOException $ex) {
            return [];
        }

    }

    /**
     * Méthode qui permet de mettre à jour un rdv
     * 
     * @param int $id
     * 
     * @return bool
     */
    public function update(int $id) : bool{

        try{
            $sql = 'UPDATE `quiz` SET `name` = :name, `id_users` = :id_users
                    WHERE `id` = :id';

            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':name',$this->getName(),PDO::PARAM_STR);
            $sth->bindValue(':active',$this->getActive(),PDO::PARAM_BOOL);
            $sth->bindValue(':id_categories',$this->getId_categories(),PDO::PARAM_INT);
            $sth->bindValue(':id_users',$this->getId_users(),PDO::PARAM_INT);

            return $sth->execute();
        }
        catch(PDOException $ex){
            return false;
        }

    }


    public static function delete($id):bool{

        try{

            $pdo = Database::getInstance();
            $sql = 'DELETE FROM `quiz`
                    WHERE `id` = :id;';

            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            
            return ($sth->rowCount()<=0) ? false : true; 
            
        }
        catch(PDOException $e){
            return false;
        }

    }


}