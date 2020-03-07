<?php
class AdminstockController implements IController {
    
	public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        
    }
    
    public function indexAction() {
        
        throw new Exception("Нет параметров");
		
	}
    
       
public function showAction() {
    $fc = FrontController::getInstance();
    $params = $fc->getParams();
    
    if(isset($params["url"])){
        
        $url = Helper::clearData($params["url"]);
        
        $model = new FileModel();

        $stockModel = new StockModel();
        $stock = $stockModel->getStock($url);
        
        if(!$stock) throw new Exception("Нет такой статьи");

        $model->adminH1  = "Редактирование";
        $model->action   = "edit";
        $model->id       = $stock["id"];
        $model->title    = $stock["title"];
        $model->keywords = $stock["keywords"];
        $model->seo_desc = $stock["seo_desc"];
        $model->img      = $stock["img"];
        $model->name     = $stock["name"];
        $model->anons    = $stock["anons"];
        $model->h1       = $stock["h1"];
        $model->h2       = $stock["h2"];
        $model->text     = $stock["text"];
        $model->url      = $stock["url"];
        $model->sort     = $stock["sort"];

        
        //выводим все
    	$output = $model->render("adminstock.tpl.php");
        $fc->setBody($output);	  
          
     }else{
        
        throw new Exception("Нет параметров");
        
    }
    
	
        
}
    
    public function editAction() {
                        
        if($_SERVER["REQUEST_METHOD"]=='POST'){
            
            //инициализация пришедших переменных
            $id          = Helper::clearData($_POST['id'],"i");
            $name        = Helper::clearData($_POST['name']);
            $anons       = Helper::clearData($_POST['anons']);
            $h1          = Helper::clearData($_POST['h1']);
            $h2          = Helper::clearData($_POST['h2']);
            $text        = Helper::clearData($_POST['text'],"html");
            $title       = Helper::clearData($_POST['title']);
            $keywords    = Helper::clearData($_POST['keywords']);
            $seo_desc    = Helper::clearData($_POST['seo_desc']);
            $images      = Helper::clearData($_POST['img']);
            $url         = Helper::clearData($_POST['url']);
            $oldurl      = Helper::clearData($_POST['oldurl']);

            if($title == "") $title = $h1;
            if($url == "") $url = $name;
            if($images == "" || $images == null) $images = null;

            $url = Helper::getChpu($url);

            //проверка на ошибки
            $error = array();
            if(!$h1)         $error[] = "Не указано название";
            if(!$text)       $error[] = "Не указан текст";
            if(!$name)         $error[] = "Не указано имя";
            if(!$anons)         $error[] = "Не указан анонс";
            
            if(empty($error)){//если ошибок нет

                if($_FILES['photo']['size']>0){

                    $file =  Helper::uploadimg("images/temp/");
                    if(!$file) exit('ошибка загрузки иллюстрации');

                }
                if (isset($file)) {


                    $img = AcImage::createImage('images/temp/'.$file);
                    //если картинка горизонтальная - сжимаем по высоте, если вертикальная - по ширине
                    if($img->getWidth() >=  $img->getHeight()){
                        $img->resizeByHeight(267);
                    }else{
                        $img->resizeByWidth(266);
                    }

                    //$img->save('illustration/'.$file);
                    $img->cropCenter('266px', '267px');
                    $img->save('images/'.$file);
                    @unlink("images/temp/".$file);

                    if(!empty($images)) {
                        @unlink("images/".$images);
                    }



                }
                else {

                    $file = $images;
                }

                $AdminstockModel = new AdminstockModel();
                $result = $AdminstockModel->edit($id,$title,$keywords,$seo_desc,$name,$anons,$h1,$h2,$text,$file,$url);
                $_SESSION["stocks"] = StockModel::getStaticStocks();

            if($result)
               header("Location: /stock/$url.html");
            else
               header("Location: /adminstock/show/url/$oldurl/?er=".urlencode("Произошла ошибка"));
                
                
            }else{//если ошибки есть
                $er = "";
                foreach($error as $val){
                    $er .= $val."<br />";
                }
                header("Location: /adminstock/show/url/$oldurl/?er=".urlencode($er));
                
            }
        }else{
           throw new Exception("Нет параметров");
        }
	   
    }


    public function addAction() {

        $fc     = FrontController::getInstance();

        $model = new FileModel();

        $model->adminH1  = "Добавление";
        $model->action   = "insert";
        $model->id       = NULL;
        $model->title    = NULL;
        $model->keywords = NULL;
        $model->seo_desc = NULL;
        $model->img      = NULL;
        $model->name     = NULL;
        $model->anons    = NULL;
        $model->h1       = NULL;
        $model->h2       = NULL;
        $model->text     = NULL;
        $model->url      = NULL;
        $model->sort     = NULL;

        //выводим все
        $output = $model->render("adminstock.tpl.php");
        $fc->setBody($output);


    }
    
    public function insertAction() {
        //Helper::print_arr($_FILES);


        if($_SERVER["REQUEST_METHOD"]=='POST'){

            //инициализация пришедших переменных

            $name        = Helper::clearData($_POST['name']);
            $anons       = Helper::clearData($_POST['anons']);
            $h1          = Helper::clearData($_POST['h1']);
            $h2          = Helper::clearData($_POST['h2']);
            $text        = Helper::clearData($_POST['text'],"html");
            $title       = Helper::clearData($_POST['title']);
            $keywords    = Helper::clearData($_POST['keywords']);
            $seo_desc    = Helper::clearData($_POST['seo_desc']);
            $images      = Helper::clearData($_POST['img']);
            $url         = Helper::clearData($_POST['url']);
            $oldurl      = Helper::clearData($_POST['oldurl']);

            if($title == "") $title = $h1;
            if($url == "") $url = $name;
            if($images == "" || $images == null) $images = null;

            $url = Helper::getChpu($url);

            //проверка на ошибки
            $error = array();
            if(!$h1)         $error[] = "Не указано название";
            if(!$text)       $error[] = "Не указан текст";
            if(!$name)         $error[] = "Не указано имя";
            if(!$anons)         $error[] = "Не указан анонс";

            if(empty($error)){//если ошибок нет

                if($_FILES['photo']['size']>0){

                    $file =  Helper::uploadimg("images/temp/");
                    if(!$file) exit('ошибка загрузки иллюстрации');

                }
                if (isset($file)) {


                    $img = AcImage::createImage('images/temp/'.$file);
                    //если картинка горизонтальная - сжимаем по высоте, если вертикальная - по ширине
                    if($img->getWidth() >=  $img->getHeight()){
                        $img->resizeByHeight(267);
                    }else{
                        $img->resizeByWidth(266);
                    }

                    //$img->save('illustration/'.$file);
                    $img->cropCenter('266px', '267px');
                    $img->save('images/'.$file);
                    @unlink("images/temp/".$file);

                }
                else {

                    $file = $images;
                }

                $AdminstockModel = new AdminstockModel();
                $res = $AdminstockModel->insert($title,$keywords,$seo_desc,$name,$anons,$h1,$h2,$text,$file,$url);

                $_SESSION["stocks"] = StockModel::getStaticStocks();


               if($res)
               header("Location: /stock/$url.html");
               else
               header("Location: /adminstock/add/?er=".urlencode("Произошла ошибка"));
                
            }else{//если ошибки есть
                $er = "";
                foreach($error as $val){
                    $er .= $val."<br />";
                }

                $model = new FileModel();

                $model->er = $er;
                $model->adminH1  = "Добавление";
                $model->action   = "insert";
                $model->id       = NULL;
                $model->title    = $title;
                $model->keywords = $keywords;
                $model->seo_desc = $seo_desc;
                $model->img      = NULL;
                $model->name     = $name;
                $model->anons    = $anons;
                $model->h1       = $h1;
                $model->h2       = $h2;
                $model->text     = $text;
                $model->url      = $url;
                $model->sort     = NULL;

                //выводим все
                $fc     = FrontController::getInstance();
                $output = $model->render("adminstock.tpl.php");
                $fc->setBody($output);
                
            }
        }else{
            
            throw new Exception("Нет параметров");
           
        }
	   
    }


    public function deleteAction() {
        $fc = FrontController::getInstance();
        $params = $fc->getParams();

        if(isset($params["url"])){

            $url = Helper::clearData($params["url"]);

            $AdminstockModel = new AdminstockModel();
            $kartinka = $AdminstockModel->getIllustration($url);
            if(!empty($kartinka)){
                @unlink("images/".$kartinka);
            }
            $AdminstockModel->delete($url);
            $_SESSION["stocks"] = StockModel::getStaticStocks();
            header("Location: /stock/".$_SESSION['stocks'][0]['url'].".html");

        }else{
            throw new Exception("Нет параметров");
        }

    }


    public function delillustrationAction() {

        $fc = FrontController::getInstance();
        $params = $fc->getParams();

        if(isset($params["url"])){

            $url  = Helper::clearData($params["url"]);

            $AdminstockObj = new AdminstockModel();
            $kartinka = $AdminstockObj->getIllustration($url);
            if(!is_null($kartinka)){
                @unlink("images/".$kartinka);
            }
            $AdminstockObj->delIllustration($url);
            $_SESSION["stocks"] = StockModel::getStaticStocks();

            header("Location: /adminstock/show/url/$url/");

        }else{
            throw new Exception("Нет параметров");
        }

    }


    
    
    
}
