<header>
    <div class="header-area ">
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
                            <a href="#">
                                <i class="fab fa-vk"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i>info@darina.com.ru</a></li>
                                <li><a href="tel:<?php echo Helper::telLink($_SESSION["contact"]["phone1"]) ?>"><i class="fa fa-phone"></i><?php echo $_SESSION["contact"]["phone1"]; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="header_bottom_border-page">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="<?php echo TEMPLATE_PATH ?>img/logo-white2.png"
                                         alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active"
                                               href="/">Главная</a></li>
                                        <li><a href="#">Ассортимент <i
                                                        class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <?php if(isset($_SESSION["stocks"])): ?>
                                                <?php foreach ($_SESSION["stocks"] as $val) : ?>
                                                        <li><a href="/stock/<?php echo $val["url"]; ?>.html"><?php echo $val["h1"]; ?></a></li>
                                                <?php endforeach; ?>
                                                <?php endif ?>
                                            </ul>
                                        </li>
                                        <li><a href="/">Контакты</a></li>
                                        <li><a href="/blog/1/">Блог</a></li>
                                        <?php if (isset($_SESSION["user"])) : ?>
                                            <li><a href="/auth/logout/?url=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>">Выход</a></li>
                                        <?php else : ?>
                                            <li><a href="#" id="auth_modal">Вход</a></li>
                                        <?php endif ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="search_button">
                                    <a href="#">
                                        <i class="ti-search"></i>
                                    </a>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#">Позвоните
                                        мне!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>