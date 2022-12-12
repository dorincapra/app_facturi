<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){


        session_start();

        
        $data=[2];
        echo $this->render(APP_PATH.VIEWS.'loginLayout.html', $data);

    }
}