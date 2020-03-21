<?php
class Error404Controller implements IController {
	public function indexAction() {
	   
		$fc = FrontController::getInstance();
        
		$model = new FileModel();

        $model->text  = "Мы уже работаем над созданием новой страницы для Вас.";
        $model->stocks = StockModel::getStaticStocks();

        $model->h1 = "Ошибка 404 - нет такой страницы";
		header("HTTP/1.0 404 Not Found");
        //выводим все
		$output = $model->render("error404.tpl.php");
		
		$fc->setBody($output);
        
	}
    
    
    
   
	











}
