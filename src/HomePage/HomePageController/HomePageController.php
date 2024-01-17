<?php

namespace src\HomePage\HomePageController;

use src\HomePage\HomePageView\HomePageView;

class HomePageController
{

    public function showAction()
    {
        $this->view(); #sortof like a echo
    }

    public function view()
    {
        $mainView = new HomePageView();
        $mainView->render();
    }

}

#StudentRegistrationView