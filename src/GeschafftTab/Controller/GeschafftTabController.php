<?php

namespace src\GeschafftTab\Controller;
use src\GeschafftTab\Business\GeschafftTabBusinessFactory;
use src\GeschafftTab\View\GeschafftTabView;
class GeschafftTabController
{

    public function GeschafftTabViewAction()
    {
        $GeschafftTabBusinessFactory = new GeschafftTabBusinessFactory();

        $GeschafftTabBusiness = $GeschafftTabBusinessFactory->createGeschafftTabBusiness();
        
        $this->view($GeschafftTabBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $GeschafftTabView = new GeschafftTabView();
        return $GeschafftTabView->createtable($daten);
    }
}

#GeschafftTabView