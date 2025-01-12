<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th><span>№</span></th>
            <th><span>Пользователь</span></th>
            <th><span>Права</span></th>
            <th><span>Телефон</span></th>
            <th><span>Email</span></th>
            <th class="text-center"><span>Статус</span></th>
            <th><span>Дата регистрации</span></th>
            <th><span>&ensp;</span></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($this->meta[0] as $user): ?>

            <?php
            switch ($user["status"]) {
                case "danger":
                    $user["status"] = "Не беспокоить";
                    break;
                case "warning":
                    $user["status"] = "Отошёл";
                    break;
                case "success":
                    $user["status"] = "Онлайн";
                    break;
                default:
                    $user["status"] = "Не беспокоить";
                    break;
            }
            ?>

            <tr>
                <td>
                    <span class="user-subhead"><?= $user["id"]; ?></span>
                </td>
                <td>
                    <img style="width: 30px;" class="rounded-circle" src="<?= $user["avatar"]; ?>" alt="">
                    <span class="user-subhead"><?= $user["name"]; ?></span>
                </td>

                <td>
                    <span> <?= $user["role"]; ?></span>
                </td>

                <td>
                    <span> <?= $user["phone"]; ?></span>
                </td>

                <td>
                    <a href="#"><?= $user["email"]; ?></a>
                </td>

                <td class="text-center">
                    <span class="label label-default"><?= $user["status"]; ?></span>
                </td>
                <td>
                    <?= $user["date"]; ?>
                </td>
                <td style="width: 20%;">
                    <a href="/profile?id=<?= $user["id"]; ?>" class="table-link text-warning">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="/edit?id=<?= $user["id"]; ?>" class="table-link text-info">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="/delete?id=<?= $user["id"]; ?>" class="table-link danger" onclick="return confirm('Вы уверены что хотите удалить пользователя?');">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
    <tfoot>
        <tr>
            <th><span>№</span></th>
            <th><span>Пользователь</span></th>
            <th><span>Права</span></th>
            <th><span>Телефон</span></th>
            <th><span>Email</span></th>
            <th class="text-center"><span>Статус</span></th>
            <th><span>Дата регистрации</span></th>
            <th><span>&ensp;</span></th>
        </tr>
    </tfoot>
</table>