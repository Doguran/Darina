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
    <title>Редпктирование главной страницы</title>
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
            <li class="breadcrumb-item active" aria-current="page">Редактирование главной страницы
            </li>
        </ol>
    </nav>
</div>
<section>

    <div class="container">

        <form method="post" action="/adminarticle/main/" id="artForm" enctype="multipart/form-data">


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

                    Заголовок (H1): <br />
                    <input class="form-control" type="text" value="<?php echo $this->h1 ?>" name='h1'>
                    <br>
                    Заголовок (H2): <br />
                    <input class="form-control" type="text" value="<?php echo $this->h2 ?>" name='h2'>
                    <br>
                    Текст статьи - левая колонка
                    <br>
                    <textarea id="editor1" class="form-control" name="text"><?php echo $this->text ?></textarea>
                    <script type='text/javascript'>
                        CKEDITOR.replace( 'editor1', {toolbar : 'MyToolbar'} );
                    </script>
                    <br>
                    Текст статьи - правая колонка
                    <br>
                    <textarea id="editor2" class="form-control" name="text2"><?php echo $this->text2 ?></textarea>
                    <script type='text/javascript'>
                        CKEDITOR.replace( 'editor2', {toolbar : 'MyToolbar'} );
                    </script>


                </div>
                <div id="tabs-2" class="tab-pane fade" role="tabpanel" aria-labelledby="tabs-2-tab">
                    <br />
                    Title: <br /><input class="form-control" type="text" value="<?php echo $this->title ?>" name="title"><br />
                    Keywords: <br /><textarea class="form-control" name="keywords"><?php echo $this->keywords ?></textarea><br />
                    Description: <br /><textarea class="form-control" name="seo_desc"><?php echo $this->seo_desc ?></textarea><br /><br />
                    <input type="hidden" value="<?php echo $this->id ?>" name='id'>
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
<script>

    var articleSend = {
        message: null,
        init: function () {
            $('#artForm').submit(function (e) {
                e.preventDefault();
                CKEDITOR.instances.editor1.updateElement();
                CKEDITOR.instances.editor2.updateElement();
                if (articleSend.validate()) {
                    $('.contact-message').html("");
                    $.ajax({
                        url: '/adminedittext/main/',
                        data: $('#artForm').serialize(),
                        type: 'post',
                        cache: false,
                        dataType: 'json',
                        beforeSend: function () {
                            $('.btn-add').val('Ждите..');
                        },
                        complete: function () {
                            $('.btn-add').val('Отправить');
                        },
                        success: function (data) {
                            if (data["success"]) {
                                window.location = "/";

                            } else {
                                $('.contact-message').fadeIn().html(data["msg"])
                            }
                        },
                        error: articleSend.error
                    })
                } else {
                    $('.contact-message').fadeIn().html(articleSend.message)
                }
            })
        },
        error: function (xhr) {
            alert(xhr.statusText)
        },
        validate: function () {
            articleSend.message = '';
            var valid = true;
            var txt = $('#editor1').val();
            var txt2 = $('#editor2').val();
            var h1 = $('input[name=h1]').val();
            var h2 = $('input[name=h2]').val();
            if (!txt || !txt2 || !h1 || !h2) {
                valid = false
            }
            if (!valid) {
                articleSend.message = 'Проверьте поля формы';
            }
            return valid
        }

    };
    articleSend.init();
</script>
</body>
</html>