<?php

$activePage = 'data-entry';
?>

<main class="main-content">
    <header class="page-header">
        <div>
            <h1>Data Entry</h1>
            <p>Enter hours worked by each staff of your team.</p>
        </div>

        <div class="section-card">
            <div class="section-icon">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="section-body">
                <label>Section</label>
                <select>
                    <option>Maintenance</option>
                </select>
            </div>
        </div>
    </header>

    <form id="workForm" class="entry-form">
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

            <div class="form-grid">
                <div class="form-group">
                    <label>Work Order Number <span>*</span></label>
                    <div class="input-wrap">
                        <input type="text" id="workOrder" name="work_order" placeholder="Enter work order number">
                        <i class="fa-solid fa-table-cells field-icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Asset Number <span>*</span></label>
                    <div class="input-wrap">
                        <input type="text" id="assetNumber" name="asset_number" placeholder="Enter asset number">
                        <i class="fa-solid fa-table-cells field-icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Staff Member <span>*</span></label>
                    <div class="input-wrap">
                        <select id="staffMember" name="staff_member" class="select-clean">
                            <option value="">Select staff member</option>
                        </select>
                        <i class="fa-solid fa-chevron-down field-icon field-icon--static"></i>
                    </div>
                </div>
            </div>

            <div class="form-group form-group--stack">
                <label>Description of the Work <span>*</span></label>
                <textarea id="description" name="description" rows="4" placeholder="Enter description of the work"></textarea>
            </div>

            <div class="form-grid form-grid--date">
                <div class="form-group">
                    <label>Work Date <span>*</span></label>
                    <div class="input-wrap input-wrap--picker" >
                        <input type="date" id="workDate" name="work_date" class="date-field">
                        <i class="fa-regular fa-calendar field-icon"></i>
                    </div>
                </div>
            </div>
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
                    <div class="input-wrap input-wrap--picker">
                        <input type="time" id="startTime" name="start_time" class="time-field">
                        <i class="fa-regular fa-clock field-icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>End Time <span>*</span></label>
                    <div class="input-wrap input-wrap--picker">
                        <input type="time" id="endTime" name="end_time" class="time-field">
                        <i class="fa-regular fa-clock field-icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Hours Worked (Calculated)</label>
                    <div class="input-wrap input-wrap--unit">
                        <input type="text" id="hoursWorked" name="hours_worked" readonly value="0.00">
                        <span class="field-unit">h</span>
                    </div>
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
            <button type="submit" class="btn btn-primary">
                <i class="fa-regular fa-floppy-disk"></i>
                Save Entry
            </button>
        </div>
    </form>
</main>
