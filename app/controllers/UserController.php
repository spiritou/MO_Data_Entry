<?php

namespace App\Controllers;
use App\Core\View;
use Exception;

class UserController
{
    public function index(): void
    {
        View::render('users/index', ['title' => 'User Management'], 'app');
    }
}