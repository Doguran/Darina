<?php

class TxtController implements IController {
    
    public function indexAction() {
		throw new Exception("Нет запроса"); 
    }
    


    public function pageAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("stock.tpl.php");
        $fc->setBody($output);
    }

    public function blogAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("blog.tpl.php");
        $fc->setBody($output);
    }

    public function postAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("adminindex.tpl.php");
        $fc->setBody($output);
    }

    public function contactAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("contact.tpl.php");
        $fc->setBody($output);
    }


    public function passAction() {
        echo Helper::cryptoPass('***');
    }





    


    
}
