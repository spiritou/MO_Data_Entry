<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="dashboard-container">
    <?php require __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="main-content">
        <header class="page-header">
            <div>
                <h1>Data Entry</h1>
                <p>Enter hours worked by each staff member of your team.</p>
            </div>

            <div class="section-selector">
                <label>Section</label>
                <select>
                    <option>Maintenance</option>
                </select>
            </div>
        </header>

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
                        <label>Work Order Number <span>*</span></label>
                        <input type="text" id="workOrder" placeholder="Enter work order number">
                    </div>
                    <div class="form-group">
                        <label>Asset Number <span>*</span></label>
                        <input type="text" id="assetNumber" placeholder="Enter asset number">
                    </div>
                    <div class="form-group">
                        <label>Staff Member <span>*</span></label>
                        <select id="staffMember">
                            <option value="">Select staff member</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description of the Work <span>*</span></label>
                    <textarea id="description" rows="4" placeholder="Enter description of the work"></textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Work Date <span>*</span></label>
                        <input type="date" id="workDate">
                    </div>
                </div>
            </form>
        </section>

        <section class="card">
            <div class="card-header">
                <div class="card-icon">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div>
                    <h2>Hours Worked</h2>
                    <p>Enter the start time and end time. Hours worked will be calculated automatically.</p>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Start Time <span>*</span></label>
                    <input type="time" id="startTime">
                </div>
                <div class="form-group">
                    <label>End Time <span>*</span></label>
                    <input type="time" id="endTime">
                </div>
                <div class="form-group">
                    <label>Hours Worked</label>
                    <input type="text" id="hoursWorked" readonly value="0.00">
                </div>
            </div>

            <div class="info-box">
                <i class="fa-solid fa-circle-info"></i>
                <span>Hours worked will be calculated automatically based on the start and end time.</span>
            </div>
        </section>

        <div class="action-buttons">
            <button type="reset" class="btn btn-secondary">
                <i class="fa-solid fa-rotate-left"></i>
                Clear Form
            </button>
            <button type="submit" form="workForm" class="btn btn-primary">
                <i class="fa-regular fa-floppy-disk"></i>
                Save Entry
            </button>
        </div>
    </main>
</div>