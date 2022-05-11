<?php
require_once dirname(__FILE__) . '/../utils/init.php';
require_once dirname(__FILE__) . '/../helpers/jwt.php';

require_once dirname(__FILE__) . '/../models/User.php';

$jwt = $_GET['jwt'];

if(!JWT::is_jwt_valid($jwt)){
    $message = 'Token non valide';
} else {
    //Décoder le token, et controler
    $datas = JWT::get($jwt);

    $userByMail = User::getByMail($datas->mail);
    if($userByMail instanceof PDOException){
        $message = 'Ce mail n\'existe pas';
    } else {
        if(!is_null($userByMail->validated_at)){
            $message = 'Votre compte a déjà été activé';
        } else {
            $userByMail->validated_at = date('Y-m-d H:i:s');
    
            $user = new User($userByMail->lastname, $userByMail->mail, $userByMail->password, $userByMail->validated_at);
            
            $user->update($userByMail->id);
        
            $message = 'Votre compte a bien été activé';
        }
    }
}

echo $message;