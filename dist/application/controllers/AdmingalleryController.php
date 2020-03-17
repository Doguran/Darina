<?php
class AdmingalleryController implements IController {
    
	public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        
    }
    

    
       
public function indexAction() {
    $fc = FrontController::getInstance();

        
        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();

        $galleryModel = new GalleryModel();
        $model->images =  $galleryModel->getGallery();
        $model->h1 = 'Галерея';
        $model->controller = 'gallery';

        
        //выводим все
    	$output = $model->render("adminreview.tpl.php");
        $fc->setBody($output);	  

	
        
}

    public function insertAction() {

        try {

            if(!$_FILES['photo']['size']>0) throw new Exception('Файл не выбран');
            $file =  Helper::uploadimg("images/");
            if(!$file) throw new Exception('Ошибка загрузки');

            $img = AcImage::createImage('images/'.$file);

            $img->resizeByWidth(480);

            $img->cropCenter('480px', '270px');
            $img->save('images/sm-'.$file);

            $AdmingalleryModel = new AdmingalleryModel();
            $res = $AdmingalleryModel->insert($file);

            if(!$res) throw new Exception('Ошибка добавления в базу');
            header("Location: /admingallery/");


        } catch (Exception $e) {

            $fc = FrontController::getInstance();
            $model = new FileModel();
            $galleryModel = new GalleryModel();
            $model->images =  $galleryModel->getGallery();
            $model->h1 = 'Галерея';
            $model->controller = 'gallery';
            $model->er = $e->getMessage();
            $model->stocks = StockModel::getStaticStocks();

            //выводим все
            $output = $model->render("adminreview.tpl.php");
            $fc->setBody($output);

        }


    }

    public function deleteAction() {
        $fc = FrontController::getInstance();
        $params = $fc->getParams();

        if(isset($params["id"])){

            $id = Helper::clearData($params["id"], "i");

            $AdmingalleryModel = new AdmingalleryModel();
            $kartinka = $AdmingalleryModel->getIllustration($id);
            if(!empty($kartinka)){
                @unlink("images/".$kartinka);
                @unlink("images/sm-".$kartinka);
            }
            $AdmingalleryModel->delete($id);

            header("Location: /admingallery/");

        }else{
            throw new Exception("Нет параметров");
        }

    }







}
