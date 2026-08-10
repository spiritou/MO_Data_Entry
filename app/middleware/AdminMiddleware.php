<?php

namespace App\Middleware;
use App\Core\AuthHelper;
class AdminMiddleware
{
    public static function handle(): void
    {
        if (!AuthHelper::isAdmin()) {
            http_response_code(403);
            exit('Access denied. You do not have permission to access this page.');
        }
    }
}