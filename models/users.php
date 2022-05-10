<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class User{

    private int $_id;
    private string $_login;
    private string $_mail;
    private string $_password;
    private string $_registered_at;
    private ?string $_validated_at;
    private int $_id_rights;
    

    public function __construct(string $login, string $mail, string $password, ?string $validated_at = NULL){
        
        $this->setLogin($login);
        $this->setMail($mail);
        $this->setPassword($password);
        $this->setValidatedAt($validated_at);


    } 

    public function setId(int $id){
        $this->_id = $id;
    }

    public function getId(){
        return $this->_id;
    }

    public function setLogin(string $login){
        $this->_login = $login;
    }

    public function getLogin(){
        return $this->_login;
    }

    public function setMail(string $mail){
        $this->_mail = $mail;
    }

    public function getMail(){
        return $this->_mail;
    }   

    public function setPassword(string $password){
        $this->_password = $password;
    }   

    public function getPassword(){
        return $this->_password;
    }

    public function setValidatedAt(?string $validated_at){
        $this->_validated_at = $validated_at;
    }

    public function getValidatedAt(){
        return $this->_validated_at;
    }

    public function setId_rights(int $id_rights){
        $this->_id = $id_rights;
    }

    public function getId_rights(){
        return $this->_id_rights;
    }

    public static function isMailExists(string $mail): bool
    {
        try {
            $sql = 'SELECT * FROM `users` WHERE `mail` = :mail';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetchAll()) ? false : true;

        } catch (\PDOException $e) {
            return false;
        }
    }


    public function save(){
        try {
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `users` (`login`, `mail`, `password`) 
                VALUES (:login, :mail, :password);';

            // On prépare la requête
            $sth = Database::getInstance()->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':login', $this->getLogin(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
            return $sth->execute();
        } catch (PDOException $e) {
            // On retourne false si une exception est levée
            return false;
        }
    }

    public static function getByMail(string $mail): object{
        try {
            $sql = 'SELECT * FROM `users` WHERE `mail` = :mail';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $result = $sth->execute();
            $user = $sth->fetch();

            if(!$user){
                throw new PDOException('User not found');
            } else {
                return $user;
            }

        } catch (\PDOException $e) {
            return $e;
        }
    }


    public function update($id): bool
    {
        try {

            $sql = 'UPDATE `users` SET `login` = :login, `mail` = :mail, `password` = :password, `validated_at` = :validated_at
                    WHERE `id` = :id';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':login', $this->getLogin());
            $sth->bindValue(':mail', $this->getMail());
            $sth->bindValue(':password', $this->getPassword());
            $sth->bindValue(':validated_at', $this->getValidatedAt());
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            return $sth->execute();

        } catch (PDOException $ex) {
            return false;
        }
    }

}