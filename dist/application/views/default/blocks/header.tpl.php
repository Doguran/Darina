<!-- Yandex.Metrika counter -->
<script>
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(52212253, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/52212253" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<header>
    <div class="header-area ">
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
						<!--noindex-->
                            <a rel="nofollow" href="https://www.youtube.com/channel/UCYiFiUpcM6xg0q_AlwBqP9w">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a rel="nofollow" href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a rel="nofollow" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
						<!--/noindex-->
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
                        <div class="col-xl-2 col-lg-1">
                            <div class="logo">
                                <a href="/">
                                    <img src="<?php echo TEMPLATE_PATH ?>img/logo-white2.png"
                                         alt="Дарина - материалы для покрытия детских и спортивных площадок" title="Дарина - материалы для покрытия детских и спортивных площадок" />
                                </a>
                            </div>
							<div class="header-fixed-phone mobile"><a href="tel:<?php echo Helper::telLink($_SESSION["contact"]["phone1"]) ?>"><i class="fa fa-phone"></i><?php echo $_SESSION["contact"]["phone1"]; ?></a></div>
                        </div>
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active"
                                               href="/">Главная</a></li>
                                        <li><a href="#">Ассортимент <i
                                                        class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <?php if(isset($this->stocks)): ?>
                                                <?php foreach ($this->stocks as $val) : ?>
                                                        <li><a href="/stock/<?php echo $val["url"]; ?>.html"><?php echo $val["h1"]; ?></a></li>
                                                <?php endforeach; ?>
                                                <?php endif ?>
                                            </ul>
                                        </li>
                                        <li><a href="/contact/">Контакты</a></li>
                                        <li><a href="/blog/1/">Блог</a></li>
                                        <?php if (isset($_SESSION["user"])) : ?>
                                            <li><a href="/auth/logout/?url=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>">Выход</a></li>
                                        <?php else : ?>
                                            <li><a href="#" id="auth_modal">Вход</a></li>
                                        <?php endif ?>
                                    </ul>
                                </nav>
                            </div>
							<div class="header-fixed-phone desktop"><a href="tel:<?php echo Helper::telLink($_SESSION["contact"]["phone1"]) ?>"><i class="fa fa-phone"></i><?php echo $_SESSION["contact"]["phone1"]; ?></a></div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="search_button">
                                    <a href="#" data-toggle="modal" data-target="#mySearch">
                                        <i class="ti-search"></i>
                                    </a>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form call" href="#">Позвоните
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
<!-- Modal -->
<div class="modal fade" id="mySearch" tabindex="-1" role="dialog" aria-labelledby="mySearchLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySearchLabel">Поиск по сайту</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="get" action="/search/" enctype='text/plain' role="search">

                    <div class="input-group mb-3">
                        <input class="form-control" name="s" id="navbarInput-01" type="search" placeholder="поисковый запрос">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Найти</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>