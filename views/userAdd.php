<main class="d-flex justify-content-center align-items-center vh-100" >
    <div class="container">
        <div class="row justify-content-center"  >
            <h1 class="col-12 text-center mt-5" ><?=!$user->getId() ? 'Inscription': 'Modification'?></h1>
                <?php 
                    require_once(dirname(__FILE__) .'/fragments/userUpsert.php');
                ?>
        </div>
    </div>
</main>