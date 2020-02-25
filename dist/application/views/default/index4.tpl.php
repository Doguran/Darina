<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <title>Darina</title>
</head>
<body>
<?php include("blocks/header.tpl.php"); ?>
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
        </div>
    </div>
</div>
<div class="container-fluid bg-light">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb bg-light">
            <li class="breadcrumb-item"><a href="#">Главнвя</a></li>
            <li class="breadcrumb-item active" aria-current="page">Блог</li>
        </ol>
    </nav>
</div>
<section>
    <div class="container">
        <div class="row row-blog">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div style="position: relative">
                        <img src="<?php echo TEMPLATE_PATH ?>img/epdm.jpg"
                             class="card-img-top" alt="...">
                        <div class="blog_item_date">
                            <p>15</p>
                            <p>ФЕВ</p>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <h5 class="card-title">Название статьи</h5>
                        <p class="card-text">This is a wider card with
                            supporting text below as a natural lead-in to
                            additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text"><a href="#">Далее...</a></p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div style="position: relative">
                        <img src="<?php echo TEMPLATE_PATH ?>img/track3.jpg"
                             class="card-img-top" alt="...">
                        <div class="blog_item_date">
                            <p>15</p>
                            <p>ФЕВ</p>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <h5 class="card-title">Название статьи</h5>
                        <p class="card-text">This is a wider card with
                            supporting text below as a natural lead-in to
                            additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text"><a href="#">Далее...</a></p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div style="position: relative">
                        <img src="<?php echo TEMPLATE_PATH ?>img/IMG-20190628-WA0011a.jpg"
                             class="card-img-top" alt="...">
                        <div class="blog_item_date">
                            <p>15</p>
                            <p>ФЕВ</p>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <h5 class="card-title">Название статьи</h5>
                        <p class="card-text">This is a wider card with
                            supporting text below as a natural lead-in to
                            additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text"><a href="#">Далее...</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Последние новости</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>