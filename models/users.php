<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class Users
{

    private int $id = 0;
    private string $login = '';
    private string $mail = '';
    private string $password = '';
    private string $registered_at = '';
    private ?string $validated_at = '';
    private int $id_rights = 2013;


    public function __construct()
    {
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function getRegistered_at()
    {
        return $this->registered_at;
    }

    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setValidatedAt(?string $validated_at)
    {
        $this->validated_at = $validated_at;
    }

    public function getValidatedAt()
    {
        return $this->validated_at;
    }
    public function setIdRights(int $id_rights)
    {
        $this->id_rights = $id_rights;
    }

    public function getIdRights()
    {
        return $this->id_rights;
    }

    public static function isMailExists(string $mail, int $id = 0): bool
    {
        try {
            $sql = 'SELECT * FROM `users` WHERE `mail` = :mail AND `id`<>:id';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            return empty($sth->fetchAll()) ? false : true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // METHODE DE CRÉATION ET MODIFICATION
    public function save()
    {

        // si user existe en base on le modifie
        if ($this->id != 0) {
            $sql = 'UPDATE `users` SET `login` = :login, `mail` = :mail, `password` = :password, `validated_at` = :validated_at
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

        if ($this->id != 0) {
            $sth->bindValue(':validated_at', $this->getValidatedAt());
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        } else {
            $sth->bindValue(':id_rights', $this->getIdRights(), PDO::PARAM_INT);
        }
        // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire

        return $sth->execute();
    }

    
    public static function get(int $id): Users
    {
        $sql = 'SELECT * FROM `users` WHERE `id` = :id';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $user = $sth->fetchObject('\Users');

        if (!$user) {
            throw new PDOException('Utilisateur non-trouvé');
        } else {
            return $user;
        }
    }


    public static function getByMail(string $mail): object
    {
        try {
            $sql = 'SELECT * FROM `users` WHERE `mail` = :mail';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $result = $sth->execute();
            $user = $sth->fetchObject('\Users');

            if (!$user) {
                throw new PDOException('Utilisateurs non-trouvés');
            } else {
                return $user;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }



    //validation par lien mail
    public function validated($mail, $validated_at): bool
    {
        try {

            $sql = 'UPDATE `users` SET  `validated_at` = :validated_at
                    WHERE `mail` = :mail';

            $sth = Database::getInstance()->prepare($sql);

            $sth->bindValue(':mail', $mail);

            $sth->bindValue(':validated_at', $validated_at);

            return $sth->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    //METHODE READ
    public static function getAll(): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM `users`';

            // On exécute la requête
            $sth = $pdo->query($sql);

            if ($sth === false) {
                throw new PDOException();
            } else {
                //récupérer sous forme de classe user
                return $sth->fetchAll(PDO::FETCH_CLASS, '\Users'); //revoit un mapping ds ma classe users
            }
        } catch (PDOException $e) {
            return [];
        }
    }

    //METHODE DELETE
    public static function deleteUsers(int $idUsers): bool
    {
        $sql = "DELETE 
            FROM `users`
            WHERE `id`=:id;";

        try {
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':id', $idUsers, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    // Methode nouvel utilisateur ou pas
    function isNew(): bool
    {
        return $this->id === 0;
    }
    // recuperer utilisateur qui est connecté
    public static function  current(): ?Users 
    {
        $user = null;
        if (!empty($_SESSION['id'])) {
            try {
                $user = Users::get($_SESSION['id']);
            } catch (Exception $e) {
                session_destroy();
            }
        }
        return $user;
    }
          //METHODE DELETE
        public static function delete(int $id): bool
        {
            $sql = "DELETE 
                FROM `users`
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
