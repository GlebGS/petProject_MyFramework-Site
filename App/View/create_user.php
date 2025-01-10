<?php require LAYOUT . "/header.php"; ?>

<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> Добавить пользователя
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

    <form action="/auth_create" method="post" enctype="multipart/form-data">
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
                                <input type="text" name="name" id="simpleinput" class="form-control">
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Место работы</label>
                                <input type="text" name="work" id=" simpleinput" class="form-control">
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Номер телефона</label>
                                <input type="text" name="phone" id="simpleinput" class="form-control">
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Адрес</label>
                                <input type="text" name="address" id="simpleinput" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>Безопасность и Медиа</h2>
                        </div>
                        <div class="panel-content">

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Email</label>
                                <input type="text" name="email" id="simpleinput" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Пароль</label>
                                <input type="password" name="password" id="simpleinput" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="example-select">Выберите статус</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="success">Онлайн</option>
                                    <option value="warning">Отошел</option>
                                    <option value="danger">Не беспокоить</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="example-fileinput">Загрузить аватар</label>
                                <input type="file" name="file" id="example-fileinput" class="form-control-file">
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                <button class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>
</main>

<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script>
    $(document).ready(function() {


    });
</script>
</body>

</html>