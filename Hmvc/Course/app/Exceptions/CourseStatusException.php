<?php

namespace Hmvc\Course\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Routing\Exceptions\MethodNotAllowedException;

class CourseStatusException extends Exception
{
    public function report()
    {
        // You can add custom reporting logic here if needed
    }

    public function render($request)
    {
        // Define an appropriate HTTP status code based on the exception type
        $statusCode = $this->getCode() ?: 500;

        // Define a default error message
        $errorMessage = '';

        // Include the overall exception message in the response
        $errorMessage .= ' ' . $this->getMessage();

        // Customize error messages and statuses based on specific exception types
        if ($this instanceof ModelNotFoundException) {
            $statusCode = 404; // Not Found
            $errorMessage = 'Resource not found.';
        } elseif ($this instanceof ValidationException) {
            $statusCode = 422; // Unprocessable Entity
            $errorMessage = 'Validation error.';
        } elseif ($this instanceof AuthenticationException) {
            $statusCode = 401; // Unauthorized
            $errorMessage = 'Unauthorized access.';
        } elseif ($this instanceof AuthorizationException) {
            $statusCode = 403; // Forbidden
            $errorMessage = 'Forbidden.';
        } elseif ($this instanceof ThrottleRequestsException) {
            $statusCode = 429; // Too Many Requests
            $errorMessage = 'Too many requests.';
        } elseif ($this instanceof UrlGenerationException) {
            $statusCode = 414; // URI Too Long
            $errorMessage = 'URI too long.';
        } elseif ($this instanceof HttpException && $statusCode === 505) {
            $errorMessage = 'HTTP Version Not Supported.';
        }

        // Handle the exception and return an HTTP response
        return response()->json([
            'error' => 'Custom Exception: ' . $errorMessage
        ], $statusCode);
    }
}
