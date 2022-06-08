<?php
require_once(dirname(__FILE__) . '/../utils/init.php');


$currentPage = dirname(__FILE__) . '/../views/quizResult.php';

if (!isset($_SESSION['score'])) {
    header('Location: /');
    die;
}
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: /');
    die;
}
try {
    $quiz = Quiz::get($_GET['id']);
} catch (Exception $e) {
    if (!$quiz) {
        header('Location: /');
        die;
    }
}

$scoreNum = $_SESSION['score'];
$nbQuestions = count($quiz->getQuestions());
$scorePercent = round(100 / $nbQuestions * $scoreNum);

$score = new Scores();
$score->setScore($scorePercent);
$score->setIdUsers(Users::current()->getId());
$score->setIdQuiz($quiz->getId());
$score->save();
// retire le score de la session
unset($_SESSION['score']);


include(dirname(__FILE__) . '/../views/templates/layout.php');
