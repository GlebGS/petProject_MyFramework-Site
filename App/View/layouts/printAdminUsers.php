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
            <a href="#" class="table-link text-warning">
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="#" class="table-link text-info">
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="#" class="table-link danger">
                <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </td>
    </tr>
<?php endforeach; ?>