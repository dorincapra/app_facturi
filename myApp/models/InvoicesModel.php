<?php

class InvoicesModel extends DBModel 
{
    protected $id;
    protected $client;
    protected $items;
    protected $value;

    public function __construct($client='', $items='', $value=''){
        $this->client = $client;
        $this->items = $items;
        $this->value = $value;
    }


    public function createInvoice($client, $items)
    {
        //$q = "INSERT INTO...."
    }

    public function displayInvoices(){
        //$q = "SELECT * FROM...";
    }
}