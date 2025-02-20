<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $this->meta["title"]; ?></title>
    <meta name="description" content="админка">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style_menuAdmin.css">
    
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <br>
                    <label class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Панель администратора</span>
                    </label>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/users" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Главная</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/create" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Добавить пользователя</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <a href="/profile?id=<?= $this->meta[1][0]["id"]; ?>" class="d-flex align-items-center text-white text-decoration-none">
                        <img src="<?= $this->meta[1][0]["avatar"]; ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-3"><?= $this->meta[1][0]["name"]; ?></span>
                    </a>
                    <div class="dropdown pb-4"></div>
                    <ul class="nav nav-pills flex-column mb-sm-4 mb-0 align-items-center align-items-sm-start">
                        <li class="nav-item">
                            <i class="fs-4 bi-speedometer2"></i> <label class="ms-1 d-none d-sm-inline">Онлайн: <?= $data[0][0]["count"]; ?></label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <div class="container-fluid bootstrap snippets bootdey">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <?php $this->printAdminUsers(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 5 }
                ],
                language: {
                    'paginate': {
                    'previous': '<span class="fa fa-chevron-left"></span>',
                    'next': '<span class="fa fa-chevron-right"></span>'
                },
                "lengthMenu": 'Показать <select class="form-control input-sm">'+
                    '<option value="5">5</option>'+
                    '<option value="10">10</option>'+
                    '</select>'
                }
            })
        });
    </script>
</body>
</html>