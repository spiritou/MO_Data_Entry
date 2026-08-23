document.addEventListener('DOMContentLoaded', function () {
    var addUserBtn = document.getElementById('addUserBtn');
    var overlay = document.getElementById('addUserModalOverlay');
    var closeBtn = document.getElementById('addUserModalClose');
    var cancelBtn = document.getElementById('addUserCancelBtn');
    var form = document.getElementById('addUserForm');

    if (!overlay) {
        return;
    }

    function openModal() {
        overlay.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        overlay.classList.remove('is-open');
        document.body.style.overflow = '';
        if (form) {
            form.reset();
        }
    }

    if (addUserBtn) {
        addUserBtn.addEventListener('click', openModal);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', closeModal);
    }

    // Close when clicking the dimmed backdrop, but not when clicking inside the modal itself.
    overlay.addEventListener('click', function (event) {
        if (event.target === overlay) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && overlay.classList.contains('is-open')) {
            closeModal();
        }
    });

    // Password show/hide toggles
    document.querySelectorAll('.toggle-password').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var targetId = btn.getAttribute('data-target');
            var input = document.getElementById(targetId);
            if (!input) {
                return;
            }

            var icon = btn.querySelector('i');
            var isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            btn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');

            if (icon) {
                icon.classList.toggle('fa-eye', !isHidden);
                icon.classList.toggle('fa-eye-slash', isHidden);
            }
        });
    });

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            var password = document.getElementById('newUserPassword').value;
            var confirmPassword = document.getElementById('newUserPasswordConfirm').value;

            if (password !== confirmPassword) {
                alert('Password and Confirm Password do not match.');
                return;
            }

            // TODO: replace with a fetch() POST to /api/users once the backend is wired up.
            // On success: close the modal, reset the form, and refresh the users table.
            closeModal();
        });
    }
});