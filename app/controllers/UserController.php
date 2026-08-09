<?php

namespace App\Core;
use Exception;

class UserController
{
    public function index(): void
    {
        View::render('users/index', ['title' => 'User Management'], 'app');
    }
}