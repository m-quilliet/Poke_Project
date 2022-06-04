<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');

//variable faisant appel à la feuille de style du dashboard admin
$headerDashStyle = 'headerDashStyle.css';

//méthode du modéle Questions pour afficher la liste des questions
$allQuestion= Questions::getAll();


include(dirname(__FILE__).'/../views/dashboard/templates/headerDash.php');
include(dirname(__FILE__).'/../views/listQuest.php');