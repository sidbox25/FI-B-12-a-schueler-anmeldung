<?php

namespace src\AdminLogIn\Business;

use src\AdminLogIn\Business\AdminLogInBusiness;

class AdminLogInBusinessFactory
{
    public function createAdminLogInBusiness(): AdminLogInBusiness
    {    
        return new AdminLogInBusiness();
    }
}
