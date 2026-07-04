<?php
namespace App\Services;

class SessionService
{
    public function createSession(array $user): void
    {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
    }

    public function destroySession(): void
    {
        session_unset();
        session_destroy();
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public function getUserId(): ?int
    {
        return $_SESSION['user_id'] ?? null;
    }
}