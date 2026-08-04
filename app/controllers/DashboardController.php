<?php

namespace App\Controllers;

use App\Core\View;

class DashboardController
{
    public function index(): void
    {
        View::render('dashboard/index', ['title' => 'Dashboard'], 'app');
    }
}