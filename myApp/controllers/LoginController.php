<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){


        $userName = $_POST['userName'];
        $password = $_POST['password'];

        $user = new UsersModel;

        if($user->isAuth($userName, $password)){
        $data["content"]= $this->render(APP_PATH.VIEWS.'homeLayout.html');
        echo $this->render(APP_PATH.VIEWS.'baseLayout.html', $data);
        } else {
            $data["mesaj"] = "ai gresit user/pass, incearca din nou";
            echo $this->render(APP_PATH.VIEWS.'loginLayout.html', $data);
        }
    }
}