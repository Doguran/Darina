<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <title>Поиск</title>
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
            <li class="breadcrumb-item active" aria-current="page">Поиск</li>
        </ol>
    </nav>
</div>

    <div class="container">

                <h1 class="my-5 text-center"><?php echo $this->title_content; ?></h1>

        <div class="row justify-content-center">
            <?php if(is_array($this->content)): ?>
            <?php foreach ($this->content as $val) : ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card mb-4 bg-light">
                            <img class="card-img-top"
                                 src="/images/<?php echo $val["img"]; ?>"
                                 alt="<?php echo $val["h1"]; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $val["h1"]; ?></h5>
                                <p class="card-text"><?php echo strip_tags($val["text"]); ?></p>
                                <a href="/<?php echo $val["t"] ?>/<?php echo $val["url"]; ?>.html"
                                   class="btn btn-outline-primary btn-sm">Перейти</a>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
            <?php else: ?>

                <?php echo $this->content; ?>

            <?php endif; ?>


        </div>
    </div>

<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>