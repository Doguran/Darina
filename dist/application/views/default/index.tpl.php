<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-white navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="<?php echo TEMPLATE_PATH ?>img/logo.png"
                     height="70" alt="">
            </a>

            <div class="order-lg-3">
                <a class="nav-link text-success" href="/cart/show/"><i
                            class="fas fa-shopping-cart cart"></i> <span
                            class="badge badge-secondary cart-counter">0</span></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/txt/delivery/">Доставка и
                            оплата</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/txt/contact/">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal"
                           data-target="#mySearch">Поиск</a>
                    </li>
                    <li class="nav-item"><a title="Вход" href="#"
                                            class="nav-link"
                                            id="auth_modal">Вход</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                           id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><i
                                    class="fas fa-bars"></i></a>
                        <div class="dropdown-menu"
                             aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/txt/price/">Прайс-листы</a>
                            <a class="dropdown-item" href="/txt/catalog/">Каталог</a>
                            <a class="dropdown-item" href="/txt/instructions/">Инструкции</a>
                            <a class="dropdown-item" href="/txt/detalirovka/">Деталировка</a>
                            <a class="dropdown-item"
                               href="/txt/news/">Новости</a>
                            <a class="dropdown-item"
                               href="/article/show/page/1/">Статьи</a>
                            <a class="dropdown-item"
                               href="http://www.youtube.com/user/IPCPortotecnica1"
                               target="_blank">Portotecnica TV </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>