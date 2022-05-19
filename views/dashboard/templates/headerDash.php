
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="/../../public/assets/css/dashboard/<?=$headerDashStyle ?>">
    <link rel="stylesheet" href="/../../public/assets/css/<?=$choiceQuizStyle?>">
    <title>PokéMonde</title>
</head>
<body>
    <!-- en-téte du site -->
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/controllers/dashboard/headerDashCtrl.php" class="nav-link align-middle px-0 text-info">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/controllers/userListCtrl.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Utilisateurs</span> 
                        </a>
                    </li>
                    <li>
                        <a href="/controllers/choiceCatCtrl.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Catégories</span>
                        </a>
                    </li> 
                    <li>
                        <a href="/controllers/listQuizCtrl.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Liste Quiz</span>
                        </a>
                    </li> 
                    <li>
                        <a href="/controllers/addQuestCtrl.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Editer Question</span>
                        </a>
                    </li>
                    <li>
                        <a href="/controllers/listQuestCtrl.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Liste Question</span>
                        </a>
                    </li> 
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Memo</span> 
                    </a>
                    </li>
                    <li>
                        <a href="/controllers/logoutCtrl.php" class="nav-link px-0 align-middle text-white">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Se déconnecter</span> 
                    </a>
                    </li>
                </ul>
            </div>
        </div>








