<?php

namespace Intranet\Exceptions;

use Exception;

class InvalidTutStudentException extends Exception
{
    public function __construct()
    {
        parent::__construct("Invalid Tut Student", 401);
    }
}