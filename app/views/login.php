<?php require_once __DIR__ . '/../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operations Tracker Login</title>
    <link rel="stylesheet" href="<?= APP_URL ?>/css/login.css">
</head>
<body>
    <main class="login-page">
        <section class="login-panel" aria-labelledby="login-title">
            <div class="login-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" role="img">
                    <path d="M7.75 10.25V8.5a4.25 4.25 0 1 1 8.5 0v1.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.75 10.25h10.5a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H6.75a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                </svg>
            </div>

            <header class="login-header">
                <h1 id="login-title">Operations Tracker</h1>
                <p>Sign in to manage your work hours</p>
            </header>

            <form id="login-form" class="login-form" action="#" method="post">
                <label class="login-field" for="username">
                    <span>Username</span>
                    <input id="username" type="text" name="username" placeholder="Enter your username" autocomplete="username" required>
                </label>

                <label class="login-field" for="password">
                    <span>Password</span>
                    <input id="password" type="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                </label>

                <button id="login-submit" type="submit" class="login-submit">Sign in</button>
            </form>
        </section>
    </main>
    <!-- called by login.js -->
    <script src="<?= APP_URL ?>/js/login.js"></script>
</body>
</html>
