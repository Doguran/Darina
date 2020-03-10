<?php

class SearchController implements IController {
    
    public function indexAction() {
        $model = new FileModel();
        $fields = array('h1','text');
        $keyword = isset($_GET['s']) ? Helper::clearData($_GET['s']) : "";
        
        if (empty($keyword) || mb_strlen($keyword,'UTF-8') < 3){
            $model->content = 'Поисковый запрос либо пустой, либо слишком короткий (меньше 3 символов).';
                
        }else{
        $keywords = explode(" ", $keyword);
        
        $SearchModel = new SearchModel();
        $search = $SearchModel->searchId($fields,$keywords);
            if(empty($search)){
                $model->content = "Ничего не найдено";
            }else{
                $model->content = $search;
            }
        
        }


        $model->title_content = "Поиск по запросу '$keyword'";
        
		$fc = FrontController::getInstance();
        //выводим все
		$output = $model->render("search.tpl.php");
		$fc->setBody($output);    
               
        
		
	}
    

    
   
    
    
    
}