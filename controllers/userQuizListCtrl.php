<?php
require_once dirname(__FILE__) . '/../utils/init.php';

$homePageStyle = 'homePageStyle.css';
$currentPage= dirname(__FILE__) . '/../views/userQuizList.php';

$quizs= Quiz::getAll();

include(dirname(__FILE__) . '/../views/templates/layout.php');
