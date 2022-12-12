<?php

class HomeController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){


        session_start();

        

        echo $this->render(APP_PATH.VIEWS.'layout.html', $data);

    }
}