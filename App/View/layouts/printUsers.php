<?php foreach ($this->meta[1] as $user): ?>
    <div class="col-xl-4">
        <div id="c_<?= $user["id"]; ?>" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="<?= $user["name"]; ?>">
            <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                <div class="d-flex flex-row align-items-center">
                    <span class="status status-<?= $user["status"]; ?> mr-3">
                        <span class="rounded-circle profile-image d-block " style="background-image:url('<?= $user["avatar"]; ?>'); background-size: cover;"></span>
                    </span>
                    <div class="info-card-text flex-1">
                        <a href="javascript:void(<?= $user["id"]; ?>);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                            <?= $user["name"]; ?>
                            <i class="fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/edit?id=<?= $user["id"]; ?>">
                                <i class="fa fa-edit"></i>
                                Редактировать</a>
                            <a class="dropdown-item" href="/security?id=<?= $user["id"]; ?>">
                                <i class="fa fa-lock"></i>
                                Безопасность</a>
                            <a class="dropdown-item" href="/status?id=<?= $user["id"]; ?>">
                                <i class="fa fa-sun"></i>
                                Установить статус</a>
                            <a class="dropdown-item" href="/edit_avatar?id=<?= $user["id"]; ?>">
                                <i class="fa fa-camera"></i>
                                Загрузить аватар
                            </a>
                        </div>
                        <span class="text-truncate text-truncate-xl"><?= $user["work"]; ?></span>
                    </div>
                    <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_<?= $user["id"]; ?> > .card-body + .card-body" aria-expanded="false">
                        <span class="collapsed-hidden">+</span>
                        <span class="collapsed-reveal">-</span>
                    </button>
                </div>
            </div>
            <div class="card-body p-0 collapse show">
                <div class="p-3">
                    <label class="mt-1 d-block fs-sm fw-400 text-dark"><i class="fas fa-mobile-alt text-muted mr-2"></i> <?= $user["phone"]; ?></label>
                    <label class="mt-1 d-block fs-sm fw-400 text-dark"><i class="fas fa-mouse-pointer text-muted mr-2"></i> <?= $user["email"]; ?></>
                    <address class="fs-sm fw-400 mt-4 text-muted"><i class="fas fa-map-pin mr-2"></i> <?= $user["address"]; ?></address>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($this->meta[0] as $user): ?>
    <div class="col-xl-4">
        <div id="c_<?= $user["id"]; ?>" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="<?= $user["name"]; ?>">
            <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                <div class="d-flex flex-row align-items-center">
                    <span class="status status-<?= $user["status"]; ?> mr-3">
                        <span class="rounded-circle profile-image d-block " style="background-image:url('<?= $user["avatar"]; ?>'); background-size: cover;"></span>
                    </span>
                    <div class="info-card-text flex-1">
                        <label style="font-size: 16px;">
                            <?= $user["name"]; ?>
                        </label>
                        <span class="text-truncate text-truncate-xl"><label><?= $user["work"]; ?></label></span>
                    </div>
                    <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_<?= $user["id"]; ?> > .card-body + .card-body" aria-expanded="false">
                        <span class="collapsed-hidden">+</span>
                        <span class="collapsed-reveal">-</span>
                    </button>
                </div>
            </div>
            <div class="card-body p-0 collapse show">
                <div class="p-3">
                    <label class="mt-1 d-block fs-sm fw-400 text-dark"><i class="fas fa-mobile-alt text-muted mr-2"></i> <?= $user["phone"]; ?></label>
                    <?php if($_SESSION["userROLE"] == "admin"): ?>
                        <a href="mailto:<?= $user["email"]; ?> class="mt-1 d-block fs-sm fw-400 text-dark"><i class="fas fa-mouse-pointer text-muted mr-2"></i> <?= $user["email"]; ?></a>
                    <?php else: ?>
                        <label class="mt-1 d-block fs-sm fw-400 text-dark"><i class="fas fa-mouse-pointer text-muted mr-2"></i> <?= $user["email"]; ?></label>
                    <?php endif; ?>
                    <address class="fs-sm fw-400 mt-4 text-muted"><i class="fas fa-map-pin mr-2"></i><label><?= $user["address"]; ?></label></address>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>