<?php
require_once(dirname(__FILE__) . '/../../utils/init.php');
require_once(dirname(__FILE__) . '/../../models/Users.php');



/*************************************************************/

/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../../views/templates/header.php');
include(dirname(__FILE__) . '/../../views/dashboard/listUser.php');
include(dirname(__FILE__) . '/../../views/templates/footer.php');