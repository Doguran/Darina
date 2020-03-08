<?php
class AdminreviewController implements IController {
    
	public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        
    }
    

    
       
public function indexAction() {
    $fc = FrontController::getInstance();

        
        $model = new FileModel();

        $reviewModel = new ReviewModel();
        $model->review = $reviewModel->getReview();
        $model->h1 = 'НАС РЕКОМЕНДУЮТ';

        
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

            if($img->getWidth() >=  $img->getHeight()){
                $img->resizeByWidth(500);
            }else{
                $img->resizeByWidth(350);
            }

            //$img->cropCenter('2pr', '1pr');
            $img->save('images/sm-'.$file);

            $AdminreviewModel = new AdminreviewModel();
            $res = $AdminreviewModel->insert($file);

            if(!$res) throw new Exception('Ошибка добавления в базу');


        } catch (Exception $e) {

            $fc = FrontController::getInstance();
            $model = new FileModel();
            $reviewModel = new ReviewModel();
            $model->review = $reviewModel->getReview();
            $model->h1 = 'НАС РЕКОМЕНДУЮТ';
            $model->er = $model->er = $e->getMessage();

            //выводим все
            $output = $model->render("adminreview.tpl.php");
            $fc->setBody($output);

        }


    }

    


    
    
    
}
