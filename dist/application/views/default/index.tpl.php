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
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 text-right">
                <p class="pr-3 my-0"> <i class="fas fa-phone"></i> 212-85-06</p>
            </div>
        </div>
    </div>
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

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://placehold.it/1800x700" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="http://placehold.it/1800x700" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="http://placehold.it/1800x700" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>