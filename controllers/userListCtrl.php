<?php
require_once(dirname(__FILE__) . '/../utils/init.php');


$allUsers= Users::getAll();//$ premier nom que j'ai ds ma boucle views

include(dirname(__FILE__).'/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__).'/../views/userList.php');


