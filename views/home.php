<?php if (!empty($_SESSION["user"])) { ?>
    Bonjour <?= $_SESSION["user"]->login; ?>
<?php } ?>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div id="carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
              </ol>

              <div class="carousel-inner" role="listbox">
              <div class="carousel-item active"id="img3">
                  <div class="caption">
                    <h1>FORMULAIRE</h1>
                    <h2>Inscris-toi et tu pourras jouer avec nous! </h2>
                    <!-- <button type="button" class="btn btn-secondary">INSCRIPTION</button> -->
                    <a class="btn btn-info" href="/controllers/signinCtrl.php">Inscription</a>
                  </div>
              </div>

              <div class="carousel-item " id="img1">
                  <div class="caption">
                    <h1>Es-tu un vrai fan ?</h1>
                    <h2>Je te défie de répondre à ce quiz pour le vérifier.</h2>
                    <button type="button" class="btn btn-secondary">JOUER</button>
                  </div>
              </div>

              <div class="carousel-item"id="img2"> 
                  <div class="caption">
                    <h1 class="memo">Sauras-tu réussir ce Mémo ?</h1>
                    <h2 class="text-dark">Allons vérifier cela.</h2>
                    <a><button type="button" class="btn btn-secondary">JOUER</button></a>
              </div>
            </div>
            </div>
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    <section>





