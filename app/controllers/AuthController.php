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

    public function login()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'success' => false,
                'message' => 'Method not allowed'
            ]);

            return;
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->authService->authenticate($username, $password);

        if ($user) {

            // Authentication successful, create session
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];

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
