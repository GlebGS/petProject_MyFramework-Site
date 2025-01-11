<?php require LAYOUT . "/header.php"; ?>

<main id="js-page-content" role="main" class="page-content mt-3">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-user'></i> Иван Иванов
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-6 m-auto">
            <div class="card mb-g rounded-top">
                <div class="row no-gutters row-grid">
                    <div class="col-12">
                        <div class="d-flex flex-column align-items-center justify-content-center p-4">
                            <img src="<?= $this->meta[1][0]["avatar"]; ?>" class="rounded-circle shadow-2 img-thumbnail" alt="">
                            <h5 class="mb-0 fw-700 text-center mt-3">
                                <?= $this->meta[1][0]["name"]; ?>
                                <small class="text-muted mb-0"><?= $this->meta[1][0]["work"]; ?></small>
                            </h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 text-center">
                            <a href="<?= $this->meta[1][0]["phone"]; ?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mobile-alt text-muted mr-2"></i> <?= $this->meta[1][0]["phone"]; ?></a>
                            <a href="<?= $this->meta[1][0]["email"]; ?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                <i class="fas fa-mouse-pointer text-muted mr-2"></i> <?= $this->meta[1][0]["email"]; ?></a>
                            <address class="fs-sm fw-400 mt-4 text-muted">
                                <i class="fas fa-map-pin mr-2"></i> <?= $this->meta[1][0]["address"]; ?>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script>
    $(document).ready(function() {

    });
</script>

</html>