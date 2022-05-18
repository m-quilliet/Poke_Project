<?php
require_once(dirname(__FILE__) . '/../utils/init.php');



if(!isset($_GET['id']))
{
    $quiz= new Quiz();
} else {
    $quiz= Quiz::get($_GET['id']);
}
var_dump($quiz);


$errorsArray=[];
// // // si il ya une variable user c'est que mon utilisateur est connecté sinon pas connecté
// if(!isset($quiz))
// {
//     $quiz= new Quiz();
// }

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    // login*
    // Nettoyage et vérification
    $name = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));

    if(!empty($name)){
        if(!$isOk){
            $errorsArray['name_error'] = 'Merci de choisir un titre valide';
        }
    }else{
        $errorsArray['name_error'] = 'Le champ est obligatoire';
    }

    if(empty($errorsArray) ){
        $quiz->setIdCategories(1);
        $quiz->setName($name);

        $quiz->setIdUsers(Users::current()->getId());


        $response = $quiz->save();
        var_dump($response);
        
        if(is_string($response)){
            header ('Location: /controllers/choiceQuizCtrl.php?id='.$response);
            die;
        }
    

    }
}
include(dirname(__FILE__).'/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__).'/../views/choiceQuiz.php');

