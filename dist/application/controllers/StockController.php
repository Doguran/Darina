<?php

class StockController implements IController {
    
    public function indexAction() {
		throw new Exception("Нет запроса"); 
    }



    public function showAction() {
        $fc = FrontController::getInstance();
        $params = $fc->getParams();
        if(isset($params["url"])){
            $url = Helper::clearData($params["url"]);
            $stockModel = new StockModel();
            $stock = $stockModel->getStock($url);
            if(empty($stock)) throw new Exception("товар не найден");

            $model = new FileModel();
            $model->id          = $stock["id"];
            $model->url         = $stock["url"];
            $model->name        = $stock["name"];
            $model->title       = $stock["title"];
            $model->keywords    = $stock["keywords"];
            $model->seo_desc    = $stock["seo_desc"];
            $model->h1          = $stock["h1"];
            $model->h2          = $stock["h2"];
            $model->img         = $stock["img"];
            $model->text        = $stock["text"];

            $output = $model->render("stock.tpl.php");
            $fc->setBody($output);

        }else{
            throw new Exception("Нет параметров");
        }


    }



    


    
}
