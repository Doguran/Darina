<footer class="footer">
    <div class="footer_top_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="<?php echo TEMPLATE_PATH ?>img/logo-footer.png"
                                     alt="Дарина - материалы для покрытия детских и спортивных площадок" title="Дарина - материалы для покрытия детских и спортивных площадок" />
                            </a>
                        </div>
                        <p>
                            <?php echo $_SESSION["contact"]["footer"]; ?>
                        </p>
                        <div class="socail_links">
						<!--noindex-->
                            <ul>
                                <li>
                                    <a rel="nofollow" href="https://www.youtube.com/channel/UCYiFiUpcM6xg0q_AlwBqP9w">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
						<!--/noindex-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Меню
                        </h3>
                        <ul>
                            <li><a href="/">Главная</a></li>
                            <li><span>Ассортимент</span></li>
                            <li><a href="/contact/">Контакты</a></li>
                            <li><a href="/blog/1/">Блог</a></li>
							<li><a href="/sitemap/">Карта сайта</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Продукция
                        </h3>
                        <ul>
                            <?php if(isset($this->stocks)): ?>
                                <?php foreach ($this->stocks as $val) : ?>
                                    <li><a href="/stock/<?php echo $val["url"]; ?>.html">Darina<?php echo $val["name"]; ?></a></li>
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
                    <p class="copy_right text-center">Copyright ©2020 Дарина - материалы для покрытия детских и спортивных площадок</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<link href="<?php echo TEMPLATE_PATH ?>css/custom.css" rel="stylesheet">