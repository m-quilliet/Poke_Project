
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
    <title>PokéMonde</title>
</head>
<body>
    <!-- -- en-téte du site-- -->
    <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline">Menu</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item">
                          <a href="#" class="nav-link align-middle px-0">
                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                          </a>
                      </li>
                      <li>
                          <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">UTILISATEURS</span> 
                          </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">QUIZ</span>
                          </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">MEMO</span> 
                      </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">SE DECONNECTER</span> 
                      </a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <i class="fa fa-table fa-fw"></i> <h1>Liste utilisateurs</h1>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                    <tr>
                      <th>Heading 1</th>
                      <th>Heading 2</th>
                      <th>Heading 3</th>
                      <th>Heading 4</th>
                      <th>Heading 5</th>
                      <th>Heading 6</th>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                      <td>content</td>
                      <td>content</td>
                      <td>content</td>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                      <td>content</td>
                      <td>content</td>
                      <td>content</td>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td>Content</td>
                      <td>Content</td>
                      <td>content</td>
                      <td>content</td>
                      <td>content</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
</div>







