<?php
namespace App\Controllers;

class EntryController
{
    public function index(): void
    {
        require_once __DIR__ . '/../views/entries/index.php';
    }
}