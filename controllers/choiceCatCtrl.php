<?php
require_once dirname(__FILE__) . '/../utils/init.php';
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');

$headerDashStyle = 'headerDashStyle.css';

$choiceQuizStyle='choiceQuizStyle.css';

include(dirname(__FILE__).'/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__).'/../views/choiceCat.php');