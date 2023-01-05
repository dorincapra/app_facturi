<?php

class AddInvoiceController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {

        $series = $_POST['series'];
        $number = $_POST['number'];
        $emitDate = date('Y-m-d', strtotime($_POST['emitDate']));
        $currency = $_POST['currency'];
        //$clientName = $_POST['clientName'];
        $j = $_POST['j'];
        $VAT = $_POST['vat'];
        $items = $_POST['items'];
        $value = $_POST['value'];
        

        $invoice = new InvoicesModel();

        $clientID = 1;
        $status = 1;

        if ($invoice->createInvoice($clientID, $items, $value, $series, $currency, $status, $emitDate)) {
            //show "userul a fost adaugat cu success" for 3 sec 
            //then redirect to "Users" page
            return true;
        } else {
            //show "userul NU a fost adaugat, contacteaza developerul" for 3 sec 
            //then redirect to "Users" page
            return false;
        }



    }
}
