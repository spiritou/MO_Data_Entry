<?php
use App\Core\AuthHelper;
?>

<aside class="sidebar">
    <div class="logo">
        <div class="logo-icon">
            <i class="fa-solid fa-gear"></i>
        </div>

        <div class="logo-text">
            <h2>MO Data Entry</h2>
            <span>Maximo Optimized</span>
        </div>
    </div>

    <nav class="menu">
        <a href="#" class="menu-item active">
            <i class="fa-solid fa-table-columns"></i>
            <span>Dashboard</span>
        </a>

        <a href="#" class="menu-item">
            <i class="fa-regular fa-file-lines"></i>
            <span>Data Entry</span>
        </a>

        <?php if (AuthHelper::isAdmin()): ?>
            <a href="#" class="menu-item">
                <i class="fa-solid fa-users"></i>
                <span>User Management</span>
            </a>
        <?php endif; ?>
    </nav>

    <div class="logout">
        <a href="#" id="logoutBtn">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
