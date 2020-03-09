<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyAhuMsVxskqJhgjXF7FZdX_QtIhAaOhLbY"></script>
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

<div class="container-fluid">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A418055c6b347b77030b5c4ab0abbc127f63c5ff87d7ad5843efc211cd952c267&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;"></script>
</div>

<section  class="pt-2 pb-6 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 contact-details">
                <div class="contact-details-content">

                    <?php if(isset($_GET["ok"])): ?>

                            <div class="alert alert-success" role="alert"><?php echo $_GET["ok"] ?></div>

                    <?php endif ?>
                    <?php if(isset($_GET["er"])): ?>

                            <div class="alert alert-danger" role="alert"><?php echo $_GET["er"] ?></div>

                    <?php endif ?>

                    <h1 class="mb-4">Свяжитесь с нами</h1>
                    <h4 class="text-primary mb-4">Узнайте больше о компании DARINA</h4>
                    <div class="tablet-column-75">
                        <p>
                            Пожалуйста, заполните нашу контактную форму, и один
                            из наших менеджеров по обслуживанию клиентов
                            свяжется с Вами.
                        </p>
                        <p>
                            Мы ждем письма от Вас!
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-6">
                            <address>
                                <p class="pr-4"><?php echo $_SESSION["contact"]["address"]; ?></p><br>
                                <span class="tel"><a href="tel:<?php echo Helper::telLink($_SESSION["contact"]["phone1"]) ?>"><?php echo $_SESSION["contact"]["phone1"]; ?></a></span><br>
                                <span class="tel"><a href="tel:<?php echo Helper::telLink($_SESSION["contact"]["phone2"]) ?>"><?php echo $_SESSION["contact"]["phone2"]; ?></a></span><br>
                                <a href="mailto:<?php echo $_SESSION["contact"]["email"]; ?>"><?php echo $_SESSION["contact"]["email"]; ?></a>
                            </address>
                        </div>
                        <div class="col-md-12 col-6">
                            <h5>Время работы:</h5>
                            <p><?php echo $_SESSION["contact"]["mode"]; ?></p>
                            <?php If (ADMIN) : ?>
                                <div class="btn-toolbar mb-3 ml-auto">
                                    <a href="/adminedittext/contacttext/" class="btn btn-primary">Редактировать контакты</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 contact-form">
                <div class="contact-form-content">
                    <div class="formwrapper">
                    <form action="" id="contactform">
                        <div class="form-group">
                            <!--                            <label for="inputName">Имя</label>-->
                            <input type="text" class="form-control form-control-lg" name="name" id="inputName" placeholder="Имя*">
                            <input type="text" class="form-control d-none" name="url" id="InputUrl" placeholder="url">
                        </div>
                        <div class="form-group">
                            <!--                            <label for="inputEmail">Электронная почта</label>-->
                            <input type="text" class="form-control form-control-lg" name="email" id="inputEmail" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <!--                            <label for="inputTel">Телефон</label>-->
                            <input type="text" class="form-control form-control-lg" name="phone" id="inputPhone" placeholder="Телефон">
                        </div>
                        <div class="form-group">
                            <!--                            <label for="inputText">Сообщение</label>-->
                            <textarea class="form-control form-control-lg" id="inputText" name="text" rows="3" placeholder="Сообщение*"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mt-3">
                                <div class="alert alert-danger concealed" role="alert" id="contact-error"></div>
                                <div class="alert alert-success concealed" role="alert" id="contact-success"></div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="subject" value="Сообщение из формы обратной связи">
                        <button type="submit" id="send" class="btn boxed-btn3-white my-2">Отправить</button>
                    </form>
                    </div>
                    <div class="bg-form form-contact rounded-sm"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
<script src="<?php echo TEMPLATE_PATH ?>js/contact.js"></script>
</body>
</html>