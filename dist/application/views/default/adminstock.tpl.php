<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <script type="text/javascript" src="<?php echo HTTP_PATH ?>ckeditor/ckeditor.js"></script>
    <title><?php echo $this->adminH1; ?></title>
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
            <li class="breadcrumb-item active" aria-current="page"><?php echo $this->adminH1; ?>
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

            <form method="post" action="/adminstock/<?php echo $this->action; ?>/" id="artForm" enctype="multipart/form-data">


                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#tabs-1" class="nav-link active"
                           role="tab" data-toggle="tab"
                           aria-controls="tabs-1"
                           aria-selected="true">Основное</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-2" class="nav-link"
                           role="tab" data-toggle="tab" data-toggle="tab"
                           aria-controls="tabs-2"
                           aria-selected="false">SEO</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="tabs-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="tabs-1-tab">
                        <div class="row my-3">
                            <div class="col-md-9">

                                Имя: <br />
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Darina</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $this->name ?>" name='name' placeholder="Имя" aria-label="Имя пользователя" aria-describedby="basic-addon1">
                                </div>

                                Анонс (отображается только в меню): <br />
                                <input class="form-control" type="text" value="<?php echo $this->anons ?>" name='anons'>
                                <br>
                                Заголовок (H1): <br />
                                <input class="form-control" type="text" value="<?php echo $this->h1 ?>" name='h1'>
                                <br>
                                Подзаголовок: <br />
                                <input class="form-control" type="text" value="<?php echo $this->h2 ?>" name='h2'>
                                <br>
                                Текст
                                <br>
                                <textarea id="editor1" class="form-control" name="text"><?php echo $this->text ?></textarea>
                                <script type='text/javascript'>
                                    CKEDITOR.replace( 'editor1', {toolbar : 'MyToolbar'} );
                                </script>
                                <br>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-2 box-shadow">
                                    <?php if(!empty($this->img)) : ?>
                                        <img class="card-img-top"
                                             src="/images/<?php echo $this->img; ?>"
                                             alt="">
                                        <?php if($this->img != 'DarinaDefault.jpg') : ?>
                                        <div class="ml-auto"><a title='Удалить это фото?' href='/adminstock/delillustration/url/<?php echo $this->url ?>/' onclick="return confirm('Удалить фото?');"><i class="fas fa-times text-danger mr-2" aria-hidden="true"></i></a></div>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <input id="photo" name="photo" class="form-control form-control-sm border-0" type="file"/>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="tabs-2" class="tab-pane fade" role="tabpanel" aria-labelledby="tabs-2-tab">
                        Url: <br />
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo HTTP_PATH ?>stock/</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $this->url ?>" name="url">
                            <div class="input-group-append">
                                <span class="input-group-text">.html</span>
                            </div>
                        </div>
                        <br />
                        Title: <br /><input class="form-control" type="text" value="<?php echo $this->title ?>" name="title"><br />
                        Keywords: <br /><textarea class="form-control" name="keywords"><?php echo $this->keywords ?></textarea><br />
                        Description: <br /><textarea class="form-control" name="seo_desc"><?php echo $this->seo_desc ?></textarea><br /><br />
                        <input type="hidden" value="<?php echo $this->id ?>" name='id'>
                        <input type="hidden" value="<?php echo $this->img ?>" name='img'>
                        <input type="hidden" value="<?php echo $this->url ?>" name='oldurl'>
                    </div>
                </div>



                <div class="contact-message my-3 text-danger"></div>
                <input class="btn btn-primary btn-add" type="submit" value="Отправить">


            </form>



    </div>

</section>
<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>