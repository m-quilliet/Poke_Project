<?php
require_once dirname(__FILE__) . '/../utils/init.php';

$homePageStyle= 'homePageStyle.css';
$quizStyle= 'quizStyle.css';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/quiz.php');
include(dirname(__FILE__).'/../views/templates/footer.php');

