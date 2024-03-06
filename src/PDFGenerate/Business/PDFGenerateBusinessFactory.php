<?php

namespace src\PDFGenerate\Business;

use src\PDFGenerate\Business\PDFGenerateBusiness;

class PDFGenerateBusinessFactory
{
    public function createPDFGenerateBusiness(): PDFGenerateBusiness
    {    
        return new PDFGenerateBusiness();
    }
}
