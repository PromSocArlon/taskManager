<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 10-04-18
 * Time: 20:12
 */

namespace app\core\exceptions;
use app\controllers\ExceptionController;

class ErrorHandler {
    public static function handleError(\Throwable $ex) : void {
        $errorController = new ExceptionController();
        switch (true) {
            case $ex instanceof \HttpRequestException :
                //header('Location: index.php?controller=exception&action=error400');
                $errorController->error400($ex->getMessage());
                break;
            case $ex instanceof UnauthorizedException :
                //header('Location: index.php?controller=exception&action=error401');
                $errorController->error401($ex->getMessage());
                break;
            case $ex instanceof ForbiddenException :
                //header('Location: index.php?controller=exception&action=error403');
                $errorController->error403($ex->getMessage());
                break;
            case $ex instanceof ActionNotDefinedException :
            case $ex instanceof ControllerNotDefinedException :
            case $ex instanceof \HttpException:
                //header('Location: index.php?controller=exception&action=error404');
                $errorController->error404($ex->getMessage());
                break;
            case $ex instanceof \HttpUrlException :
                //header('Location: index.php?controller=exception&action=error408'); //Si time-out !
                $errorController->error408($ex->getMessage());
                break;
            case $ex instanceof \InvalidArgumentException :
            case $ex instanceof \RuntimeException :
            case $ex instanceof \Error:
            case $ex instanceof \Exception:
                //header('Location: index.php?controller=exception&action=error500');
                $errorController->error500($ex->getMessage());
                break;
            default:
                $errorController->error500($ex->getMessage());
                break;
        }
    }
}