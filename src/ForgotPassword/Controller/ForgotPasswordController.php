<?php

namespace src\ForgotPassword\Controller;
use src\ForgotPassword\Business\ForgotPasswordBusinessFactory;
use src\ForgotPassword\View\ForgotPasswordView;
class ForgotPasswordController
{

    public function ForgotPasswordViewAction()
    {
        $ForgotPasswordBusinessFactory = new ForgotPasswordBusinessFactory();

        $ForgotPasswordBusiness = $ForgotPasswordBusinessFactory->createForgotPasswordBusiness();
        
        $this->view($ForgotPasswordBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $ForgotPasswordView = new ForgotPasswordView();
        return $ForgotPasswordView->createtable($daten);
    }
}

#ForgotPasswordView