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
            <?php if(isset($this->text)): ?>
                <li class="breadcrumb-item"><a href="/blog/1/">Блог</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->h1; ?></li>
            <?php else: ?>
                <li class="breadcrumb-item active" aria-current="page">Блог</li>
            <?php endif ?>
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
                                <img src="/images/<?php echo $val["img"] ?>"
                                     class="card-img-top" alt="<?php echo $val["h1"] ?>">
                                <div class="blog_item_date">
                                    <p><?php echo $val["date_d"] ?></p>
                                    <p><?php echo $val["date_m"] ?></p>
                                </div>

                            </div>
                            <div class="card-body mt-4">
                                <?php if(ADMIN):?>
                                    <div class="bg-light p-3 mb-3">
                                        <a href="/adminblog/show/url/<?php echo $val["url"] ?>/"><i class="fas fa-edit"></i> Редактировать</a>
                                        <a href="/adminblog/delete/url/<?php echo $val["url"] ?>/" onclick="return confirm('Действительно удалить?');" class="float-right"><i class="fas fa-times"></i> Удалить</a>
                                    </div>
                                <?php endif;?>
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

                <?php if(isset($this->text)): ?>
                    <?php if(ADMIN):?>
                        <div class="bg-light p-3">
                            <a href="/adminblog/show/url/<?php echo $this->url; ?>/"><i class="fas fa-edit"></i> Редактировать</a>
                            <a href="/adminblog/delete/url/<?php echo $this->url; ?>/" onclick="return confirm('Действительно удалить?');" class="float-right"><i class="fas fa-times"></i> Удалить</a>
                        </div>
                    <?php endif;?>
                <img src="/images/<?php echo $this->img; ?>" class="img-fluid card-img-top"
                     alt="<?php echo $this->h1; ?>">

                    <div class="my-3 bg-light p-2"><i class="fas fa-calendar-alt text-primary"></i><span class="ml-2"><?php echo $this->date_add; ?></span></div>
                <h1 class="my-5"><?php echo $this->h1; ?></h1>
                <?php echo $this->text; ?>

                    <div id='com0' class="mt-5 media-box">

                        <?php echo $this->comments; ?>


                        <div class="media-body"></div>
                        <div class="reply-div h4 my-5"><a href="#"  class="psewdo-link reply">Оставьте комментарий</a></div>

                        <div id="form-comment" class="my-4">
                            <form method="post" id="comment_form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        Имя:
                                        <input class="form-control" name="name" value="<?php //if (isset($_COOKIE['user_name'])){ echo $_COOKIE['user_name'];} ?>" id="comment-name">
                                        <input class="form-control concealed" name="url" id="comment-url">
                                    </div>
                                    <div class="col-sm-6">
                                        E-mail (не публикуется):
                                        <input class="form-control" name="email" value="<?php //if (isset($_COOKIE['user_email'])){ echo $_COOKIE['user_email'];} ?>" id="comment-email">
                                        <input type="hidden" value="" name="comment_parent_ID">
                                        <input type="hidden" value="<?php echo $this->id; ?>" name="post_ID">
                                    </div>
                                </div>
                                Ваше замечание:
                                <textarea class="form-control" name="text" id="comment-text"></textarea>
                                <div id="comment-message" class="text-danger small my-3"></div>
                                <button type="sumbit" id="sumbit-comment" class="btn btn-primary pull-left mt-3">Отправить </button>
                                <img src="<?php echo TEMPLATE_PATH ?>img/ajax-loader.gif" id="ajax-loader" class="mt-3">

                            </form>
                        </div>


                    </div>






                <?php endif ?>






            </div>
            <div class="col-md-4">
                <?php if(ADMIN): ?>
                    <a href="/adminblog/add/" class="btn btn-primary w-100 mb-3">Добавить</a>
                <?php endif ?>
                <div class="card blog-list">
                    <div class="card-body">
                        <h5 class="card-title">Последние новости</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($this->last_posts as $val) : ?>
                        <?php if(isset($this->id) and $this->id == $val["id"]) continue; ?>
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
<script src="<?php echo TEMPLATE_PATH ?>js/comment.js"></script>
</body>
</html>