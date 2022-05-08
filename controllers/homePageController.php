<?php 

require_once(dirname(__FILE__) . '/../utils/database.php');

$homePageStyle='homePageStyle.css';






//-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/homePage.php');
include(dirname(__FILE__).'/../views/templates/footer.php');