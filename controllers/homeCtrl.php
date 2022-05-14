
<?php
require_once dirname(__FILE__) . '/../utils/init.php';



$homePageStyle='homePageStyle.css';
// si session definit on defi,it la variable $user
if($_SESSION['id']){
    $user= Users::get($_SESSION['id']);
}
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/home.php');
include(dirname(__FILE__).'/../views/templates/footer.php');