<?php

class ShowClientsController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){


        $data["content"] = $this->render(APP_PATH.VIEWS.'companiespage.html');
        echo $this->render(APP_PATH.VIEWS.'boilerplate.html',$data);
    }

}