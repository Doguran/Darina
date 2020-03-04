<?php
class BlogController implements IController {
    
	public function indexAction() {
		throw new Exception("Нет запроса"); 
    }
    
    public function showAction() {
    $fc = FrontController::getInstance();
    $params = $fc->getParams();
    
   if(!isset($params["url"]) and !isset($params["page"]))
   throw new Exception("Нет параметра запроса");
    
    $model = new FileModel();
    $blogModel= new BlogModel();
    $model->last_posts =  $blogModel ->getLastPosts(5);

    
    $model->article_title = "Блог компании DARINA";
    //выбор последних статей


    if(isset($params["url"])){
            
        $art_id = Helper::clearData($params["id"],"i"); 
                   
        $ArtObj = new ArtModel();
        $model->article_list = $ArtObj->getArtList();
        $article = $ArtObj->getArt($art_id);
        
        if(!$article) throw new Exception("Нет такой статьи");
        
        $model->h1 = $article["h1"];
        $model->text = $article["text"];
        $model->title = $article["title"];
        $model->keywords = $article["keywords"];
        $model->seo_desc = $article["description"];
        $model->id = $art_id;

            
     }elseif(isset($params["page"])){
        $page = Helper::clearData($params["page"],"i"); 
        
        if($page<1){
            throw new Exception("Нет параметра запроса");
        }
        
        $pagination = new PaginationModel("blog", 1, $page);
        
        $model->h1 = $model->title = $model->seo_desc = $model->keywords = $model->article_title.' страница '.$page;
        
        $model->article_all_list = $pagination->resultpage;
        $model->paginator = $pagination->displayPaging();
        
        
    }
    
	//выводим все
    	$output = $model->render("blog.tpl.php");
        $fc->setBody($output);	
        
	}
    
    
}
