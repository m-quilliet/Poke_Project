<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));

    if(!empty($name)){
        if(!$isOk){
            $errorsArray['name_error'] = 'Merci de choisir un nom valide';
        }
    }else{
        $errorsArray['name_error'] = 'Le champ est obligatoire';
    }
}




include(dirname(__FILE__).'/../views/quizAdd.php');