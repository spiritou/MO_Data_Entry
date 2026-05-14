<?php
namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    private UserModel $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function authenticate(string $username, string $password)
    {
        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}