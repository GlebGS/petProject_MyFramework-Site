<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->meta["title"]; ?></title>
    <meta name="description" content="админка">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/admin/menu" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Панель администратора</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/users" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Главная</span>
                            </a>
                        </li>
                        <li>
                            <a href="/create" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Добавить пользователя</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <a href="/profile" class="d-flex align-items-center text-white text-decoration-none">
                        <img src="<?= $this->meta[1][0]["avatar"]; ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-3"><?= $this->meta[1][0]["name"]; ?></span>
                    </a>
                    <div class="dropdown pb-4"></div>
                    <ul class="nav nav-pills flex-column mb-sm-4 mb-0 align-items-center align-items-sm-start">
                        <li class="nav-item">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Онлайн: <?= $data[0][0]["count"]; ?></span>
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
                                        <table class="table user-list">
                                            <thead>
                                                <tr>
                                                    <th><span>№</span></th>
                                                    <th><span>Пользователь</span></th>
                                                    <th><span>Телефон</span></th>
                                                    <th><span>Email</span></th>
                                                    <th class="text-center"><span>Статус</span></th>
                                                    <th><span>Дата регистрации</span></th>
                                                    <th><span>&ensp;</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $this->printAdminUsers(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>