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



                <?php if(isset($this->article_all_list)): ?>



                        <?php foreach ($this->article_all_list as $val) : ?>

                        <div class="card mb-3">
                            <div style="position: relative">
                                <img src="<?php echo TEMPLATE_PATH ?>img/<?php echo $val["img"] ?>"
                                     class="card-img-top" alt="<?php echo $val["h1"] ?>">
                                <div class="blog_item_date">
                                    <p><?php echo $val["date_d"] ?></p>
                                    <p><?php echo $val["date_m"] ?></p>
                                </div>
                            </div>
                            <div class="card-body mt-4">
                                <a href="/blog/<?php echo $val["url"] ?>.html"><h5 class="card-title"><?php echo $val["h1"] ?></h5></a>
                                <p class="card-text anons"><?php echo strip_tags($val["text"]); ?></p>
                                <p class="card-text"><a href="/blog/<?php echo $val["url"] ?>.html">Далее...</a></p>
                            </div>
                        </div>

                        <?php endforeach; ?>



                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->paginator ?>
                        </div>
                    </div>

                <?php endif ?>


            </div>
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Последние новости</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($this->last_posts as $val) : ?>
                            <li class="list-group-item"><a href="/blog/<?php echo $val["url"] ?>.html"><?php echo $val["h1"] ?></a></li>
                        <?php endforeach; ?>
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