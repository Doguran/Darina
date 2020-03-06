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

        $model->adminH1 = "Редактирование";
        $model->action = "edit";
        $model->id = $stock["id"];
        $model->title = $stock["title"];
        $model->keywords = $stock["keywords"];
        $model->seo_desc = $stock["seo_desc"];
        $model->img = $stock["img"];
        $model->name = $stock["name"];
        $model->anons = $stock["anons"];
        $model->h1 = $stock["h1"];
        $model->h2 = $stock["h2"];
        $model->text = $stock["text"];
        $model->url = $stock["url"];
        $model->sort = $stock["sort"];
        
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
            $name          = Helper::clearData($_POST['name']);
            $anons          = Helper::clearData($_POST['anons']);
            $h1          = Helper::clearData($_POST['h1']);
            $h2          = Helper::clearData($_POST['h2']);
            $text        = Helper::clearData($_POST['text'],"html");
            $title       = Helper::clearData($_POST['title']);
            $keywords    = Helper::clearData($_POST['keywords']);
            $seo_desc    = Helper::clearData($_POST['seo_desc']);
            $images      = Helper::clearData($_POST['img']);

            if($title == "") $title = $h1;


            //проверка на ошибки
            $error = array();
            if(!$h1)         $error[] = "Не указано название";
            if(!$text)       $error[] = "Не указан текст";
            if(!$name)         $error[] = "Не указано имя";
            if(!$anons)         $error[] = "Не указан анонс";
            
            if(empty($error)){//если ошибок нет

                if($_FILES['photo']['size']>0){

                    $file =  Helper::uploadimg("images/");
                    if(!$file) exit('ошибка загрузки иллюстрации');

                }
                if (isset($file)) {


                    $img = AcImage::createImage('images/'.$file);
                    $img->resizeByWidth(350);
                    //$img->save('illustration/'.$file);
                    $img->cropCenter('4pr', '3pr');
                    $img->save('illustration/thumbnails/'.$file);

                    if(!empty($images)) {
                        @unlink("illustration/".$images);
                        @unlink("illustration/thumbnails/".$images);
                    }



                }
                else {

                    $file = $images;
                }

                $AdmintextModel = new AdmintextModel();
                $result = $AdmintextModel->editText("news",$id,$h1,$text,$title,$keywords,$seo_desc,$file,$youtube_id);


            if($result)
               header("Location: /news/show/id/$id/");
            else
               header("Location: /adminnews/show/id/$id/?er=".urlencode("Произошла ошибка"));
                
                
            }else{//если ошибки есть
                $er = "";
                foreach($error as $val){
                    $er .= $val."<br />";
                }
                header("Location: /adminnews/show/id/$id/?er=".urlencode($er));
                
            }
        }else{
           throw new Exception("Нет параметров");
        }
	   
    }


    public function addAction() {


        $fc     = FrontController::getInstance();


            $model = new FileModel();
            $model->id = "";
            $model->adminH1 = "Добавление новости";
            $model->class = "adminnews";
            $model->action = "insert";
            $model->h1 = "";
            $model->text = "";
            $model->img = "default.png";
            $model->youtube_id = "";

            //выводим все
            $output = $model->render("adminText.tpl.php");
            $fc->setBody($output);



    }
    
    public function insertAction() {
        //Helper::print_arr($_FILES);


        if($_SERVER["REQUEST_METHOD"]=='POST'){

             //инициализация пришедших переменных

            $h1          = Helper::clearData($_POST['h1']);
            $text        = Helper::clearData($_POST['text'],"html");
            $title       = Helper::clearData($_POST['title']);
            $keywords    = Helper::clearData($_POST['keywords']);
            $seo_desc    = Helper::clearData($_POST['seo_desc']);
            $youtube_id  = Helper::parse_youtube_url($_POST['youtube_id']);
            
            if($title == "") $title = $h1;

            //проверка на ошибки
            $error = array();
            if(!$h1)         $error[] = "Не указано название статьи";
            if(!$text)       $error[] = "Не указан текст статьи";
                        
            if(empty($error)){//если ошибок нет

                if($_FILES['photo']['size']>0){

                    $file =  Helper::uploadimg("illustration/");
                    if(!$file) exit('ошибка загрузки иллюстрации');

                }
                if (isset($file)) {


                    $img = AcImage::createImage('illustration/'.$file);
                    $img->resizeByWidth(350);
                    //$img->save('illustration/'.$file);
                    $img->cropCenter('4pr', '3pr');
                    $img->save('illustration/thumbnails/'.$file);


                }
                else {

                    $file = NULL;
                }


               $AdmintextModel = new AdmintextModel();
               $txt_id = $AdmintextModel->insertText("news",$h1,$text,$title,$keywords,$seo_desc,$file,$youtube_id);

               if($txt_id)
               header("Location: /news/show/id/$txt_id/");
               else
               header("Location: /adminnews/add/?er=".urlencode("Произошла ошибка"));
                
            }else{//если ошибки есть
                $er = "";
                foreach($error as $val){
                    $er .= $val."<br />";
                }

                $model = new FileModel();

                $model->er = $er;
                $model->id = "";
                $model->adminH1 = "Добавление новости";
                $model->class = "adminnews";
                $model->action = "insert";

                $model->h1 = $h1;
                $model->text = $text;
                $model->title = $title;
                $model->keywords = $keywords;
                $model->seo_desc = $seo_desc;
                $model->img = "default.png";
                $model->youtube_id = $youtube_id;

                //выводим все
                $fc     = FrontController::getInstance();
                $output = $model->render("adminText.tpl.php");
                $fc->setBody($output);
                
            }
        }else{
            
            throw new Exception("Нет параметров");
           
        }
	   
    }


    public function deleteAction() {
        $fc = FrontController::getInstance();
        $params = $fc->getParams();

        if(isset($params["id"])){

            $id = Helper::clearData($params["id"],"i");

            $AdmintextObj = new AdmintextModel();
            $kartinka = $AdmintextObj->getIllustration("news",$id);
            if(!empty($kartinka)){
                @unlink("illustration/".$kartinka);
                @unlink("illustration/thumbnails/".$kartinka);
            }
            $AdmintextObj->deleteText("news",$id);
            header("Location: /news/show/page/1/");

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
