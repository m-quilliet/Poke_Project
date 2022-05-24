<div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-white">
                <div class="panel-heading">
                    <i class="fa fa-table fa-fw"></i> <h1>Liste des Questions</h1>
                </div>
                <div class="table-responsive ">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>LIBELLE</th>
                            <th>RESPONSE A</th>
                            <th>RESPONSE B</th>
                            <th>RESPONSE C</th>
                            <th>RESPONSE</th>
                            <th>MODIFIER</th>
                            <th>SUPPRIMER</th>
                        </tr>
                        <?php foreach ($allQuestion as $question) : ?>
                        <tr>
                            <td><?=$question->getId()?></td>
                            <td><?=$question->getLibelle()?></td>
                            <td><?=$question->getResponseA()?></td>
                            <td><?=$question->getResponseB()?></td>
                            <td><?=$question->getResponseC()?></td>
                            <td><?=$question->getResponse()?></td>
                            <td>
                                <a href="/controllers/addQuestCtrl.php?id=<?= $question->getId()?>">
                                    <img src="/public/assets/img/modifier.png">
                                </a>
                            </td>
                            <td>
                                <a href="/controllers/deleteQuestCtrl.php?id=<?= $question->getId()?>">
                                    <img src="/public/assets/img/delete-30.png">
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                    <a class="btn my-4 " href="/controllers/addQuestCtrl.php" role="button">Ajouter +</a>
                </div>
            </div>
        </div>
    </div>
</div>