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

        if(!$data) return;

        $arr = $data[$parent];

        for($i = 0; $i < count($arr); $i++)
        {


            $this->comments .= '<div class="media media-box mt-3" id="com'. $arr[$i]['id'] . '">
            <img src="http://www.gravatar.com/avatar/' . md5($arr[$i]['email']) . '?s=32&d=mm&r=G" class="mr-3" alt="' . $arr[$i]['name'] . '">
            <div class="media-body">
                <div class="post w-100 float-left mb-2 bg-light p-1">
                    <div class="name float-left"><strong>' . $arr[$i]['name'] . '</strong></div>
                    <div class="date3 float-right small">' . $arr[$i]['date_add'] . '</div>
                </div>
        '   . $arr[$i]['comment'];
            if(ADMIN){
                $this->comments .= '<div class="text-right"><a href="/admincomment/delete/id/'. $arr[$i]['id'] . '/" class="del-comment"><i class="fas fa-times"></i></a></div>';
            }
            $this->comments .= '<div class="reply-div"><a href="#" class="psewdo-link reply">Ответить</a></div>';

            if (isset($data[$arr[$i]['id']])) {
                $this->my_sort($data, $arr[$i]['id']);
            }
            $this->comments .= '</div></div>';


        }

    }

    public function getformAction() {
        // Если  запрос не AJAX (XMLHttpRequest), то завершить работу
        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
            exit();
        }
        $fc = FrontController::getInstance();
        $model = new FileModel();

        //выводим все
        $output = $model->render("blocks/comment-form.tpl.php");
        $fc->setBody(json_encode($output));
    }

    public function getCommentsArr(){
        return $this->comments;

    }


    public function addAction() {



        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && isset($_SESSION['user']['id'])) {

            if($_SERVER["REQUEST_METHOD"]=='POST'){


                $name =  Helper::clearData($_POST["name"]);
                $url =  Helper::clearData($_POST["url"]);
                $email =  Helper::clearData($_POST["email"],'email');
                $parent_id =  Helper::clearData($_POST["comment_parent_ID"],'i');
                $id_post =  Helper::clearData($_POST["post_ID"],'i');
                $text =  Helper::clearData($_POST["text"]);
                $action =  Helper::clearData($_POST["action"]);

                //проверка на ошибки
                $error = array();
                if($url)               $error[] = "Спам";
                if($action != 'send')  $error[] = "Спам2";
                if(!$text || mb_strlen($text,'utf-8') < 5 )   $error[] = "Слишком короткий текст комментария";
                if(!$name)             $error[] = "Не указано имя";
                if(!$email)            $error[] = "Неверный email";
                if(!$id_post)          $error[] = "Ошибка post_ID";

                if(empty($error)){//если ошибок нет

                    //устанавливаем куки
                    //setcookie("user_name",$name,time()+60*60*24*30*3);// 3 месяца
                    //setcookie("user_email",$email,time()+60*60*24*30*3);

                    $this->sendmail($id_post,$name,$email,$text);

                    $CommentModel = new CommentModel();
                    $id = $CommentModel->insert($id_post,$parent_id,$name,$email,$text);

                    if($id){
                        $this->ok_msg($name,$email,$text,$parent_id,$id);
                    }else{
                        $this->not_ok_msg('Ошибка добавления в базу');
                    }

                }else{//если ошибки есть
                    $er = "";
                    foreach($error as $val){
                        $er .= $val."<br />";
                    }
                    $this->not_ok_msg($er);

                }



            }

        }else{
            throw new Exception("Нет запроса");
        }

    }


    private function ok_msg($name,$email,$text,$parent_id,$id) {

        $date = date ( "d M Y" );
        $resData = array();
        $resData["success"] = 1;
        $resData["parent"] = $parent_id;
        $resData["id"] = $id;
        $resData["msg"] = "Спасибо, Ваш отзыв добавлен.";
        $resData["comment"] =  '<div class="media media-box mt-3" id="com'. $id . '">
            <img src="http://www.gravatar.com/avatar/' . md5($email) . '?s=32&d=mm&r=G" class="mr-3" alt="' . $name . '">
            <div class="media-body">
                <div class="post w-100 float-left mb-2 bg-light p-1">
                    <div class="name float-left"><strong>' . $name . '</strong></div>
                    <div class="date3 float-right small">' . $date . '</div>
                </div>
        '   . $text . '
            </div></div>';

        echo json_encode($resData);


    }
    private function not_ok_msg($er) {

        $resData = array();
        $resData["success"] = 0;
        $resData["msg"] = $er;
        echo json_encode($resData);

    }


    public function sendmail($id_post,$name,$email,$text) {

        $BlogModel = new BlogModel();
        $post = $BlogModel->getPostFromId($id_post);



        $mailSMTP = new SendMailSmtpClass(SMTP_USERNAME, SMTP_PASSWORD,
          SMTP_HOST, SMTP_PORT, "UTF-8");

        // от кого
        $from = [
          "Darina", // Имя отправителя
          SMTP_USERNAME // почта отправителя
        ];
        // кому
        $to = constant('SMTP_TO') == '' ? Helper::getAdminMail()
          : constant('SMTP_TO');

        $subject = "Новый комментарий на сайте $_SERVER[HTTP_HOST]";
        $htmlVersion
          = "Оставлен комментарий к статье <a href='".HTTP_PATH."blog/$post[url].html'>$post[h1]</a>.<br>
                Имя: $name<br>
                Почта: $email<br>
                $text
            ";

        // отправляем письмо
        $mailSMTP->send($to, $subject, $htmlVersion, $from);
        //$mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Отправитель письма');


    }


}
