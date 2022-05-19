<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class Questions
{
    private int $id = 0;
    private string $libelle = '';
    private string $response_a = '';
    private string $response_b = '';
    private string $response_c = '';
    private string $response = '';
    private int $id_quiz = 0;

    private object $_pdo;



    public function __construct()
    {

        $this->_pdo = Database::getInstance();
    }



    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setResponseA(string $response_a)
    {
        $this->response_a = $response_a;
    }

    public function getResponseA()
    {
        return $this->response_a;
    }


    public function setResponseB(string $response_b)
    {
        $this->response_b = $response_b;
    }

    public function getResponseB()
    {
        return $this->response_b;
    }


    public function setResponseC(string $response_c)
    {
        $this->response_c = $response_c;
    }

    public function getResponseC()
    {
        return $this->response_c;
    }


    public function setResponse(string $response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setIdQuiz(int $id_quiz)
    {
        $this->id_quiz = $id_quiz;
    }

    public function getIdQuiz()
    {
        return $this->id_quiz;
    }

    public function save()
    {

        // si quiz existe en base on le modifie
        if ($this->id != 0) {
            $sql = 'UPDATE `questions` 
            SET `libelle` = :libelle,
            `response_a` = :response_a,
            `response_b` = :response_b,
            `response_c` = :response_c,
            `response` = :response,
            `id_quiz`= :id_quiz
            WHERE `id` = :id';
        }



        // si il n'existe pas on l'insert en base
        else {
            // On créé la requête avec des marqueurs nominatif


            $sql = 'INSERT INTO `questions` (`libelle`,`response_a`,`response_b`,`response_c`,`response`,`id_quiz`) 
                VALUES (:libelle,:response_a,:response_b,:response_c, :response, :id_quiz)';
        }
        $sth = $this->_pdo->prepare($sql);
        $sth->bindValue(':libelle', $this->getLibelle(), PDO::PARAM_STR);
        $sth->bindValue(':response_a', $this->getResponseA(), PDO::PARAM_STR);
        $sth->bindValue(':response_b', $this->getResponseB(), PDO::PARAM_STR);
        $sth->bindValue(':response_c', $this->getResponseC(), PDO::PARAM_STR);
        $sth->bindValue(':response', $this->getResponse(), PDO::PARAM_STR);
        $sth->bindValue(':id_quiz', $this->getIdQuiz(), PDO::PARAM_INT);


        if ($this->id != 0) {
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        }

        $result = $sth->execute();
        if ($result && $this->id == 0) {
            //dernier id inserer en table
            return $this->_pdo->lastInsertId();
        } else {
            return $result;
        }
    }

    public static function get(int $id): Questions
    {
        $sql = 'SELECT * FROM `questions` WHERE `id` = :id';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        //recupére donnée en base de données et ensuite hydrate le model quiz
        //Récupère la prochaine ligne et la retourne en tant qu'objet de la classe questions
        $question = $sth->fetchObject('\Questions');
        if (!$question) {
            throw new PDOException('Utilisateur non-trouvé');
        } else {
            return $question;
        }
    }
    public static function getAll(): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM `questions`';

            // On exécute la requête
            $sth = $pdo->query($sql);

            if ($sth === false) {
                throw new PDOException();
            } else {
                //dis tt récupérer sous forme de classe user// recupérer avec les classes et en premier la classe user
                return $sth->fetchAll(PDO::FETCH_CLASS, '\Questions');
            }
        } catch (PDOException $e) {
            return [];
        }
    }
    //METHODE DELETE
    public static function delete(int $id): bool
    {
        $sql = "DELETE 
                FROM `questions`
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
