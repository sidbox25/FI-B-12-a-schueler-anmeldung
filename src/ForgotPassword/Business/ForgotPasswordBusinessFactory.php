<?php

namespace src\ForgotPassword\Business;

use src\ForgotPassword\Business\ForgotPasswordBusiness;

class ForgotPasswordBusinessFactory
{
    public function createForgotPasswordBusiness(): ForgotPasswordBusiness
    {    
        return new ForgotPasswordBusiness();
    }
}
