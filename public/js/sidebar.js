document.addEventListener('DOMContentLoaded', function () {
    var menuBtn = document.getElementById('mobileMenuBtn');
    var closeBtn = document.getElementById('sidebarCloseBtn');
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('sidebarOverlay');

    if (!menuBtn || !sidebar || !overlay) {
        return;
    }

    function openMenu() {
        sidebar.classList.add('is-open');
        overlay.classList.add('is-visible');
        menuBtn.setAttribute('aria-expanded', 'true');
    }

    function closeMenu() {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-visible');
        menuBtn.setAttribute('aria-expanded', 'false');
    }

    menuBtn.addEventListener('click', openMenu);

    if (closeBtn) {
        closeBtn.addEventListener('click', closeMenu);
    }

    overlay.addEventListener('click', closeMenu);

    sidebar.querySelectorAll('.menu-item, .logout a').forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });
});