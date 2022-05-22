<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/<?=$homePageStyle?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$quizStyle?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$userDashStyle?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$profilUserStyle?>">
    <link rel="stylesheet" href="/public/assets/css/<?=$userAddStyle?>">
    
    
    <title>PokéMonde</title>
</head>
<body>
    <!-- -- en-téte du site-- -->
    <header>
        <!-- Barre de navigation se transformant en menu burger pour mobile -->
            <nav class="navbar  navbar-expand-sm  sticky-top " id="navbar">
                <a href="/" class="navbar-brand"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <?php if(empty($user)){?>
                        <li class="nav-item">    
                            <a class="btn btn-outline-light" href="/controllers/signinCtrl.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="/controllers/userAddCtrl.php">Inscription</a>
                        </li>
                        <?php } else {?>
                            <?php if(($user->getIdRights() == '1983')){ ?>
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" href="/../../controllers/dashboard/headerDashCtrl.php">dashADMIN</a>
                                </li>
                                    
                                <?php } else { ?>
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" href="/controllers/profilUserCtrl.php">Profil</a>
                                </li>

                                <?php } ?>
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" href="/controllers/logoutCtrl.php">Déconnexion</a>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>   
    </header>








