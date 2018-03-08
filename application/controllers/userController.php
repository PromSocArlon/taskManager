<?php
//namespace TaskManager\controller;
require_once (__DIR__.'\..\models\DAO\TaskDAO.php');
require_once (__DIR__.'\..\models\DAO\UserDOA.php');
require_once (__DIR__.'\..\core\Security.php');
require_once (__DIR__.'\homeController.php');
class userController extends Controller{

    public static $data;
    /**
     * Show information for one user
     */
    public function edit(){

    }
    public function index() {

    }

    public function connexion()
    {


        $p = new Security();
        $data = $p->getId($_POST['login'],$_POST['password']);
        if ($data)
            {
                $x = new TaskDAO('mysql');
                $x = $x->getAll();
                self::$data = $x;
                require_once(__DIR__."/../views/_shared/header.php");
                $this->generateView();
                require_once(__DIR__."/../views/_shared/footer.php");
            }
        else
            header('Location:http://localhost/taskManager/?controller=home&action=index');
    }

}