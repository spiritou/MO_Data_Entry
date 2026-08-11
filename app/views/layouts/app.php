<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title = $title ?? 'MO Data Entry';
$content = $content ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>

    <link rel="stylesheet" href="/MO_app/public/css/entry.css">
    <link rel="stylesheet" href="/MO_app/public/css/sidebar.css">
    <link rel="stylesheet" href="/MO_app/public/css/user-management.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <?php require __DIR__ . '/../partials/sidebar.php'; ?>

        <div class="page-shell">
            <?= $content ?>
        </div>
    </div>

    <script src="/MO_app/public/js/sidebar.js"></script>
    <script src="/MO_app/public/js/entry.js"></script>
</body>
</html>