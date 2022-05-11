<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../helpers/JWT.php');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require_once(dirname(__FILE__) . '/../vendor/autoload.php');

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    // lastname******************************************************
    // Nettoyage et vérification
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_STR_NO_NUMBER.'/')));

    if(!empty($lastname)){
        if(!$isOk){
            $errorsArray['lastname_error'] = 'Merci de choisir un nom valide';
        }
    }else{
        $errorsArray['lastname_error'] = 'Le champ est obligatoire';
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
        $user = new User($lastname, $mail, $passwordHash);
        $user->save();

        $payload = ['mail'=>$mail, 'exp'=>(time() + 600)];
        $jwt = JWT::generate_jwt($payload);

        $link = $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST'].'/controllers/validateUserCtrl.php?jwt='.$jwt;
        $message = '
        Veuillez cliquer sur le lien suivant:<br>
        <a href="'.$link.'">Activation</a>
        ';

        //Create an instance; passing `true` enables exceptions
//         $mailer = new PHPMailer(true);

//         try {
//             $mailer->isSMTP();                                            //Send using SMTP
//             $mailer->Host       = 'smtp.gmail.com';
//             $mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
//             $mailer->Username   = 'thierry.lachat@novei.fr';                     //SMTP username
//             $mailer->Password   = 'xvhvdzqjvsdjzmaw';                               //SMTP password
//             $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
//             $mailer->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
//             $mailer->setFrom('thierry.lachat@novei.fr', 'Administrateur JWT');
//             $mailer->addAddress($mail, $lastname);
        
//             $mailer->isHTML(true);                                  //Set email format to HTML
//             $mailer->Subject = 'Validation de votre inscription';
//             $mailer->Body    = $message;

//             $mailer->send();
// die;
//         } catch (Exception $e) {
//             throw $e;
//         }
        
//     }

}
}

include(dirname(__FILE__).'/../views/templates/header.php');
    include(dirname(__FILE__).'/../views/signup.php');
include(dirname(__FILE__).'/../views/templates/footer.php');