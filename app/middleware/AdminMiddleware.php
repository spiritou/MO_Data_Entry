<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function handle(): void
    {
        if ($_SESSION['role'] !== 'admin') {
            http_response_code(403);
            exit('Access denied. You do not have permission to access this page.');
        }
    }
}