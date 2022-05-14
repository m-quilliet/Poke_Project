<?php 
require_once(dirname(__FILE__).'/../../utils/init.php');
require_once(dirname(__FILE__).'/../../models/Users.php');


$headerDashStyle= 'headerDashStyle.css';

 $getAll= Users::getAll();//$ preier nom que j'ai ds ma boucle views



include(dirname(__FILE__) . '/../../views/dashboard/templates/headerDash.php');



















