<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 19-04-18
 * Time: 18:59
 */

namespace app\core\exceptions;


class ForbiddenException extends \Exception
{
    public function __construct(string $message = "", int $code = 403, Throwable $previous = null) {
        parent::__construct($message, 403, $previous);
    }
}