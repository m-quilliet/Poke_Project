
<?php
require_once dirname(__FILE__) . '/../utils/init.php';


echo 'coucou';

$homePageStyle='homePageStyle.css';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/home.php');
include(dirname(__FILE__).'/../views/templates/footer.php');