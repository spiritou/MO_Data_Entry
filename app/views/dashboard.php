<?php
session_start();
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

    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
        <p>You are logged in as <strong>admin</strong>.</p>
        <button>Admin-only button</button>
    <?php else: ?>
        <p>You are logged in as <strong>regular user</strong>.</p>
    <?php endif; ?>
</body>
</html>