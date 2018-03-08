<?php

class homeController extends Controller {
    
    public function index(){
        require_once(__DIR__."/../views/_shared/header.php");
        $this->generateView();
        require_once(__DIR__."/../views/_shared/footer.php");
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }
}