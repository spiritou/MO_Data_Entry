<?php
namespace App\Controllers;

use App\Services\AuthService;
use App\Core\AuthHelper;
use App\Core\View;

class AuthController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    //this will show the login page
    public function index(): void
    {
        View::render('auth/login', ['title' => 'Operations Tracker Login'], 'guest');
    }

    
    //this will handle the login logic and return a json response
    public function login(): void
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'success' => false,
                'message' => 'Method not allowed'
            ]);

            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        $authenticated = $this->authService->authenticate($username, $password);

        if ($authenticated) {

            echo json_encode([
                'success' => true,
                'message' => 'Login successful'
            ]);

            return;
        }

        echo json_encode([
            'success' => false,
            'message' => 'Invalid username or password'
        ]);

        return;
    }

    public function logout(): void
    {
        $this->authService->logout();
        header('Location: /MO_app/public/');
        exit;
    }
}
