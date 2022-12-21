<?php

class ShowInvoicesController extends AppController 
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        $invoice = new InvoicesModel();

        $data["content"] = $this->render(APP_PATH.VIEWS.'invoicespage.html');
        echo $this->render(APP_PATH.VIEWS.'boilerplate.html',$data);
    }

}