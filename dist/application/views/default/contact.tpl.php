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
<div id="map"></div>
<script>
    // initMap() - функция инициализации карты
    function initMap() {
        // Координаты центра на карте. Широта: 56.2928515, Долгота: 43.7866641
        var centerLatLng = new google.maps.LatLng(<?php echo $_SESSION["contact"]["maps"]; ?>);
        // Обязательные опции с которыми будет проинициализированна карта
        var mapOptions = {
            center: centerLatLng, // Координаты центра мы берем из переменной centerLatLng
            scaleControl: false,
            scrollwheel: false,
            disableDoubleClickZoom: false,
            zoom: 17               // Зум по умолчанию. Возможные значения от 0 до 21
        };
        // Создаем карту внутри элемента #map
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        // contentString - это переменная в которой хранится содержимое информационного окна.
        // Может содержать, как HTML-код, так и обычный текст.
        // Если используем HTML, то в этом случае у нас есть возможность стилизовать окно с помощью CSS.
        var contentString = '<div class="infowindow">' +
            '<h3>Lorem ipsum dolor</h3>' +
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, sed.</p>' +
            '</div>';
        // Создаем объект информационного окна и помещаем его в переменную infoWindow
        var infoWindow = new google.maps.InfoWindow({
            content: contentString
        });
        // Добавляем маркер
        var marker = new google.maps.Marker({
            position: centerLatLng,              // Координаты расположения маркера. В данном случае координаты нашего маркера совпадают с центром карты, но разумеется нам никто не мешает создать отдельную переменную и туда поместить другие координаты.
            map: map,                            // Карта на которую нужно добавить маркер
            title: "Текст всплывающей подсказки" // (Необязательно) Текст выводимый в момент наведения на маркер
        });
        // Отслеживаем клик по нашему маркеру
        google.maps.event.addListener(marker, "click", function () {
            // infoWindow.open - показывает информационное окно.
            // Параметр map - это переменная содержащие объект карты (объявлена на 8 строке)
            // Параметр marker - это переменная содержащие объект маркера (объявлена на 23 строке)
            infoWindow.open(map, marker);
        });
        // Отслеживаем клик в любом месте карты
        google.maps.event.addListener(map, "click", function () {
            // infoWindow.close - закрываем информационное окно.
            infoWindow.close();
        });
    }

    // Ждем полной загрузки страницы, после этого запускаем initMap()
    google.maps.event.addDomListener(window, "load", initMap);
</script>
<section>
    <div class="container">

    </div>
</section>
<!-- footer start -->
<?php include("blocks/footer.tpl.php"); ?>
<script src="<?php echo TEMPLATE_PATH ?>js/main.js"></script>
</body>
</html>