<?php
require_once(dirname(__FILE__) . '/../utils/init.php');


$userAddStyle='userAddStyle.css';
$homePageStyle = 'homePageStyle.css';

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    $userFromMail = Users::getByMail($email);

    if($userFromMail instanceOf PDOException){
        $errorsArray['Connection'] = 'Votre email n\'est pas valide.';
    }

    if(empty($errorsArray)){
        $passwordHash = $userFromMail->getPassword();
        $result = password_verify($password, $passwordHash);

        if(!$result){
            $errorsArray['Connection'] = 'Mot de passe invalide';
        }

        if(is_null($userFromMail->getValidatedAt())){
            $errorsArray['Connection'] = 'Votre compte n\'est pas encore activé';
        }
    }



    if(empty($errorsArray)){

        $_SESSION['id'] = $userFromMail->getId();

            header('location: /controllers/homeCtrl.php');
            die;
        
    }



}


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/signin.php');
include(dirname(__FILE__).'/../views/templates/footer.php');