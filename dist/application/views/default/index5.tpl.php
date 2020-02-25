<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo TEMPLATE_PATH ?>css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
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

<div class="container-fluid bg-light">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb bg-light">
            <li class="breadcrumb-item"><a href="#">Главнвя</a></li>
            <li class="breadcrumb-item"><a href="#">Блог</a></li>
            <li class="breadcrumb-item active" aria-current="page">Статья
                блога
            </li>
        </ol>
    </nav>
</div>
<section>
<div class="container">
    <div class="row row-blog">
        <div class="col-md-8">
            <img src="<?php echo TEMPLATE_PATH ?>img/epdm.jpg" class="img-fluid"
                 alt="...">
            <h1 class="my-5">Название статьи</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                at facilis labore libero minus nihil ut velit. Alias animi
                at aut cumque doloremque eligendi eveniet ex facilis fugit
                hic ipsa ipsam, laudantium libero modi nemo, nihil numquam
                odio omnis optio quas quia reiciendis sapiente similique
                soluta suscipit vel velit voluptate.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                at facilis labore libero minus nihil ut velit. Alias animi
                at aut cumque doloremque eligendi eveniet ex facilis fugit
                hic ipsa ipsam, laudantium libero modi nemo, nihil numquam
                odio omnis optio quas quia reiciendis sapiente similique
                soluta suscipit vel velit voluptate.</p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Username</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                at facilis labore libero minus nihil ut velit. Alias animi
                at aut cumque doloremque eligendi eveniet ex facilis fugit
                hic ipsa ipsam, laudantium libero modi nemo, nihil numquam
                odio omnis optio quas quia reiciendis sapiente similique
                soluta suscipit vel velit voluptate.</p>
        </div>
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Последние новости</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
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