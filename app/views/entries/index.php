<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="dashboard-container">


    <div class="dashboard-content">
        <h1><?= $title ?? 'MO Data Entry' ?></h1>
        <p>Welcome to the MO Data Entry Dashboard. Use the sidebar to navigate through different sections.</p>
    </div>
</div>