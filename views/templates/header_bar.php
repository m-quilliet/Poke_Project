<header class="header_user">
    <!-- Barre de navigation se transformant en menu burger pour mobile -->
    <nav class="navbar  navbar-expand-sm  sticky-top " id="navbar">
        <a href="/" class="navbar-brand"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class=" text-white m-2 fs-5 from-right " href="/">Home</a>
                </li>
                <?php if (empty($user)) { ?>
                    <li class="nav-item">
                        <a class=" text-white m-2 fs-5 from-right " href="/controllers/signinCtrl.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class=" text-white m-2 fs-5 from-right " href="/controllers/userAddCtrl.php">Inscription</a>
                    </li>
                <?php } else { ?>
                    <?php if (($user->getIdRights() == '1983')) { ?>
                        <li class="nav-item">
                            <a class=" text-white m-2 fs-5 from-right " href="/../../controllers/dashboard/headerDashCtrl.php">dashADMIN</a>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item">
                            <a class=" text-white m-2 fs-5 from-right  " href="/controllers/profilUserCtrl.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class=" text-white m-2 fs-5 from-right  " href="/controllers/memoryCtrl.php">Memo</a>
                        </li>
                        <li class="nav-item">
                            <a class=" text-white m-2 fs-5 from-right " href="/controllers/userQuizListCtrl.php">Quiz</a>
                        </li>

                    <?php } ?>
                    <li class="nav-item">
                        <a class=" text-white m-2 fs-5 from-right " href="/controllers/logoutCtrl.php">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>