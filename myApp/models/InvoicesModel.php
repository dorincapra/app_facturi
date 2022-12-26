<?php

// invoice status = 1 - emisa, neplatita
// invoice status = 2 - platita partial, ne-incheiata
// invoice status = 3 - platita total, incheiata
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

    public function __construct($client = '', $items = '', $value = '', $serie = '', $moneda = '', $margin = '', $status = '')
    {
        $this->client = $client;
        $this->items = $items;
        $this->serie = $serie;
        $this->moneda = $moneda;
        $this->margin = $margin;
        $this->status = $status;
    }


    public function createInvoice($client, $items, $value, $serie, $moneda, $margin)
    {
        $q = "INSERT INTO `facturi`(`serie`, `id_client`, `valoare`, `moneda`, `profit`, `status`) VALUES (?,?,?,?,?,1)";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("siisii", $serie, $client, $value, $moneda, $margin, $status);
        return $myPrep->execute();
    }

    public function displayInvoices()
    {
        $q = "SELECT * FROM `facturi`";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
