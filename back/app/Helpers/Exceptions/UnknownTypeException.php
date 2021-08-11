<?php

namespace App\Helpers\Exceptions;

use Throwable;

class UnknownTypeException extends \Exception
{
    public function __construct($mime = null, $message = null, $code = 0, Throwable $previous = null)
    {
        if($mime !== null && $message === null) {
            $message = 'El tipo MIME ' . $mime . ' ingresado no es reconocido.';
        }

        parent::__construct($message, $code, $previous);
    }
}