<?php require LAYOUT . "/header.php"; ?>

<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> Редактировать
        </h1>
    </div>
    
    <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger text-dark" role="alert">
            <?php echo $_SESSION["error"];
            unset($_SESSION["error"]); ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION["true"])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["true"];
            unset($_SESSION["true"]); ?>
        </div>
    <?php endif; ?>

    <form action="/auth_edit?id=<?= $this->meta[1][0]["id"]; ?>" method="post">
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>Общая информация</h2>
                        </div>
                        <div class="panel-content">

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Имя</label>
                                <input type="text" name="name" id="simpleinput" class="form-control" value="<?= $this->meta[1][0]["name"]; ?>">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Место работы</label>
                                <input type="text" name="work" id="simpleinput" class="form-control" value="<?= $this->meta[1][0]["work"]; ?>">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Номер телефона</label>
                                <input type="text" name="phone" id="simpleinput" class="phone form-control" value="<?= $this->meta[1][0]["phone"]; ?>">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Адрес</label>
                                <input type="text" name="address" id="simpleinput" class="form-control" value="<?= $this->meta[1][0]["address"]; ?>">
                            </div>

                            <?php if ($_SESSION["userROLE"] == "admin"): ?>
                                <div class="form-group">
                                    <label class="form-label" for="example-select">Изменить права. <br>Текущая роль: <?= $this->meta[1][0]["role"]; ?></label>
                                    <select class="form-control" name="role" id="example-select">
                                        <option value="user" <?php if ($this->meta[1][0]["role"] == "user") echo "selected"; ?>>Пользователь</option>
                                        <option value="admin" <?php if ($this->meta[1][0]["role"] == "admin") echo "selected"; ?>>Админ</option>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <a class="dropdown-item" href="/status?id=<?= $this->meta[1][0]["id"]; ?>">
                                <i class="fa fa-sun"></i>
                                Изменить статус</a>
                            <a class="dropdown-item" href="/edit_avatar?id=<?= $this->meta[1][0]["id"]; ?>">
                                <i class="fa fa-camera"></i>
                                Изменить аватар
                            </a>

                            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                <button class="btn btn-warning">Редактировать</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $(".phone").mask("+7(999)999-9999");
    $(document).ready(function() {

        $('input[type=radio][name=contactview]').change(function() {
            if (this.value == 'grid') {
                $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                $('#js-contacts .js-expand-btn').addClass('d-none');
                $('#js-contacts .card-body + .card-body').addClass('show');

            } else if (this.value == 'table') {
                $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                $('#js-contacts .js-expand-btn').removeClass('d-none');
                $('#js-contacts .card-body + .card-body').removeClass('show');
            }

        });

        //initialize filter
        initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
    });
</script>
</body>

</html>