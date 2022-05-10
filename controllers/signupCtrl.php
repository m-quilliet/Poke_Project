<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Users.php');


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    // login ******************************************************
    // Nettoyage et vérification
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_STR_NO_NUMBER.'/')));

    if(!empty($login)){
        if(!$isOk){
            $errorsArray['login_error'] = 'Merci de choisir un login valide';
        }
    }else{
        $errorsArray['login_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************


    // email
    // Nettoyage et vérification
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);

    if(!empty($mail)){
        if(!$isOk){
            $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
        }
        if(User::isMailExists($mail)){
            $errorsArray['mail_error'] = 'Ce mail existe déjà';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************

    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($password != $password2){
        $errorsArray['password_error'] = 'Les mots de passe ne correspondent pas';
    }

    if(empty($errorsArray)){

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($login, $mail, $passwordHash);
        $user->save();
        //generation du lien
        $link = $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST'].'/controllers/validateUserCtrl.php?jwt='.$mail;
        $message = '
        Veuillez cliquer sur le lien suivant:<br>
        <a href="'.$link.'">Activation</a>
        ';
        mail($mail, 'Validation de votre inscription', $message);
        
    }

}

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/signup.php');
include(dirname(__FILE__).'/../views/templates/footer.php');