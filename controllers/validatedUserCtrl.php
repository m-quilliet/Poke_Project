<?php
require_once dirname(__FILE__) . '/../utils/init.php';
require_once dirname(__FILE__) . '/../helpers/jwt.php';
require_once dirname(__FILE__) . '/../models/Users.php';



$jwt = $_GET['jwt'];

if(!JWT::is_jwt_valid($jwt)){
    $message = 'Token non valide';
} else {
    //Décoder le token, et controler
    $datas = JWT::get($jwt);

    $userByMail = Users::getByMail($datas->mail);

    if($userByMail instanceof PDOException){
        $message = 'Ce mail n\'existe pas';
    } else {

        if(!is_null($userByMail->validated_at)){

            $message = 'Votre compte a déjà été activé';
        } else {            
            $userByMail->validated_at = date('Y-m-d H:i:s');

            $user = new Users();
            
            $user->validated($userByMail->mail,$userByMail->validated_at);

            $message = 'Votre compte a bien été activé';
        }
    }
}

// include(dirname(__FILE__).'/../views/templates/header.php');
// include(dirname(__FILE__).'/../views/homeCtrl.php');
// include(dirname(__FILE__).'/../views/templates/footer.php');