<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 12-04-18
 * Time: 17:32
 */

namespace app\core\exceptions;


use Throwable;

class ControllerNotDefinedException extends \Exception {
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null) {
        parent::__construct($message, 403, $previous);
    }
}