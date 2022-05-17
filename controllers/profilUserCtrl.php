<?php
require_once dirname(__FILE__) . '/../utils/init.php';
require_once dirname(__FILE__) . '/../controllers/userDashCtrl.php';

$profilUserStyle ='profilUserStyle.css';

// $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$oneUser = Users::getByMail($user->getMail());

if ($user instanceof PDOException) {
    $error = $user->getMessage();
}


// include(dirname(__FILE__).'/../views/templates/header.php');


include(dirname(__FILE__) .'/../views/profilUser.php');
include(dirname(__FILE__).'/../views/userDash.php');

