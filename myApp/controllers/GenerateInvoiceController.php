<?php

use Dompdf\Dompdf;


class GenerateInvoiceController extends AppController {
    public function __construct(){
        $this->init();
    }

    public function init(){


        $data['nrSerieFactura'] = "numar Serie Factura";
        
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->render(APP_PATH.VIEWS.'invoiceTemplate.html',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($data['nrSerieFactura']);
    }
}