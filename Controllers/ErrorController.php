<?php

require_once 'AppController.php';


class ErrorController extends AppController {

    public function pageNotFound()
    {
        $this->render('404');
    }
    public function forbidden()
    {
        $this->render('403');
    }

}