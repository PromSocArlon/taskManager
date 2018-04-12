<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 10-04-18
 * Time: 20:12
 */

namespace app\core\exceptions;


use app\core\Controller;

class ErrorHandler {
    public static function handleError(\Exception $ex) : void {
            $code = -1;

            switch (true) {
                case $ex instanceof \HttpRequestException : $code = 400;
                    break;
                case $ex instanceof UnauthorizedException : $code = 401;
                    break;
                case $ex instanceof ControllerNotDefinedException :
                case $ex instanceof ActionNotDefinedException : $code = 403;
                    break;
                case $ex instanceof \HttpException: $code = 404;
                    break;
                case $ex instanceof \HttpUrlException : $code = 408; //Si time-out !
                    break;
                case $ex instanceof \InvalidArgumentException :
                case $ex instanceof \RuntimeException : $code = 500;
                    break;
                default: $code = -1;
                    break;
            }
    }
}