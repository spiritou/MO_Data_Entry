<?php

namespace App\Core;
use Exception;

class DashboardController
{
    public function index(): void
    {
        View::render('dashboard/index', ['title' => 'Dashboard'], 'app');
    }
}