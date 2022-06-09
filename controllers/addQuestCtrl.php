<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');

// variable contenant le css du dashboard Admin
$headerDashStyle = 'headerDashStyle.css';

//si aucun id n'est récupéré dans l'url, création d'une nouvelle question
if (!isset($_GET['id'])) {
    $question = new Questions();
    $id_quiz =  filter_input(INPUT_GET, 'id_quiz', FILTER_SANITIZE_NUMBER_INT);
    $question->setIdQuiz($id_quiz);
} else {
    //sinon modification de la question 
    $question = Questions::get($_GET['id']);
}
//permet d'associer la question à un quiz
$allQuiz = Quiz::getAll();

//nettoyage et vérification des données
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // Nettoyage du champ libellé
    $libelle = trim(filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($libelle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

    if (!empty($libelle)) {
        if (!$isOk) {
            $errorsArray['libelle_error'] = 'Merci de choisir un libellé valide';
        }
    } else {
        $errorsArray['libelle_error'] = 'Le champ est obligatoire';
    }
    $question->setLibelle($libelle);

    // Nettoyage du champ responseA
    $responseA = trim(filter_input(INPUT_POST, 'responseA', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $isOk = filter_var($responseA, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

    if (!empty($responseA)) {
        if (!$isOk) {
            $errorsArray['responseA_error'] = 'Merci de choisir un responseA valide';
        }
    } else {
        $errorsArray['responseA_error'] = 'Le champ est obligatoire';
    }
    $question->setResponseA($responseA);

    // Nettoyage du champ responseB
    $responseB = trim(filter_input(INPUT_POST, 'responseB', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $isOk = filter_var($responseB, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

    if (!empty($responseB)) {
        if (!$isOk) {
            $errorsArray['responseB_error'] = 'Merci de choisir une responseB valide';
        }
    } else {
        $errorsArray['responseB_error'] = 'Le champ est obligatoire';
    }
    $question->setResponseB($responseB);
    //Nettoyage du champ responseC
    $responseC = trim(filter_input(INPUT_POST, 'responseC', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $isOk = filter_var($responseC, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

    if (!empty($responseC)) {
        if (!$isOk) {
            $errorsArray['responseC_error'] = 'Merci de choisir une responseC valide';
        }
    } else {
        $errorsArray['responseC_error'] = 'Le champ est obligatoire';
    }
    $question->setResponseC($responseC);
    //Nettoyage du champ response
    $response = trim(filter_input(INPUT_POST, 'response', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $isOk = filter_var($response, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

    if (!empty($response)) {
        if (!$isOk) {
            $errorsArray['response_error'] = 'Merci de choisir une reponse valide';
        }
    } else {
        $errorsArray['response_error'] = 'Le champ est obligatoire';
    }
    $question->setResponse($response);

    if (empty($errorsArray)) {

        //
        $result = $question->save();

        if (is_string($result)) {
            header('Location: /controllers/addQuestCtrl.php?id=' . $result);
            die;
        }
    }
}
//views incluse avec ce controller
include(dirname(__FILE__) . '/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__) . '/../views/addQuest.php');
