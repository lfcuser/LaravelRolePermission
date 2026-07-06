<?php

namespace Lfcuser\LaravelRolePermission\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class AccessForbiddenException extends Exception
{
    protected int $status = SymfonyResponse::HTTP_FORBIDDEN;
}
