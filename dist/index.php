<?php

define("DB_CONN","mysql:host=localhost;dbname=darina;charset=utf8");
define("DB_USER","root");
define("DB_PASS","");

define('TEMPLATE', 'default');

define('HTTP_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('TEMPLATE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/application/views/'.TEMPLATE.'/');

define('DOCROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

$controllers = 'application/controllers';
$models = 'application/models';
$views = 'application/views/'.TEMPLATE;
$toolkit = 'application/image-toolkit';

define('CONTROLLERSPATH', realpath(DOCROOT . $controllers) . DIRECTORY_SEPARATOR);
define('MODELSPATH', realpath(DOCROOT . $models) . DIRECTORY_SEPARATOR);
define('VIEWSPATH', realpath(DOCROOT . $views) . DIRECTORY_SEPARATOR);
define('IMAGETOOLKIT', realpath(DOCROOT . $toolkit) . DIRECTORY_SEPARATOR);


/* Пути по-умолчанию для поиска файлов */
set_include_path(get_include_path()
                 .PATH_SEPARATOR.$controllers
                 .PATH_SEPARATOR.$models
                 .PATH_SEPARATOR.$views
                 .PATH_SEPARATOR.$toolkit);

unset($controllers, $models, $views);

/* Имена файлов: views */
define('INDEX_TPL', 'index2.tpl.php');



/* Автозагрузчик классов */

function __autoload($class){
    //@include_once($class.'.php');

    $path = array(CONTROLLERSPATH.$class.'.php',
      MODELSPATH.$class.'.php',
      VIEWSPATH.$class.'.php',
      IMAGETOOLKIT.$class.'.php');

    $found = false;
    foreach ($path as $file) {
        if (is_file($file)) {
            $found = true;
            break;
        }
    }
    if($found)
        require_once($class.'.php');



}

/* Инициализация и запуск FrontController */
try{

    //стартуем сессию
    session_start();
//    if(!isset($_SESSION["cart"])){
//        $_SESSION["cart"] = array();
//    }

    if(!isset($_SESSION["contact"])){
        $_SESSION["contact"] = TextModel::getStaticContact();
    }
    if(!isset($_SESSION["stocks"])){
        $_SESSION["stocks"] = StockModel::getStaticStocks();
    }




    if(Helper::checkAdmin())
        define('ADMIN', true);
    else
        define('ADMIN', false);

//    $cartAll = CartController::countCart();
//    define('QUANTITY', $cartAll["quantityAll"]);
//    define('COST', $cartAll["priceAll"]);
//    unset($cartAll);




    //Helper::print_arr($_SESSION["compare"]);
    $front = FrontController::getInstance();
    $front->route();



}catch (Exception $e) {

    //в продакшен этот абзац закоментить, а следующий раскоментить
        header("HTTP/1.0 404 Not Found");
        header("Content-Type: text/html; charset=utf-8");
        echo 'Выброшено исключение: ',  $e->getMessage(),"\n";

//    $rc = new ReflectionClass("Error404Controller");
//    $controller = $rc->newInstance();
//    $method = $rc->getMethod("indexAction");
//    $method->invoke($controller);

}


/* Вывод данных */
echo $front->getBody();
