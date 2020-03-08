<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <title><?php echo $this->h1; ?></title>
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
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $this->h1; ?>
            </li>
        </ol>
    </nav>
</div>
<section>

    <div class="container">

        <?php if(isset($_GET["er"])) $this->er = $_GET["er"] ?>
        <?php if(!empty($this->er)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->er; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

            <form method="post" action="/admin<?php echo $this->controller; ?>/insert/" id="artForm" enctype="multipart/form-data">

                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="photo">Загрузка файла</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Оправить</button>
                    </div>
                </div>


            </form>

        <div class="row mt-5">
            <?php if(isset($this->images) and !empty($this->images)): ?>
                <?php foreach ($this->images as $val): ?>

                        <div class="col-md-3 mt-3 d-flex justify-content-center admin-img">
                            <a data-fancybox="comment"
                               href="/images/<?php echo $val["img"]; ?>"><img
                                        src="/images/sm-<?php echo $val["img"]; ?>"
                                        alt="" class="img-fluid"></a>
                            <div class="admin-link-table del"><a
                                        href="/admin<?php echo $this->controller; ?>/delete/id/<?php echo $val["id"]; ?>/"
                                        onclick="return confirm('Действительно удалить?');"><i
                                            class="fas fa-times fa-lg"></i></a></div>
                        </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>



    </div>

</section>
<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function() {
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
});
</script>
</body>
</html>