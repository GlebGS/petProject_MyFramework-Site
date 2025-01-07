<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->meta["title"]; ?></title>
    <meta name="description" content="админка">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="/css/style_menuAdmin.css">
</head>
<body>
    <div class="container">

        <header class="dashboard-header">
            <h1 class="dashboard-header__logo">Панель администратора</h1>
        </header>

        <nav class="sidebar-menu">
            <ul class="sidebar-menu__items">
                <hr>
                <li class="sidebar-menu__item">
                    <a href="#" class="sidebar-menu__item-title">
                        <p>Пользователи</p>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <hr>
                    <ul class="sidebar-menu__subitems">
                        <li class="sidebar-menu__subitem">
                            <a href="/section.html">
                                <i class="fas fa-list-ul"></i>
                                <span>Добавить</span>
                            </a>
                        </li>
                        <li class="sidebar-menu__subitem">
                            <a href="/subsection.html">
                                <i class="fas fa-stream"></i>
                                <span>Редактировать</span>
                            </a>
                        </li>
                        <li class="sidebar-menu__subitem">
                            <a href="#">
                                <i class="fas fa-edit"></i>
                                <span>Удалить</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
                <li class="sidebar-menu__item">
                    <a href="/out" class="sidebar-menu__item-title">
                        <span>Выйти</span>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <hr>
                </li>
            </ul>
        </nav>

        <main class="main-content">

        </main>

    </div>
</body>
</html>