      <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <i class="fa fa-table fa-fw"></i> <h1>Liste utilisateurs</h1>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                    <tr>
                      <th>ID</th>
                      <th>LOGIN</th>
                      <th>MAIL</th>
                      <th>SUPPRIMER</th>
                    </tr>
                    <?php foreach ($allUsers as $user) : ?>
                      <tr>
                        <td><?=$user->getId()?></td>
                        <td><?=$user->getLogin() ?></td>
                        <td><?=$user->getMail() ?></td>
                        <td><a href="/controllers/dashboard/deleteUserCtrl.php?id=<?= $user->getId()?>"><img src="/public/assets/img/delete-30.png"></a></td> 
                      </tr>
                    <?php endforeach ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</div>