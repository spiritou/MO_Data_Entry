<?php
session_start();
require_once __DIR__ . '/../core/AuthHelper.php';

use App\Core\AuthHelper;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard!</p>

    <?php if (AuthHelper::isAdmin()): ?>
        <p>You are logged in as <strong>admin</strong>.</p>
        <button>Admin-only button</button>
    <?php else: ?>
        <p>You are logged in as <strong>regular user</strong>.</p>
    <?php endif; ?>
</body>
</html>