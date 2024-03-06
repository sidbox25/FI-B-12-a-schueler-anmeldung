<?php

namespace src\PDFGenerate\Controller;
use src\PDFGenerate\Business\PDFGenerateBusinessFactory;
use src\PDFGenerate\View\PDFGenerateView;
class PDFGenerateController
{

    public function PDFGenerateViewAction()
    {
        $PDFGenerateBusinessFactory = new PDFGenerateBusinessFactory();

        $PDFGenerateBusiness = $PDFGenerateBusinessFactory->createPDFGenerateBusiness();
        
        $this->view($PDFGenerateBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $PDFGenerateView = new PDFGenerateView();
        return $PDFGenerateView->createtable($daten);
    }
}

#PDFGenerateView