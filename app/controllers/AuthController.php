<?php
namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

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
}
