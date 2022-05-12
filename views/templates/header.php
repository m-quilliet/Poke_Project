<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/<?=$homePageStyle?? 'style.css' ?>">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>PokéMonde</title>
</head>
<body>
    <!-- -- en-téte du site-- -->
    <header>
        <!-- Barre de navigation se transformant en menu burger pour mobile -->
            <nav class="navbar navbar-light navbar-expand-sm bg-light opacity-50 fixed-top">
                <a href="/" class="navbar-brand">
                PokéMonde
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="" class="nav-link active">QUIZZ</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active">MEMO</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a href="/../../views/dashboard/templates/headerDash.php" class="nav-link active">DASHBOARD</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-5">
                    <?php if(empty($_SESSION["user"])){?>
                    <li class="nav-item">    
                        <a class="nav-link active px-4" href="/controllers/signinCtrl.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-4" href="/controllers/userAddCtrl.php">Inscription</a>
                        
                    </li>
                    <?php } else {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"href="#">Settings</a></li>
                            <li><a class="dropdown-item"href="#">Messages</a></li>
                            <li><a class="dropdown-item"href="/controllers/logoutCtrl.php">Déconnexion</a></li>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
            </nav>   
    </header>






