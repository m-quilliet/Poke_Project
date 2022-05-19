<?php
require_once(dirname(__FILE__) . '/../utils/init.php');


if(empty($_SESSION) && ($_SESSION['user']->id_rigths != 1983)){
    header('location: /');
}

$allQuestion= Questions::getAll();//$ premier nom que j'ai ds ma boucle views



include(dirname(__FILE__).'/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__).'/../views/listQuest.php');