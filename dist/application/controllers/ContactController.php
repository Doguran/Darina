<?php

class ContactController implements IController {
    
    public function indexAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();


        $output = $model->render("contact.tpl.php");
        $fc->setBody($output);
    }
    


    public function pageAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();

        $output = $model->render("stock.tpl.php");
        $fc->setBody($output);
    }

    public function blogAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();

        $output = $model->render("blog.tpl.php");
        $fc->setBody($output);
    }

    public function postAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();

        $output = $model->render("adminindex.tpl.php");
        $fc->setBody($output);
    }

    public function contactAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();

        $output = $model->render("contact.tpl.php");
        $fc->setBody($output);
    }



    
}
