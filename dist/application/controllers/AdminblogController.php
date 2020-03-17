<?php
class AdminblogController implements IController {
    
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
        $model->stocks = StockModel::getStaticStocks();

        $blogModel = new BlogModel();
        $blog = $blogModel->getPost($url);
        
        if(!$blog) throw new Exception("Нет такой статьи");

        $model->adminH1  = "Редактирование";
        $model->action   = "edit";
        $model->id       = $blog["id"];
        $model->title    = $blog["title"];
        $model->keywords = $blog["keywords"];
        $model->seo_desc = $blog["seo_desc"];
        $model->img      = $blog["img"];
        $model->h1       = $blog["h1"];
        $model->text     = $blog["text"];
        $model->url      = $blog["url"];
        $model->date_add = $blog["date_add"];
        

        
        //выводим все
    	$output = $model->render("adminblog.tpl.php");
        $fc->setBody($output);	  
          
     }else{
        
        throw new Exception("Нет параметров");
        
    }
    
	
        
}
    
    public function editAction() {
                        
        if($_SERVER["REQUEST_METHOD"]=='POST'){
            
            //инициализация пришедших переменных
            $id          = Helper::clearData($_POST['id'],"i");
            $h1          = Helper::clearData($_POST['h1']);
            $text        = Helper::clearData($_POST['text'],"html");
            $title       = Helper::clearData($_POST['title']);
            $keywords    = Helper::clearData($_POST['keywords']);
            $seo_desc    = Helper::clearData($_POST['seo_desc']);
            $images      = Helper::clearData($_POST['img']);
            $url         = Helper::clearData($_POST['url']);
            $oldurl      = Helper::clearData($_POST['oldurl']);
            $date_add      = Helper::clearData($_POST['date_add']);
            list($day, $month, $year) = explode(".", $date_add);

            if($title == "") $title = $h1;
            if($url == "") $url = $h1;
            if($images == "" || $images == null) $images = null;

            $url = Helper::getChpu($url);

            //проверка на ошибки
            $error = array();
            if(!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) $error[] = "Ошибка в дате";
            if(!$h1)         $error[] = "Не указано название";
            if(!$text)       $error[] = "Не указан текст";
            
            if(empty($error)){//если ошибок нет

                if($_FILES['photo']['size']>0){

                    $file =  Helper::uploadimg("images/temp/");
                    if(!$file) exit('ошибка загрузки иллюстрации');

                }
                if (isset($file)) {


                    $img = AcImage::createImage('images/temp/'.$file);

                    $img->resizeByWidth(730);
                    //$img->cropCenter('2pr', '1pr');
                    $img->save('images/'.$file);
                    @unlink("images/temp/".$file);

                    if(!empty($images)) {
                        @unlink("images/".$images);
                    }



                }
                else {

                    $file = $images;
                }

                $AdminblogModel = new AdminblogModel();
                $date_add = '20'.$year.'-'.$month.'-'.$day;
                $result = $AdminblogModel->edit($id,$title,$keywords,$seo_desc,$h1,$text,$file,$url,$date_add);

            if($result)
               header("Location: /blog/$url.html");
            else
               header("Location: /adminblog/show/url/$oldurl/?er=".urlencode("Произошла ошибка"));
                
                
            }else{//если ошибки есть
                $er = "";
                foreach($error as $val){
                    $er .= $val."<br />";
                }
                header("Location: /adminblog/show/url/$oldurl/?er=".urlencode($er));
                
            }
        }else{
           throw new Exception("Нет параметров");
        }
	   
    }


    public function addAction() {

        $fc     = FrontController::getInstance();

        $model = new FileModel();
        $model->stocks = StockModel::getStaticStocks();

        $model->adminH1  = "Добавление";
        $model->action   = "insert";
        $model->id       = NULL;
        $model->title    = NULL;
        $model->keywords = NULL;
        $model->seo_desc = NULL;
        $model->img      = NULL;
        $model->h1       = NULL;
        $model->text     = NULL;
        $model->url      = NULL;
        $model->sort     = NULL;

        //выводим все
        $output = $model->render("adminblog.tpl.php");
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
            $images      = Helper::clearData($_POST['img']);
            $url         = Helper::clearData($_POST['url']);
            $oldurl      = Helper::clearData($_POST['oldurl']);

            if($title == "") $title = $h1;
            if($url == "") $url = $h1;
            if($images == "" || $images == null) $images = null;

            $url = Helper::getChpu($url);

            //проверка на ошибки
            $error = array();
            if(!$h1)         $error[] = "Не указано название";
            if(!$text)       $error[] = "Не указан текст";


            if(empty($error)){//если ошибок нет

                if($_FILES['photo']['size']>0){

                    $file =  Helper::uploadimg("images/temp/");
                    if(!$file) exit('ошибка загрузки иллюстрации');

                }
                if (isset($file)) {


                    $img = AcImage::createImage('images/temp/'.$file);

                    $img->resizeByWidth(730);
                    //$img->cropCenter('2pr', '1pr');
                    $img->save('images/'.$file);
                    @unlink("images/temp/".$file);

                    if(!empty($images)) {
                        @unlink("images/".$images);
                    }



                }
                else {

                    $file = $images;
                }

                $AdminblogModel = new AdminblogModel();
                $res = $AdminblogModel->insert($title,$keywords,$seo_desc,$h1,$text,$file,$url);


               if($res)
               header("Location: /blog/$url.html");
               else
               header("Location: /adminblog/add/?er=".urlencode("Произошла ошибка"));
                
            }else{//если ошибки есть
                $er = "";
                foreach($error as $val){
                    $er .= $val."<br />";
                }

                $model = new FileModel();
                $model->stocks = StockModel::getStaticStocks();

                $model->er = $er;
                $model->adminH1  = "Добавление";
                $model->action   = "insert";
                $model->id       = NULL;
                $model->title    = $title;
                $model->keywords = $keywords;
                $model->seo_desc = $seo_desc;
                $model->img      = NULL;
                $model->h1       = $h1;
                $model->text     = $text;
                $model->url      = $url;
                $model->sort     = NULL;

                //выводим все
                $fc     = FrontController::getInstance();
                $output = $model->render("adminblog.tpl.php");
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

            $AdminblogModel = new AdminblogModel();
            $kartinka = $AdminblogModel->getIllustration($url);
            if(!empty($kartinka)){
                @unlink("images/".$kartinka);
            }
            $AdminblogModel->delete($url);
            header("Location: /blog/1/");

        }else{
            throw new Exception("Нет параметров");
        }

    }


    public function delillustrationAction() {

        $fc = FrontController::getInstance();
        $params = $fc->getParams();

        if(isset($params["url"])){

            $url  = Helper::clearData($params["url"]);

            $AdminblogObj = new AdminblogModel();
            $kartinka = $AdminblogObj->getIllustration($url);
            if(!is_null($kartinka)){
                @unlink("images/".$kartinka);
            }
            $AdminblogObj->delIllustration($url);


            header("Location: /adminblog/show/url/$url/");

        }else{
            throw new Exception("Нет параметров");
        }

    }


    
    
    
}
