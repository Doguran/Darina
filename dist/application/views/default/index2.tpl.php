<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <meta name="description" content="<?php echo $this->seo_desc; ?>">
    <meta name="keywords" content="<?php echo $this->keywords; ?>">
    <title><?php echo $this->title; ?></title>
</head>
<body class="main-page">
<?php include("blocks/header.tpl.php"); ?>
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="slider_text">
                            <h3> <?php echo $this->h1; ?> </h3>
                            <div class="video_service_btn">
                                <a href="/stock/<?php echo $_SESSION["stocks"][0]['url']; ?>.html" class="boxed-btn3">Полный
                                    ассортимент и цены</a>
                                <a href="/stock/<?php echo $_SESSION["stocks"][0]['url']; ?>.html" class="boxed-btn3-white"> <i
                                            class="fa fa-play"></i>
                                    Узнать больше</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 offset-lg-1 d-none d-md-block">
                        <div class="form-slide">
                            <div class="formwrapper">
                                <div class="form-text">
                                    <div class="form-title lead mb-2">Бесплатная
                                        консультация и составление сметы
                                    </div>
                                    <div class="form-desc">Наши менеджеры
                                        ответят вам в ближайшее время
                                    </div>
                                </div>
                                <form action="#">
                                    <input class="form-control my-3" type="text"
                                           placeholder="Имя">
                                    <input class="form-control my-2" type="text"
                                           placeholder="Телефон">
                                    <button type="submit"
                                            class="btn btn-primary my-2 w-100">
                                        Отправить заявку
                                    </button>
                                </form>
                            </div>
                            <div class="bg-form rounded-sm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->
<section class="portfolio" id="portfolio">
    <div class="container mb-5">
        <h2 class="text-center text-uppercase my-5">Почему именно мы</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto w-100 text-black">
                    <i class="fas fa-ruble-sign fa-5x"></i>
                </div>
                <div class="my-5">
                    <h5 class="text-primary">Бесспорно низкие цены </h5>
                    <p>Мы готовы предложить вам лучшие условия</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto w-100 text-black">
                    <i class="fas fa-award fa-5x"></i>
                </div>
                <div class="my-5">
                    <h5 class="text-primary">Гарантия</h5>
                    <p>Мы гарантируем качество наших материалов</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto w-100 text-black">
                    <i class="fas fa-calendar-check fa-5x"></i>
                </div>
                <div class="my-5">
                    <h5 class="text-primary"> Соблюдение сроков</h5>
                    <p>Мы всегда соблюдаем скроки поставок</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container promotext">
        <h2 class="text-center"><?php echo $this->h2; ?></h2>
        <div class="row my-5">
            <div class="col-md-6">
                <?php echo $this->text; ?>
            </div>
            <div class="col-md-6">
                <div class="blockimg1"
                     style="background-image: url(<?php echo HTTP_PATH ?>images/IMG_20180830_173026_resized_20190226_100754364.jpg)">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="blockimg2"
                     style="background-image: url(<?php echo HTTP_PATH ?>images/5.jpg)">
                </div>
            </div>
            <div class="col-md-6">
                <?php echo $this->text2; ?>
                <?php if(ADMIN):?>
                    <a href="/adminedittext/main/" class="btn btn-primary">Редактировать страницу</a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<section class="portfolio background-track">
    <div class="container">
        <h2 class="text-center text-uppercase my-5">Рады предложить</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto w-100 text-black">
                    <i class="fas fa-running fa-5x"></i>
                </div>
                <p>Резиновые гранулы для легкой атлетики</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto w-100 text-black">
                    <i class="fas fa-dumbbell fa-5x"></i>
                </div>
                <p>Резиновые гранулы для ударопоглощающих защитных
                    поверхностей</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto w-100 text-black">
                    <i class="fas fa-basketball-ball fa-5x"></i>
                </div>
                <p>Резиновые гранулы для многоцелевых игровых площадок</p>
            </div>
        </div>
    </div>
</section>
<section class="mt-5">
    <div class="container">
        <?php //Helper::print_arr($_SESSION["stocks"][0]);?>
        <div class="row justify-content-center">
            <?php if(isset($_SESSION["stocks"])): ?>
                <?php foreach ($_SESSION["stocks"] as $val) : ?>
                    <div class="col-md-6 col-lg-3 card-div">
                        <div class="card mb-4 text-white bg-dark">
                            <img class="card-img-top"
                                 src="/images/<?php echo $val["img"]; ?>"
                                 alt="<?php echo $val["h1"]; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><span>Darina</span><?php echo $val["name"]; ?></h5>
                                <p class="card-text"><?php echo $val["anons"]; ?></p>
                                <a href="/stock/<?php echo $val["url"]; ?>.html"
                                   class="btn btn-outline-light btn-sm">Перейти</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>

        </div>
    </div>
</section>
<section class="mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="masonry">
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20190902-WA0008.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20190902-WA0008.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20190723-WA0005.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20190723-WA0005.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20190611-WA0003.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20190611-WA0003.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20190110-WA0011.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20190110-WA0011.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20180810-WA0002.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20180810-WA0002.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20180819-WA0000.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20180819-WA0000.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20180819-WA0005.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20180819-WA0005.jpg"
                                alt="alt"></a></div>
                <div class="item"><a data-fancybox="gallery"
                                     href="<?php echo HTTP_PATH ?>images/IMG-20180819-WA0003.jpg"><img
                                src="<?php echo HTTP_PATH ?>images/JPEG/IMG-20180819-WA0003.jpg"
                                alt="alt"></a></div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="container my-5 py-5 comment">
        <h2 class="text-center text-uppercase mb-5">Нас рекомендуют</h2>
        <div class="slick">
            <?php if(isset($this->review) and !empty($this->review)): ?>
                <?php foreach ($this->review as $val): ?>
                        <div class="review">
                            <div class="col d-flex justify-content-center">
                                <a data-fancybox="comment"
                                   href="/images/<?php echo $val["img"]; ?>"><img
                                            src="/images/sm-<?php echo $val["img"]; ?>"
                                            alt=""></a>
                            </div>
                        </div>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
        <?php if(ADMIN):?>
        <div class="text-center mt-5">
            <a href="/adminreview/" class="btn btn-primary">добавить/удалить</a>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function () {
        (function ($) {
            $.fn.visible = function () {
                return this.each(function () {
                    $(this).css("visibility", "visible");
                });
            };
        }(jQuery));
        $(".slider_text").show().addClass("effect3");
        $(".form-slide").show().addClass("effect4");
        $(window).scroll(function () {
            if ($(this).scrollTop() > 400) {
                $("#portfolio").visible().addClass("effect2");
            }
            if ($(this).scrollTop() > 800) {
                $(".promotext").visible().addClass("effect2");
            }
            if ($(this).scrollTop() > 2000) {
                $(".background-track").visible().addClass("effect2");
            }
            if ($(this).scrollTop() > 2500) {
                $(".card-div:nth-child(1), .card-div:nth-child(2)").visible().addClass("effect3");
                $(".card-div:nth-child(3), .card-div:nth-child(4)").visible().addClass("effect4");
            }
            if ($(this).scrollTop() > 3100) {
                $(".card-div:nth-child(5)").visible().addClass("effect3");
                $(".card-div:nth-child(6)").visible().addClass("effect2");
                $(".card-div:nth-child(7)").visible().addClass("effect4");
                $(".card-div:nth-child(n+8)").visible().addClass("effect4");
            }
            if ($(this).scrollTop() > 3700) {
                $(".masonry").visible().addClass("effect2");
            }
            if ($(this).scrollTop() > 4300) {
                $(".comment").visible().addClass("effect2");
            }
            if ($(this).scrollTop() > 5100) {
                $(".footer_top_page .container").visible().addClass("effect1");
            }
        });
    });
</script>
</body>
</html>