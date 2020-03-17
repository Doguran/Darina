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
    $model->stocks = StockModel::getStaticStocks();

    
    $model->article_title = "Блог компании DARINA";
    //выбор последних статей


    if(isset($params["url"])){
            
        $url = Helper::clearData($params["url"]);

        $post = $blogModel->getPost($url);


        if(!$post) throw new Exception("Нет такой статьи");

        $CommentController = new CommentController();
        $model->comments = $CommentController->getComments($post["id"]);
        
        $model->h1 = $post["h1"];
        $model->text = $post["text"];
        $model->img = $post["img"];
        $model->title = $post["title"];
        $model->keywords = $post["keywords"];
        $model->seo_desc = $post["seo_desc"];
        $model->date_add = $post["date_add"];
        $model->id = $post["id"];
        $model->url = $post["url"];


            
     }elseif(isset($params["page"])){
        $page = Helper::clearData($params["page"],"i"); 
        
        if($page<1){
            throw new Exception("Нет параметра запроса");
        }
        
        $pagination = new PaginationModel("blog", 10, $page);
        
        $model->h1 = $model->title = $model->seo_desc = $model->keywords = $model->article_title.' страница '.$page;
        
        $model->article_all_list = $pagination->resultpage;
        $model->paginator = $pagination->displayPaging();
        
        
    }

	//выводим все
    	$output = $model->render("blog.tpl.php");
        $fc->setBody($output);	
        
	}
    
    
}
