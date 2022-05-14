<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Users.php');

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    $user = Users::getByMail($mail);

    if($user instanceOf PDOException){
        $errorsArray['Connection'] = 'Votre email n\'est pas valide.';
    }

    if(empty($errorsArray)){
        $passwordHash = $user->getPassword();
        $result = password_verify($password, $passwordHash);

        if(!$result){
            $errorsArray['Connection'] = 'Mot de passe invalide';
        }

        if(is_null($user->getValidatedAt())){
            $errorsArray['Connection'] = 'Votre compte n\'est pas encore activé';
        }
    }



    if(empty($errorsArray)){

        $_SESSION['id'] = $user->getId();
        header('location: /controllers/homeCtrl.php');
        die;
        
    }



}


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/signin.php');
include(dirname(__FILE__).'/../views/templates/footer.php');