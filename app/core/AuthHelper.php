<?php
//here will be constructed a helper class to handle role base acces controle

namespace App\Core;

class AuthHelper {
    public static function isAdmin(): bool {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
