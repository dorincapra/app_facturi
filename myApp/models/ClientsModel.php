<?php

class ClientsModel extends DBModel
{
    protected $name;
    protected $cui;
    protected $j;

    public function __construct($name='', $cui='', $j='', $judet='', $idAgent='', $email='', $tel=''){
        $this->name = $name;
        $this->cui = $cui;
        $this->j = $j;
        $this->judet = $judet;
        $this->email = $email;
        $this->tel = $tel;
    }


    public function addClient($name, $cui, $j){
        //$q = "INSERT INTO..."
    }

}