<?php 
require_once(dirname(__FILE__).'/../../utils/init.php');
require_once(dirname(__FILE__).'/../../models/Users.php');

$headerDashStyle= 'headerDashStyle.css';
// Pour empecher un utilisateur d'acceder au dashboard admin
// if ($_SESSION['user']->id_roles != '1983') {
//     header('location: /home');
//     die;
// }

 $allUsers= Users::getAll();//$ premier nom que j'ai ds ma boucle views


include(dirname(__FILE__) . '/../../views/dashboard/templates/headerDash.php');




















