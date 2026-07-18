<?php
session_start();
use App\Core\AuthHelper;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MO Data Entry</title>

    <link rel="stylesheet" href="/MO_app/public/css/entry.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

<div class="dashboard-container">

    <!-- ================= Sidebar ================= -->

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

    <!-- ================= Main ================= -->

    <main class="main-content">

        <!-- Header -->

        <header class="page-header">

            <div>

                <h1>Data Entry</h1>

                <p>
                    Enter hours worked by each staff member of your team.
                </p>

            </div>

            <div class="section-selector">

                <label>Section</label>

                <select>

                    <option>Maintenance</option>

                </select>

            </div>

        </header>

        <!-- ================= Work Details ================= -->

        <section class="card">

            <div class="card-header">

                <div class="card-icon">
                    <i class="fa-regular fa-clipboard"></i>
                </div>

                <div>

                    <h2>Work Details</h2>

                    <p>Provide the details of the work performed.</p>

                </div>

            </div>

            <form id="workForm">

                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Work Order Number <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="workOrder"
                            placeholder="Enter work order number">

                    </div>

                    <div class="form-group">

                        <label>
                            Asset Number <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="assetNumber"
                            placeholder="Enter asset number">

                    </div>

                    <div class="form-group">

                        <label>
                            Staff Member <span>*</span>
                        </label>

                        <select id="staffMember">

                            <option value="">
                                Select staff member
                            </option>

                        </select>

                    </div>

                </div>

                <div class="form-group">

                    <label>
                        Description of the Work <span>*</span>
                    </label>

                    <textarea
                        id="description"
                        rows="4"
                        placeholder="Enter description of the work"></textarea>

                </div>

                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Work Date <span>*</span>
                        </label>

                        <input
                            type="date"
                            id="workDate">

                    </div>

                </div>

            </form>

        </section>

        <!-- ================= Hours Worked ================= -->

        <section class="card">

            <div class="card-header">

                <div class="card-icon">

                    <i class="fa-regular fa-clock"></i>

                </div>

                <div>

                    <h2>Hours Worked</h2>

                    <p>
                        Enter the start time and end time.
                        Hours worked will be calculated automatically.
                    </p>

                </div>

            </div>

            <div class="form-grid">

                <div class="form-group">

                    <label>
                        Start Time <span>*</span>
                    </label>

                    <input
                        type="time"
                        id="startTime">

                </div>

                <div class="form-group">

                    <label>
                        End Time <span>*</span>
                    </label>

                    <input
                        type="time"
                        id="endTime">

                </div>

                <div class="form-group">

                    <label>
                        Hours Worked
                    </label>

                    <input
                        type="text"
                        id="hoursWorked"
                        readonly
                        value="0.00">

                </div>

            </div>

            <div class="info-box">

                <i class="fa-solid fa-circle-info"></i>

                <span>
                    Hours worked will be calculated automatically based on
                    the start and end time.
                </span>

            </div>

        </section>

        <!-- ================= Buttons ================= -->

        <div class="action-buttons">

            <button
                type="reset"
                class="btn btn-secondary">

                <i class="fa-solid fa-rotate-left"></i>

                Clear Form

            </button>

            <button
                type="submit"
                form="workForm"
                class="btn btn-primary">

                <i class="fa-regular fa-floppy-disk"></i>

                Save Entry

            </button>

        </div>

    </main>

</div>

<script src="/MO_app/public/js/dashboard.js"></script>

</body>
</html>