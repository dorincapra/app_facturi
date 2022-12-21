<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new UsersModel;

        if($user->isAuth($username, $password)){
        $data["content"]= $this->render(APP_PATH.VIEWS.'homepage.html');
        echo $this->render(APP_PATH.VIEWS.'boilerplate.html', $data);
        } else {
            $data["mesaj"] = "ai gresit user/pass, incearca din nou";
            echo $this->render(APP_PATH.VIEWS.'loginpage.html', $data);
        }
    }
}