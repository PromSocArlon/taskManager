<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 10-04-18
 * Time: 20:12
 */

namespace app\core\exceptions;


use app\controllers\ErrorController;

class ErrorHandler {
    public static function handleError(\Throwable $ex) : void {
        $errorController = new ErrorController();
        switch (true) {
            case $ex instanceof \HttpRequestException :
                $errorController->error400();
                break;
            case $ex instanceof UnauthorizedException :
                $errorController->error401();
                break;
            case $ex instanceof ControllerNotDefinedException :
            case $ex instanceof ActionNotDefinedException :
                $errorController->error403();
                break;
            case $ex instanceof \HttpException:
                $errorController->error404();
                break;
            case $ex instanceof \HttpUrlException :
                $errorController->error408(); //Si time-out !
                break;
            case $ex instanceof \InvalidArgumentException :
            case $ex instanceof \RuntimeException :
            case $ex instanceof \Error:
                $errorController->error500();
                break;
            default:
                $errorController->error500();
                break;
        }
    }
}