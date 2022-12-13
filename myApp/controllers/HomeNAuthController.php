<?php

class HomeNAuthController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){


    
        $data=[2];
        echo $this->render(APP_PATH.VIEWS.'loginLayout.html', $data);

    }
}