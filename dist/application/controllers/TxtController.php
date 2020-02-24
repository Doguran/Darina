<?php

class TxtController implements IController {
    
    public function indexAction() {
		throw new Exception("Нет запроса"); 
    }
    


    public function pageAction() {
        $fc = FrontController::getInstance();


        $model = new FileModel();
        $model->page = "license";

        $model->h1 = "Лицензии";
        $model->title = "Лицензии";


        $output = $model->render("index3.tpl.php");
        $fc->setBody($output);
    }



    


    
}
