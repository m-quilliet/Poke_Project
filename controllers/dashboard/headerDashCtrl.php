<?php 
require_once(dirname(__FILE__).'/../../utils/init.php');
require_once(dirname(__FILE__) . '/../../helpers/adminOnly.php');


$headerDashStyle= 'headerDashStyle.css';



$allUsers= Users::getAll();//$ premier nom que j'ai ds ma boucle views


include(dirname(__FILE__) . '/../../views/dashboard/templates/headerDash.php');




















