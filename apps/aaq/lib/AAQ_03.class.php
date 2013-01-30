<?php

class AAQ_03 extends AAQ_TCPDF {

    private $content;

    public function __construct($content) {
        parent::__construct();

        $this->pdf->SetTitle("AAQ");
        $this->pdf->SetSubject("factura");
        $this->pdf->SetKeywords("facturas");

        $this->content = $content;
    }

    public function doPDF() {
        $this->pdf->writeHTML($this->content, true, false, true, false, '');

        $this->pdf->lastPage();

        $this->pdf->Output("AireAcondicionadodeQueretaro.pdf", 'I');
        
        throw new sfStopException();
    }

}