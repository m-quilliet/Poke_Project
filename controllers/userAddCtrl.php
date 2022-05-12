<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Users.php');
require_once(dirname(__FILE__) . '/../helpers/JWT.php');

error_reporting(E_ALL);
ini_set("display_errors", 1);

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    // lastname******************************************************
    // Nettoyage et vérification
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));

    if(!empty($login)){
        if(!$isOk){
            $errorsArray['login_error'] = 'Merci de choisir un login valide';
        }
    }else{
        $errorsArray['login_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************


    // EMAIL
    // Nettoyage et vérification
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);

    if(!empty($mail)){
        if(!$isOk){
            $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
        }
        if(Users::isMailExists($mail)){
            $errorsArray['mail_error'] = 'Ce mail existe déjà';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ est obligatoire';
    }
    //verification password et hashage

    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $isOk = filter_var($login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_PASSWORD.'/')));
    if($password != $password2){
        $errorsArray['password_error'] = 'Les mots de passe ne correspondent pas';
    }

    $id_rights = RIGHTS['user']; // ROLES

    if(empty($errorsArray)){
        // $idRight = 

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $registered_at = date('Y-m-d H:i:s');
        $user = new Users($login, $mail, $passwordHash,$registered_at);
        $user->add();
        
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        $payload = ['mail'=>$mail, 'exp'=>(time() + 600)];
        $jwt = JWT::generate_jwt($payload);
    //lien de validation
        $link = $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST'].'/controllers/validatedUserCtrl.php?jwt='.$jwt;
        $message = 'Veuillez cliquer sur le lien suivant:<br>
        <a href="'.$link.'">Activation</a>';
        

        mail($mail, 'Validation de votre inscription', $message,implode("\r\n", $headers));
            $_SESSION['user'] = $user;
            header('location: /controllers/homeCtrl.php');

}
}

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/userAdd.php');
include(dirname(__FILE__).'/../views/templates/footer.php');