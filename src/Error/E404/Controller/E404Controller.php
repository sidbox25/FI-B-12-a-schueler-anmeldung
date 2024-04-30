<?php
namespace src\Error\E404\Controller;
use src\Error\E404\View\E404View;
use src\Core\Controller;
class E404Controller implements Controller
{
    public function showViewAction()
    {
        $this->view(); #sortof like a echo
    }

    public function view($data = null)
    {
        $StudentResidenceView = new E404View();
        $StudentResidenceView->createErrorPage();
    }
}