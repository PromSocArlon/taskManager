<?php

class homeController extends controller {
    
    public function index(){
        require_once 'application/views/_shared/header.php';
        $this->generateView();
        require_once 'application/views/_shared/footer.php';
    }
}