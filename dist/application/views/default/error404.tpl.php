<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <title>404</title>
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
            <li class="breadcrumb-item active" aria-current="page">404</li>
        </ol>
    </nav>
</div>

    <div class="container">

                <h1 class="my-5 text-center"><?php echo $this->h1; ?></h1>


    </div>

<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>