<?php

namespace src\AdminLogIn\Controller;
use src\AdminLogIn\Business\AdminLogInBusinessFactory;
use src\AdminLogIn\View\AdminLogInView;
class AdminLogInController
{

    public function AdminLogInViewAction()
    {
        $AdminLogInBusinessFactory = new AdminLogInBusinessFactory();

        $AdminLogInBusiness = $AdminLogInBusinessFactory->createAdminLogInBusiness();
        
        $this->view($AdminLogInBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $AdminLogInView = new AdminLogInView();
        return $AdminLogInView->createtable($daten);
    }
}

#AdminLogInView