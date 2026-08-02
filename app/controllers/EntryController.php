<?php
namespace App\Controllers;

use App\Core\View;

class EntryController
{
    public function index(): void
    {
        View::render('entries/index', ['title' => 'MO Data Entry'], 'app');
    }
}