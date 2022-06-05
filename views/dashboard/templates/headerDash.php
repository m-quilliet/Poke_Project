<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/homePageStyle.css">
    <link rel="stylesheet" href="/../../public/assets/css/<?= $headerDashStyle ?>">
    <link rel="stylesheet" href="/../../public/assets/css/<?= $choiceQuizStyle ?>">
    <link rel="stylesheet" href="/../../public/assets/css/<?= $profilUserStyle ?>">
    <link rel="stylesheet" href="/../../public/assets/css/<?= $quizStyle ?>">
    <title>Poké'MOM</title>
</head>

<body>
<?php require_once dirname(__FILE__) . '/../../templates/header_bar.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 ms-0 ps-0">
                <?php include(dirname(__FILE__) . '/../../templates/sidebar_bar_admin.php'); ?>
            </div>
            <div class="col-9">