<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$activePage = 'user-management';

// Placeholder data for layout purposes only — will be replaced by a DB-backed
// controller + AJAX endpoint once the layout is approved.
$stats = [
    ['label' => 'Total Users', 'value' => 18, 'sub' => 'All registered users', 'icon' => 'fa-users', 'tone' => 'blue'],
    ['label' => 'Active Users', 'value' => 16, 'sub' => 'Currently active', 'icon' => 'fa-user-check', 'tone' => 'green'],
    ['label' => 'Inactive Users', 'value' => 2, 'sub' => 'Currently inactive', 'icon' => 'fa-user-xmark', 'tone' => 'amber'],
    ['label' => 'Roles', 'value' => 3, 'sub' => 'System roles', 'icon' => 'fa-shield-halved', 'tone' => 'purple'],
];

$users = [
    ['id' => 1, 'name' => 'John Doe', 'username' => 'jdoe', 'email' => 'jdoe@company.com', 'role' => 'admin', 'section' => 'All Sections', 'status' => 'active', 'last_login' => '28 May 2024, 09:15'],
    ['id' => 2, 'name' => 'Marie Claire', 'username' => 'mclaire', 'email' => 'mclaire@company.com', 'role' => 'head', 'section' => 'Maintenance', 'status' => 'active', 'last_login' => '28 May 2024, 08:47'],
    ['id' => 3, 'name' => 'Paul Martin', 'username' => 'pmartin', 'email' => 'pmartin@company.com', 'role' => 'head', 'section' => 'Operations', 'status' => 'active', 'last_login' => '27 May 2024, 16:22'],
    ['id' => 4, 'name' => 'Lucie Bernard', 'username' => 'lbernard', 'email' => 'lbernard@company.com', 'role' => 'entry', 'section' => 'Maintenance', 'status' => 'active', 'last_login' => '28 May 2024, 07:55'],
    ['id' => 5, 'name' => 'David K.', 'username' => 'dkalumba', 'email' => 'dkalumba@company.com', 'role' => 'entry', 'section' => 'Operations', 'status' => 'active', 'last_login' => '27 May 2024, 14:03'],
    ['id' => 6, 'name' => 'Sarah B.', 'username' => 'sbakari', 'email' => 'sbakari@company.com', 'role' => 'entry', 'section' => 'Logistics', 'status' => 'inactive', 'last_login' => '15 May 2024, 11:20'],
];

$roleLabels = [
    'admin' => 'Admin',
    'head' => 'Head of Section',
    'entry' => 'Data Entry',
];

$totalUsers = 18;
$rangeStart = 1;
$rangeEnd = count($users);
$currentPage = 1;
$totalPages = 3;
?>

<div class="dashboard-container">
    <main class="main-content">
        <div class="content-inner user-management">
            <header class="page-header">
                <div>
                    <h1>User Management</h1>
                    <p>Manage users, roles and account status.</p>
                </div>
            </header>

            <section class="stats-grid">
                <?php foreach ($stats as $i => $stat): ?>
                    <div class="stat-card<?= $i === 0 ? '' : ' desktop-only' ?>">
                        <div class="stat-icon stat-icon--<?= htmlspecialchars($stat['tone']) ?>">
                            <i class="fa-solid <?= htmlspecialchars($stat['icon']) ?>"></i>
                        </div>
                        <div class="stat-body">
                            <span class="stat-label"><?= htmlspecialchars($stat['label']) ?></span>
                            <span class="stat-value"><?= htmlspecialchars((string) $stat['value']) ?></span>
                            <span class="stat-sub"><?= htmlspecialchars($stat['sub']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <section class="card users-card">
                <div class="users-toolbar">
                    <div>
                        <h2>Users</h2>
                        <p>View and manage system users.</p>
                    </div>

                    <div class="users-toolbar-actions">
                        <div class="search-field">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="userSearch" placeholder="Search users...">
                        </div>

                        <button type="button" class="btn btn-outline desktop-only">
                            <i class="fa-solid fa-filter"></i>
                            Filter
                        </button>

                        <button type="button" class="btn btn-primary desktop-only">
                            <i class="fa-solid fa-plus"></i>
                            Add User
                        </button>
                    </div>
                </div>

                <div class="filter-row">
                    <div class="form-group desktop-only">
                        <label>Filter by Role</label>
                        <div class="input-wrap">
                            <select id="filterRole" class="select-clean">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="head">Head of Section</option>
                                <option value="entry">Data Entry</option>
                            </select>
                            <i class="fa-solid fa-chevron-down field-icon field-icon--static"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Filter by Section</label>
                        <div class="input-wrap">
                            <select id="filterSection" class="select-clean">
                                <option value="">All Sections</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Operations">Operations</option>
                                <option value="Logistics">Logistics</option>
                            </select>
                            <i class="fa-solid fa-chevron-down field-icon field-icon--static"></i>
                        </div>
                    </div>

                    <div class="form-group desktop-only">
                        <label>Filter by Status</label>
                        <div class="input-wrap">
                            <select id="filterStatus" class="select-clean">
                                <option value="">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <i class="fa-solid fa-chevron-down field-icon field-icon--static"></i>
                        </div>
                    </div>
                </div>

                <div class="table-wrap">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th class="desktop-only">Username</th>
                                <th class="desktop-only">Email</th>
                                <th class="desktop-only">Role</th>
                                <th>Section</th>
                                <th class="desktop-only">Status</th>
                                <th class="desktop-only">Last Login</th>
                                <th class="desktop-only">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <?php foreach ($users as $i => $user): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td class="cell-strong"><?= htmlspecialchars($user['name']) ?></td>
                                    <td class="desktop-only"><?= htmlspecialchars($user['username']) ?></td>
                                    <td class="desktop-only"><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="desktop-only">
                                        <span class="badge badge--<?= htmlspecialchars($user['role']) ?>">
                                            <?= htmlspecialchars($roleLabels[$user['role']]) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($user['section']) ?></td>
                                    <td class="desktop-only">
                                        <span class="status-pill status-pill--<?= htmlspecialchars($user['status']) ?>">
                                            <span class="status-dot"></span>
                                            <?= $user['status'] === 'active' ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                    <td class="cell-muted desktop-only"><?= htmlspecialchars($user['last_login']) ?></td>
                                    <td class="desktop-only">
                                        <div class="row-actions">
                                            <button type="button" class="icon-btn icon-btn--edit" aria-label="Edit user">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button" class="icon-btn icon-btn--delete" aria-label="Delete user">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span class="table-footer-count">
                        Showing <?= $rangeStart ?> to <?= $rangeEnd ?> of <?= $totalUsers ?> users
                    </span>

                    <div class="pagination">
                        <button type="button" class="pagination-btn" aria-label="First page">
                            <i class="fa-solid fa-angles-left"></i>
                        </button>
                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                            <button type="button" class="pagination-btn<?= $p === $currentPage ? ' is-active' : '' ?>">
                                <?= $p ?>
                            </button>
                        <?php endfor; ?>
                        <button type="button" class="pagination-btn" aria-label="Next page">
                            <i class="fa-solid fa-angles-right"></i>
                        </button>
                    </div>
                </div>
            </section>

            <section class="info-card desktop-only">
                <div class="info-card-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class="info-card-body">
                    <h3>About Roles</h3>
                    <p>Roles define the access level and permissions a user has in the system.</p>
                </div>
                <dl class="role-legend">
                    <div class="role-legend-row">
                        <dt><span class="badge badge--admin">Admin</span></dt>
                        <dd>Full access to all features and user management.</dd>
                    </div>
                    <div class="role-legend-row">
                        <dt><span class="badge badge--head">Head of Section</span></dt>
                        <dd>Can enter and view data for their section.</dd>
                    </div>
                    <div class="role-legend-row">
                        <dt><span class="badge badge--entry">Data Entry</span></dt>
                        <dd>Can enter data and view records assigned to their section.</dd>
                    </div>
                </dl>
            </section>
        </div>
    </main>
</div>