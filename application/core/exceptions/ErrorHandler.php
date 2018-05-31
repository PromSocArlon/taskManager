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
		$_SESSION["errorMessage"] = $ex->getMessage();
        $errorController = new ExceptionController();
        switch (true) {
            case $ex instanceof \HttpRequestException :
                header('Location: index.php?controller=exception&action=error400');
                break;
            case $ex instanceof UnauthorizedException :
                header('Location: index.php?controller=exception&action=error401');
                break;
            case $ex instanceof ForbiddenException :
                header('Location: index.php?controller=exception&action=error403');
                break;
            case $ex instanceof ActionNotDefinedException :
            case $ex instanceof ControllerNotDefinedException :
            case $ex instanceof \HttpException:
                header('Location: index.php?controller=exception&action=error404');
                break;
            case $ex instanceof \HttpUrlException :
                header('Location: index.php?controller=exception&action=error408'); //Si time-out !
                break;
            case $ex instanceof \InvalidArgumentException :
            case $ex instanceof \RuntimeException :
            case $ex instanceof \Error:
            case $ex instanceof \Exception:
                header('Location: index.php?controller=exception&action=error500');
                break;
            default:
                 header('Location: index.php?controller=exception&action=error500');
                break;
        }
    }
}