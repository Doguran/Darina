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
            <li class="breadcrumb-item"><a href="/">Главнвя</a></li>
            <li class="breadcrumb-item"><a href="#">Ассортимент</a></li>
            <li class="breadcrumb-item active" aria-current="page">Darina<?php echo $this->name; ?></li>
        </ol>
    </nav>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <?php if(ADMIN): ?>
                <a href="/adminstock/add/" class="btn btn-primary w-100 mb-3">Добавить</a>
                <?php endif ?>
                <?php if(isset($_SESSION["stocks"])): ?>
                <?php foreach ($_SESSION["stocks"] as $val) : ?>
                    <?php if($val["id"] == $this->id) : ?>

                            <div class="card mb-3 left-menu bg-primary text-white">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                        <div class="blockimg-menu"
                                             style="background-image: url(<?php echo HTTP_PATH ?>images/<?php echo $val["img"]; ?>)">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body">

                                                <h5 class="card-title"><span>Darina</span><?php echo $val["name"]; ?>
                                                </h5>
                                                <p class="small"><?php echo $val["anons"]; ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>

                            <div class="card mb-3 left-menu bg-light">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                        <div class="blockimg-menu"
                                             style="background-image: url(/images/<?php echo $val["img"]; ?>)">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <a href="<?php echo HTTP_PATH ?>stock/<?php echo $val["url"]; ?>.html">
                                            <div class="card-body">

                                                <h5 class="card-title"><span>Darina</span><?php echo $val["name"]; ?>
                                                </h5>
                                                <p class="small"><?php echo $val["anons"]; ?></p>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                    <?php endif ?>
                <?php endforeach; ?>
                <?php endif ?>

            </div>
            <div class="col-md-8">
                <?php if(ADMIN):?>
                <div class="bg-light p-3 mb-5">
                    <a href="/adminstock/show/url/<?php echo $this->url; ?>/"><i class="fas fa-edit"></i> Редактировать</a>
                    <a href="/adminstock/delete/url/<?php echo $this->url; ?>/" onclick="return confirm('Действительно удалить?');" class="float-right"><i class="fas fa-times"></i> Удалить</a>
                </div>
                <?php endif;?>
                <p class="text-center"><span>Darina</span><?php echo $this->name; ?></p>
                <h1 class="my-3 text-center"><?php echo $this->h1; ?></h1>
                <h4 class="mt-3 mb-5 text-center"><?php echo $this->h2; ?></h4>
                <?php echo $this->text; ?>
            </div>
        </div>
    </div>
</section>
<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>