<?php
include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">

<div class="container py-4">

    <!-- Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-2 text-center">
                    <img src="assets/images/logo.png"
                         class="img-fluid"
                         style="max-height:80px;"
                         alt="Logo">
                </div>

                <div class="col-md-10">
                    <h2 class="fw-bold text-primary">
                        Employee Management System
                    </h2>

                  
                </div>

            </div>

        </div>
    </div>

    <!-- Search -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-search"></i>
            Search Employee
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-8">
                    <input
                        type="text"
                        id="searchPhone"
                        class="form-control"
                        placeholder="Enter Mobile Number">
                </div>

                <div class="col-md-4 d-grid">
                    <button
                        id="btnSearch"
                        class="btn btn-primary">

                        <i class="bi bi-search"></i>
                        Search

                    </button>
                </div>

            </div>

        </div>

    </div>

    <!-- Employee Form -->

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">

            <i class="bi bi-person-vcard"></i>

            Employee Details

        </div>

        <div class="card-body">

            <form id="employeeForm">

                <input type="hidden" id="id" name="id">

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label>Date</label>

                        <input
                        type="date"
                        class="form-control"
                        name="emp_date"
                        id="emp_date"
                        value="<?php echo date('Y-m-d');?>">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Type</label>

                        <select
                        class="form-select"
                        name="emp_type"
                        id="emp_type">

                            <option value="">Select</option>
                            <option>Lead</option>
                            <option>Customer</option>
                            <option>Employee</option>
                            <option>Vendor</option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Status</label>

                        <select
                        class="form-select"
                        name="status"
                        id="status">

                            <option value="">Select</option>
                            <option>New</option>
                            <option>Pending</option>
                            <option>Completed</option>

                        </select>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label>Employee ID</label>

                        <input
                        type="text"
                        class="form-control"
                        name="emp_id"
                        id="emp_id">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Name</label>

                        <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Phone Number</label>

                        <input
                        type="text"
                        class="form-control"
                        name="phone"
                        id="phone">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label>Email</label>

                        <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Location</label>

                        <input
                        type="text"
                        class="form-control"
                        name="location"
                        id="location">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Availability</label>

                        <select
                        class="form-select"
                        name="availability"
                        id="availability">

                            <option value="">Select</option>
                            <option>Available</option>
                            <option>Busy</option>
                            <option>Leave</option>

                        </select>

                    </div>

                </div>

                <div class="mb-3">

                    <label>Note</label>

                    <textarea
                    class="form-control"
                    rows="4"
                    name="note"
                    id="note"></textarea>

                </div>

                <div class="text-center">

                    <button
                    type="button"
                    id="saveBtn"
                    class="btn btn-success px-5">

                        <i class="bi bi-check-circle"></i>

                        Save

                    </button>

                    <button
                    type="button"
                    id="updateBtn"
                    class="btn btn-warning px-5"
                    style="display:none;">

                        <i class="bi bi-pencil-square"></i>

                        Update

                    </button>

                    <button
                    type="reset"
                    class="btn btn-secondary px-5">

                        <i class="bi bi-arrow-clockwise"></i>

                        Reset

                    </button>

                </div>

            </form>

            <div class="card shadow mt-4">

    <div class="card-header bg-dark text-white">

        Employee List

    </div>

    <div class="card-body">

        <div id="employeeTable"></div>

    </div>

</div>

        </div>

    </div>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>
</html>