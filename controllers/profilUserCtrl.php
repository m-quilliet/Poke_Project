<?php
require_once dirname(__FILE__) . '/../utils/init.php';
require_once(dirname(__FILE__) . '/../models/Users.php');


$profilUserStyle ='profilUserStyle.css';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$users = Users::getAll($id);
if ($users instanceof PDOException) {
    $error = $users->getMessage();
}
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/profilUser.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
