<?php
class AdmincommentController implements IController {
    
	public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        
    }
    
    public function indexAction() {
        
        $fc = FrontController::getInstance();
                
  		$model = new FileModel();
        
		$catModel = new CatModel();
        $model->categories = $catModel->getCategories();
                        
        $model->cartAll = CartController::countCart();
        
        $textModel = new TextModel();
        $model->contact = $textModel->getContact();
        
        $commentModel = new CommentModel();
        $model->comments = $commentModel->getAllComment();
        
        
        //выводим все
		$output = $model->render("admincomment.tpl.php");
		
		$fc->setBody($output);
		
	}
    
    public function nextAction() {
        
        
        if(isset($_POST['from'])){
        $fc = FrontController::getInstance();
        $from = Helper::clearData($_POST['from'],"i");
        
  		$model = new FileModel();
        
        $commentModel = new CommentModel();
        $comments = $commentModel->getAllComment($from);
        $model->comments = $comments;
        $resData = array();
        $resData["count"] = count($comments);
        
        
        //выводим все
		$resData["comment"] = $model->render("blocks/nextadmincomment.tpl.php");
        
		
		$fc->setBody(json_encode($resData));
		}
	}
    
        
    public function deleteAction() {
    $fc = FrontController::getInstance();
    $params = $fc->getParams();
    
       if(!isset($params["id"]))
       throw new Exception("Нет параметра запроса");
       
       $id = Helper::clearData($params["id"],"i");
       
      $adminCommentModel = new AdminCommentModel();
      $result = $adminCommentModel->del($id);
      
      $result = true;
      
      if($result){
        $this->ok_msg($id);
      }else{
        $this->not_ok_msg();
      }
      
   	}
    
    
    private function ok_msg($id) {
        
        $resData = array();
        $resData["success"] = 1;
        $resData["id"] = $id;
        
        echo json_encode($resData);
        
		
	}
    private function not_ok_msg() {
        
        $resData = array();
        $resData["success"] = 0;
        $resData["msg"] = 'Извините, произошла ошибка';
        echo json_encode($resData);
		
	}
    
    
}
