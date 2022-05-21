<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');



if (!isset($_GET['id'])) {
    $question = new Questions();
} else {
    $question = Questions::get($_GET['id']);

}
$allQuiz= Quiz::getAll();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // $id_quiz=trim(filter_input(INPUT_POST, 'id_quiz', FILTER_VALIDATE_INT));
    // if (!empty($id_quiz)) {
    //     if (!$isOk) {
    //         $errorsArray['id_quiz_error'] = 'Merci de choisir un quiz valide';
    //     }
    // } else {
    //     $errorsArray['id_quiz_error'] = 'Le champ est obligatoire';
    // }
    //timecast
    $id_quiz =  filter_input(INPUT_POST, 'id_quiz', FILTER_SANITIZE_NUMBER_INT);


    // Nettoyage et vérification
    $libelle = trim(filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($libelle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));

    if (!empty($libelle)) {
        if (!$isOk) {
            $errorsArray['libelle_error'] = 'Merci de choisir un libellé valide';
        }
    } else {
        $errorsArray['libelle_error'] = 'Le champ est obligatoire';
    }

    $responseA = trim(filter_input(INPUT_POST, 'responseA', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($responseA, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));

    if (!empty($responseA)) {
        if (!$isOk) {
            $errorsArray['responseA_error'] = 'Merci de choisir un responseA valide';
        }
    } else {
        $errorsArray['responseA_error'] = 'Le champ est obligatoire';
    }


    $responseB = trim(filter_input(INPUT_POST, 'responseB', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($responseB, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));

    if (!empty($responseB)) {
        if (!$isOk) {
            $errorsArray['responseB_error'] = 'Merci de choisir une responseB valide';
        }
    } else {
        $errorsArray['responseB_error'] = 'Le champ est obligatoire';
    }

    $responseC = trim(filter_input(INPUT_POST, 'responseC', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($responseC, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));

    if (!empty($responseC)) {
        if (!$isOk) {
            $errorsArray['responseC_error'] = 'Merci de choisir une responseC valide';
        }
    } else {
        $errorsArray['responseC_error'] = 'Le champ est obligatoire';
    }

    $response = trim(filter_input(INPUT_POST, 'response', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($response, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));

    if (!empty($response)) {
        if (!$isOk) {
            $errorsArray['response_error'] = 'Merci de choisir une reponse valide';
        }
    } else {
        $errorsArray['response_error'] = 'Le champ est obligatoire';
    }

    if (empty($errorsArray)) {
        $question->setLibelle($libelle);
        $question->setResponseA($responseA);
        $question->setResponseB($responseB);
        $question->setResponseC($responseC);
        $question->setResponse($response);
        $question->setIdQuiz($id_quiz);
        //retourne l'élément courant (user)
        // $question->setIdQuiz(Users::current()->getId());

        $result = $question->save();




        if (is_string($result)) {
            header('Location: /controllers/addQuestCtrl.php?id=' . $result);
            die;
        }
    }
}
include(dirname(__FILE__) . '/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__) . '/../views/addQuest.php');
