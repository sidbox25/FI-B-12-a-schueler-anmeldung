<?php

namespace src\GeschafftTab\Business;

use src\GeschafftTab\Business\GeschafftTabBusiness;

class GeschafftTabBusinessFactory
{
    public function createGeschafftTabBusiness(): GeschafftTabBusiness
    {    
        return new GeschafftTabBusiness();
    }
}
