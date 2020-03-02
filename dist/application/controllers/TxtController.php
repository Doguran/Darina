<?php

class TxtController implements IController {
    
    public function indexAction() {
		throw new Exception("Нет запроса"); 
    }
    


    public function pageAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("index3.tpl.php");
        $fc->setBody($output);
    }

    public function blogAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("index4.tpl.php");
        $fc->setBody($output);
    }

    public function postAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("index5.tpl.php");
        $fc->setBody($output);
    }

    public function contactAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("contact.tpl.php");
        $fc->setBody($output);
    }


    


    
}
