<?php
require_once dirname(__FILE__) . '/../utils/init.php';

$profilUserStyle = 'profilUserStyle.css';
$homePageStyle = 'homePageStyle.css';

$oneUser = Users::getByMail($user->getMail());

if ($user instanceof PDOException) {
    $error = $user->getMessage();
}

include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/profilUser.php');
