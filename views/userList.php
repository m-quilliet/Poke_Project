      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6" class="text-white"">
              <div class=" panel panel-white">
            <div class="panel-heading">
              <i class="fa fa-table fa-fw"></i>
              <h1>Liste utilisateurs</h1>
            </div>
            <div class="table-responsive">
              <table class="table table-striped text-white" id="example">
                <tr>
                  <th>ID</th>
                  <th>LOGIN</th>
                  <th>MAIL</th>
                  <th>SUP</th>
                </tr>
                <?php foreach ($allUsers as $user) : ?>
                  <tr class="text-white fs-5">
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getLogin() ?></td>
                    <td><a class="mailto" href="mailto:<?= htmlentities($user->getMail()) ?>"><?= htmlentities($user->getMail()) ?></a></td>
                    <td><a href="/controllers/dashboard/deleteUserCtrl.php?id=<?= $user->getId() ?>"><img src="/public/assets/img/delete-30.png"></a></td>
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