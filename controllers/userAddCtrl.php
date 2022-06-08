<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/JWT.php');


$userAddStyle='userAddStyle.css';
$homePageStyle = 'homePageStyle.css';


// si utilisateur n'est pas connecté, j'initialise un nouvel utilisateur (inscription)
if(!isset($user))
{
    $user= new Users();
}
//si la méthode http est 'POST' (j'applique les modifications à mon objet utilisateur )
if($_SERVER["REQUEST_METHOD"] == 'POST'){

    // login*
    // Nettoyage et vérification des données du formulaire
    // verifie les données crées avec le formulaire
    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));
// si variable login n'est pas vide
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
        //si ds mes utilisateurs, l'email existe, pour un utilisateur différent de l'utilisateur courant
        if(Users::isMailExists($mail,$user->getId())){
            $errorsArray['mail_error'] = 'Ce mail existe déjà';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ est obligatoire';
    }
    // si aucun password saisi ou que c'est un nouvel utilisateur
    if(!empty($_POST['password'])|| !$user->getId()){
//si c'est nouvel utilisateur, il est obligé de saisir un mot de passe
//si c'est un utilisateur existant et qu'il ne rentre pas son mot de passe, il conserve son mot de passe

    //verification password et hashage
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        //si variable password est vide
        if(empty($password)){
            $errorsArray['password_error'] = 'Le mot de passe est obligatoire';
        }
        //si le mot de passe et la confirmation sont différents
        if($password != $password2){
            $errorsArray['password_confirm_error'] = 'Les mots de passe ne correspondent pas';
        }
    }


    //j' assigne le login a mon instance (mutateur)
    $user->setLogin($login);
    //j'assigne le mail à mon instance
    $user->setMail($mail);
    // si le tableau d'erreur est vide
    if(empty($errorsArray)){       
        //ET si l'utilisateur a saisi un mot de passe 
        if(isset($password) && !empty($password) ){
            //j'assigne le nouveau mot de passe à l'instance (que se charge de la hasher)
            $user->setPassword($password);
        }
        // je persiste (sauvegarde) les données dans la base de donnée
        $user->save();
        // si c'est un nouvel utilisateur
        if($user->isNew()) {
            /*
            je définis le header de l'email pr indiquer comment le contenu doit s'afficher
            */
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            //créer un tokken jwt(jason web token) qui expire au bout de 60s
            $payload = ['mail'=>$mail, 'exp'=>(time() + 600)];
            //jwt est l'encodé mais pas le hashage /!\ ne pas mettre de données sensibles
            $jwt = JWT::generate_jwt($payload);

        //lien de validation
            //si l'url de la page courante est en https alors le lien sera en https sinon il sera en http
            $link = $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST'].'/controllers/validatedUserCtrl.php?jwt='.$jwt;
            
            $message = 'Veuillez cliquer sur le lien suivant:<br>
            <a href="'.$link.'">Activation</a>';
            // envoie de lemail
            mail($mail, 'Validation de votre inscription', $message,implode("\r\n", $headers));
            //on renvoie vers la home
            header('location: /controllers/homeCtrl.php');
        } else {
            //si pas un nouveau vers son profil
            header('location: /controllers/profilUserCtrl.php');
        }

    }
    
}
// on indique la page à afficher dans le layout
$currentPage= dirname(__FILE__).'/../views/userAdd.php';
// on inclut le layout pour afficher notre page avec la balisage html
include(dirname(__FILE__).'/../views/templates/layout.php');

