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
                $code = 400;
                break;
            case $ex instanceof UnauthorizedException :
                $code = 401;
                break;
            case $ex instanceof ControllerNotDefinedException :
            case $ex instanceof ActionNotDefinedException :
                $code = 403;
                break;
            case $ex instanceof \HttpException:
                $code = 404;
                break;
            case $ex instanceof \HttpUrlException :
                $code = 408; //Si time-out !
                break;
            case $ex instanceof \InvalidArgumentException :
            case $ex instanceof \RuntimeException :
                $code = 500;
                break;
            default:
                $code = 500;
                break;
        }
    }
}