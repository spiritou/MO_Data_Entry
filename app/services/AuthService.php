<?php
namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    private UserModel $userModel;
    private SessionService $sessionService;

    public function __construct(UserModel $userModel, SessionService $sessionService)
    {
        $this->userModel = $userModel;
        $this->sessionService = $sessionService;
    }

    public function authenticate(string $username, string $password): bool
    {
        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $this->sessionService->createSession($user);
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        $this->sessionService->destroySession();
    }
}