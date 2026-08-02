<?php
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

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?= $content ?>

    <script src="/MO_app/public/js/entry.js"></script>
</body>
</html>
