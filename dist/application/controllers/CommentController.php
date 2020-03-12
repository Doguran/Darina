<?php
class CommentController implements IController {

    public $comments = '';
    
	public function indexAction() {
		throw new Exception("Нет запроса"); 
    }

    public function getComments($id) {

	    $CommentModel = new CommentModel($id);
        $this->my_sort($CommentModel->getComments($id));
        return $this->getCommentsArr();

    }


    public function my_sort($data, $parent = 0){


        $arr = $data[$parent];

        for($i = 0; $i < count($arr); $i++)
        {


            $this->comments .= '<div class="media  mt-3" id="com'. $arr[$i]['id'] . '">
            <img src="http://www.gravatar.com/avatar/' . md5($arr[$i]['email']) . '?s=32&d=mm&r=G" class="mr-3" alt="' . $arr[$i]['name'] . '">
            <div class="media-body">
                <div class="post w-100 float-left mb-2 bg-light p-1">
                    <div class="name float-left"><strong>' . $arr[$i]['name'] . '</strong></div>
                    <div class="date3 float-right small">' . $arr[$i]['date_add'] . '</div>
                </div>
        '   . $arr[$i]['comment'] . '
            <div id="d'. $arr[$i]['id'] . '"><a href="#" class="psewdo-link reply">Ответить</a></div>';
            if (isset($data[$arr[$i]['id']])) {
                $this->my_sort($data, $arr[$i]['id']);
            }
            $this->comments .= '</div></div>';


        }

    }

    public function getCommentsArr(){
        return $this->comments;

    }

    
    
}
