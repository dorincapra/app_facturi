<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){


        $userName = $_POST['userName'];
        $password = $_POST['password'];

        
        $data["userName"]=$userName;
        $data["password"]=$password;
        echo $this->render(APP_PATH.VIEWS.'layout.html', $data);

    }
}