<footer class="footer">
    <div class="footer_top_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="<?php echo TEMPLATE_PATH ?>img/logo-footer.png"
                                     alt="">
                            </a>
                        </div>
                        <p>
                            <?php echo $_SESSION["contact"]["footer"]; ?>
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Меню
                        </h3>
                        <ul>
                            <li><a href="#">Главная</a></li>
                            <li><a href="#">Ассортимент</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li><a href="#">Блог</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Продукция
                        </h3>
                        <ul>
                            <?php if(isset($_SESSION["stocks"])): ?>
                                <?php foreach ($_SESSION["stocks"] as $val) : ?>
                                    <li><a href="/stock/<?php echo $val["url"]; ?>.html"><?php echo $val["h1"]; ?></a></li>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Адрес
                        </h3>
                        <ul>
                            <li><?php echo $_SESSION["contact"]["address"]; ?></li>
                            <li><a href="tel:<?php echo Helper::telLink($_SESSION["contact"]["phone1"]) ?>"><?php echo $_SESSION["contact"]["phone1"]; ?></a></li>
                            <li><a href="mailto:<?php echo $_SESSION["contact"]["email"]; ?>"><?php echo $_SESSION["contact"]["email"]; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | Made with <i class="fas fa-heart"
                                                           aria-hidden="true"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>