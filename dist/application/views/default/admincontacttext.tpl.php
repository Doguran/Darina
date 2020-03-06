<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
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
            <li class="breadcrumb-item active" aria-current="page">Редактирование контактов
            </li>
        </ol>
    </nav>
</div>
<section>

    <div class="container">

        <form action="/adminedittext/contacttext/" method="post" id="addform">




            <div class="tab-content">
                <div id="tabs-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="tabs-1-tab">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone1">Телефон1</label>
                            <input class="form-control" type="text" value="<?php echo $this->contact['phone1']; ?>" name="phone1" id="phone1"  placeholder="Телефон1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone2">Телефон2</label>
                            <input  class="form-control" type="text" value="<?php echo $this->contact['phone2']; ?>" name="phone2" id="phone2" placeholder="Телефон2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Адрес</label>
                            <input  class="form-control" type="text" value="<?php echo $this->contact['address']; ?>" name="address" id="address" placeholder="Адрес">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input  class="form-control" type="text" value="<?php echo $this->contact['email']; ?>" name="email" id="email"  placeholder="E-mail">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="mode">Часы работы</label>
                            <input  class="form-control" type="text" value="<?php echo $this->contact['mode']; ?>" name="mode" id="mode"  placeholder="Часы работы">

                        </div>
                        <div class="form-group col-12">
                            <label for="footer">Текст в футере</label>
                            <textarea  class="form-control"  name="footer" id="footer" rows="4" placeholder="Текст в футере"><?php echo $this->contact['footer']; ?></textarea>

                        </div>






                    </div>





                </div>

            </div>



            <div class="contact-message my-3 text-danger"></div>
            <input class="btn btn-primary btn-add my-3" type="submit" value="Отправить">


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