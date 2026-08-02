<?php

namespace App\Core;
use Exception;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'app'):void
    {
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        if (!file_exists($viewPath)) {
            throw new Exception("View file not found: " . $viewPath);
        }

        // Extract data array into variables
        extract($data);

        // Start output buffering
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        // Include the layout and pass the content
        $layoutPath = __DIR__ . '/../views/layouts/' . $layout . '.php';
        if (!file_exists($layoutPath)) {
            throw new Exception("Layout file not found: " . $layoutPath);
        }

        require $layoutPath;
    }
}