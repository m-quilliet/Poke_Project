<?php
require_once dirname(__FILE__) . '/../utils/init.php';

function redirectTo(string $url)
{
    header('Location: ' . $url);
    die;
}

// une garde début script si rempli pas les conditions, je le renvoie à la page indiquée
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: /controllers/userQuizListCtrl.php');
    die;
}
$homePageStyle = 'homePageStyle.css';
$quizStyle = 'quizStyle.css';

$currentPage = dirname(__FILE__) . '/../views/quiz.php';

$quiz = Quiz::get($_GET['id']);
$questions = $quiz->getQuestions();

// si pas question va afficher view vide
if (count($questions)) {
    // si aucun id question ds url, alors redirige vers meme url avec id de la premiére question
    if (!isset($_GET['idx_question'])) {
        redirectTo(htmlspecialchars($_SERVER["REQUEST_URI"]) . '&idx_question=0');
    }
    if ((int) $_GET['idx_question'] == 0) {
        $_SESSION['score'] = 0;
    }

    $question = $questions[$_GET['idx_question']];

    if (count($_POST)) {
        // @TODO: traiter le resultat

        //si variable post response = response de ma question
        if ($_POST['response'] == $question->getResponse()) {
            $_SESSION['score']++;
        }

        // Si la question n'est pas la derniére
        if ((int) $_GET['idx_question'] < count($questions) - 1) {
            // On redirige vers la question suivante
            redirectTo(
                str_replace(
                    '&idx_question=' . $_GET['idx_question'],
                    '&idx_question=' . ($_GET['idx_question'] + 1),
                    $_SERVER["REQUEST_URI"]
                )
            );
        }
        // Sinon (si la question est la derniére)
        else {
            // On redirige vers le résultat
            // @TODO: Mettre l'url de la page de résultat
            redirectTo('/controllers/userQuizListCtrl.php');
        }
    }
}



include(dirname(__FILE__) . '/../views/templates/layout.php');
