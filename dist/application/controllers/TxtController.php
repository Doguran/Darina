<?php

class TxtController implements IController {
    
    public function indexAction() {
		throw new Exception("Нет запроса"); 
    }
    


    public function pageAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("stock.tpl.php");
        $fc->setBody($output);
    }

    public function blogAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("blog.tpl.php");
        $fc->setBody($output);
    }

    public function postAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("adminindex.tpl.php");
        $fc->setBody($output);
    }

    public function contactAction() {
        $fc = FrontController::getInstance();

        $model = new FileModel();

        $output = $model->render("contact.tpl.php");
        $fc->setBody($output);
    }


    public function phonemodalAction() {
        // Если  запрос не AJAX (XMLHttpRequest), то завершить работу
        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
            exit();
        }
        $fc = FrontController::getInstance();
        $model = new FileModel();

        //выводим все
        $output['body'] = $model->render("phone-form.tpl.php");
        $fc->setBody(json_encode($output));
    }

    public function sendmailAction() {

        if($_SERVER["REQUEST_METHOD"]=='POST'){

            $phone  = Helper::clearData($_POST['phone']);
            $name   = Helper::clearData($_POST['name']);
            $email   = Helper::clearData($_POST['email']);
            $text   = Helper::clearData($_POST['text']);
            $subject   = Helper::clearData($_POST['subject']);
            $action = Helper::clearData($_POST['action']);
            $url    = Helper::clearData($_POST['url']);
            if(empty($phone) || empty($name) || $action != "send" || $url != ""){
                $resData["success"] = 0;
                $resData["msg"] = 'Извините, произошла ошибка';
                echo json_encode($resData);
            }else{

                $mailSMTP = new SendMailSmtpClass(SMTP_USERNAME, SMTP_PASSWORD, SMTP_HOST, SMTP_PORT, "UTF-8");

                // от кого
                $from = array(
                  "Darina", // Имя отправителя
                  SMTP_USERNAME // почта отправителя
                );
                // кому
                $to = constant('SMTP_TO')=='' ? Helper::getAdminMail() : constant('SMTP_TO');

                //текст письма
                $name = "<strong>Имя:</strong> $name<br />";
                $phone = "<strong>Телефон:</strong> $phone<br />";
                $email = $email=="" ? "" : "<strong>Email:</strong> $email<br />";
                $text = $text=="" ? "" : "<strong>Сообщение:</strong> $text<br />";

                $htmlVersion = "
                    $subject с сайта ".$_SERVER['HTTP_HOST']."<br /><br />
                    $name
                    $phone
                    $email
                    $text
                    ";

                // отправляем письмо
                $result =  $mailSMTP->send($to, $subject, $htmlVersion, $from);
                // $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Отправитель письма');

                if($result === true){
                    $resData["success"] = 1;
                    $resData["msg"] = "<p>Спасибо. Мы свяжемся с Вами в ближайшее время.</p>";
                }else{
                    $resData["success"] = 0;
                    $resData["msg"] = "<p>Произошла ошибка</p>";
                }

                echo json_encode($resData);
            }
        }
    }


    public function passAction() {
        echo Helper::cryptoPass('***');
    }





    


    
}
