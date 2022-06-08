<?php
require_once(dirname(__FILE__) . '/../utils/Database.php');


class Scores
{
    private int $id=0;
    private int $score;
    private DateTime $played_at;
    private int $id_users;
    private int $id_quiz;

    private object $_pdo;


    public function __construct()
    {

        $this->_pdo = Database::getInstance();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getPlayedAt()
    {
        return $this->played_at;
    }
    public function setIdUsers(int $id_users)
    {
        $this->id_users = $id_users;
    }

    public function getIdUsers()
    {
        return $this->id_users;
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
        if ($this->id != 0) {
            throw new Exception('Vous ne pouvez pas modifier un score existant.');
        } else {
            // On créé la requête avec des marqueurs nominatif
            $sql = 'INSERT INTO `scores` (`score`,`id_users`,`id_quiz`) 
            VALUES (:score, :id_user, :id_quiz)';
        }
        $sth = $this->_pdo->prepare($sql);
        $sth->bindValue(':score', $this->score, PDO::PARAM_INT);
        $sth->bindValue(':id_user', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);


        $result = $sth->execute();
        if ($result && $this->id == 0) {
            return $this->_pdo->lastInsertId();
        }
        return $result;
    }
}
