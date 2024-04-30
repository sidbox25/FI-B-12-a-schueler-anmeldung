<?php
namespace src\Error\E404\Controller;
use src\Error\E404\View\E404View;
class E404Controller
{
    public function E404ViewAction()
    {
        $this->view(); #sortof like a echo
    }

    public function view()
    {
        $StudentResidenceView = new E404View();
        $StudentResidenceView->createErrorPage();
    }
}