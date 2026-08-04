<?php
use App\Core\AuthHelper;

$activePage = $activePage ?? '';

function isActivePage(string $key, string $activePage): string
{
    return $key === $activePage ? ' active' : '';
}
?>

<button type="button" class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open menu" aria-expanded="false" aria-controls="sidebar">
    <i class="fa-solid fa-bars"></i>
</button>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-top">
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
            <a href="/MO_APP/public/dashboard" class="menu-item<?= isActivePage('dashboard', $activePage) ?>">
                <i class="fa-solid fa-table-columns"></i>
                <span>Dashboard</span>
            </a>

            <a href="/MO_APP/public/data-entry" class="menu-item<?= isActivePage('data-entry', $activePage) ?>">
                <i class="fa-regular fa-file-lines"></i>
                <span>Data Entry</span>
            </a>

            <?php if (AuthHelper::isAdmin()): ?>
                <a href="/MO_APP/public/user-management" class="menu-item<?= isActivePage('user-management', $activePage) ?>">
                    <i class="fa-solid fa-users"></i>
                    <span>User Management</span>
                </a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="logout">
        <a href="/MO_APP/public/logout" id="logoutBtn">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>