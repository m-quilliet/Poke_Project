<section id="drac">
    <form method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="card-body text-center ">
                        <h5 class="card-title mt-5">Quel est ce Pokemon ?</h5>
                        <p class="card-text mt-5">Pokémon de type Feu/Vol et a été découvert dans la région de Kanto.
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1"><p>Dracaufeu</p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2"><p> Pikachu</p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                            <label class="form-check-label" for="exampleRadios3"><p>Tortank</p>
                            </label>
                        </div>
                        <a href="#" class="btn btn-success">Valider</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>