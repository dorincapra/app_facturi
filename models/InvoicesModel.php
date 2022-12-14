<?php

// invoice status = 1 - emisa, neplatita
// invoice status = 2 - platita, incheiata
// invoice status = 0 - neplatita, anulata

class InvoicesModel extends DBModel
{
    protected $id;
    protected $client;
    protected $items;
    protected $value;
    protected $serie;
    protected $moneda;
    protected $margin;
    protected $status;

    public function __construct($clientID = '', $series = '', $items = '', $value = '', $VAT = '', $totalValue = '', $currency = '', $status = '', $emitDate = '', $payDate = '')
    {
        $this->clientID = $clientID;
        $this->series = $series;
        $this->items = $items;
        $this->$currency = $currency;
        $this->status = $status;
        $this->value = $value;
        $this->VAT = $VAT;
        $this->$totalValue = $totalValue;
        $this->$emitDate = $emitDate;
        $this->$payDate = $payDate;
    }


    public function createInvoice($clientID, $items, $value, $series, $currency, $status, $emitDate)
    {

        $value = (int) $value;
        $VAT = 19 / 100 * $value;
        $totalValue = $value + $VAT;
        $clientID = 1;


        $q = "INSERT INTO `invoices`(`series`, `clientID`, `items`, `value`,`VAT`, `totalValue`, `currency`, `status`, `emitDate`) VALUES (?,?,?,?,?,?,?,?,?)";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("sisiiisis", $series, $clientID, $items, $value, $VAT, $totalValue, $currency, $status, $emitDate);
        return $myPrep->execute();
    }

    public function displayInvoices()
    {
        $q = "SELECT * FROM `invoices`";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
