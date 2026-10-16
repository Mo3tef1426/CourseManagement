<?php
require_once __DIR__ . '/../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="h4 fw-bold text-dark mb-1">Add New Student</h2>
                <p class="text-secondary small mb-0">Fill in the details below to register a new student.</p>
            </div>
            <a href="students/index.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to List
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-person-fill-add me-2 text-primary"></i> Student Information
                </span>
            </div>
            <div class="card-body p-4">
                <form action="students/store.php" method="POST">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                        <input type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            placeholder="e.g. John Doe"
                            required>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                        <input type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="e.g. john.doe@example.com"
                            required>
                        <div class="form-text">Each student must have a unique email address.</div>
                    </div>

                    <!-- Phone Field -->
                    <div class="mb-4">
                        <label for="phone" class="form-label fw-medium">Phone Number</label>
                        <input type="text"
                            name="phone"
                            id="phone"
                            class="form-control"
                            placeholder="e.g. +1 555-0199 or 01012345678">
                        <div class="form-text">Optional contact phone number.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="students/index.php" class="btn btn-light px-4 border">Cancel</a>
                        <button type="submit" name = "submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Save Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>