<?php
require_once __DIR__ . '/../includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold text-dark mb-1">5</h2>
        <p class="text-secondary small mb-0">Course Overview & Enrolled Student Roster</p>
    </div>
    <div class="d-flex gap-2">
        <a href="courses/index.php" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Courses
        </a>
        <a href="courses/edit.php?id=1" class="btn btn-warning btn-sm text-dark">
            <i class="bi bi-pencil-square me-1"></i> Edit Course
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Course Information Card -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-journal-text me-2 text-success"></i> Course Summary
                </span>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge bg-secondary-subtle text-secondary">Course #50</span>
                    <span class="badge bg-success fs-6 fw-bold px-3 py-2">
                        $5000
                    </span>
                </div>

                <h5 class="fw-bold text-dark mb-2">60</h5>
                <p class="text-secondary small mb-3">
                    <em class="text-muted">No description provided.</em>
                </p>

                <ul class="list-group list-group-flush small">
                    <li class="list-group-item d-flex justify-content-between px-0 py-2">
                        <span class="text-muted"><i class="bi bi-people me-2"></i>Total Enrolled</span>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0 py-2">
                        <span class="text-muted"><i class="bi bi-calendar3 me-2"></i>Created On</span>
                        <span class="fw-medium text-dark">Oct 4, 2026</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Quick Enroll Student Box -->
        <div class="card">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-person-plus-fill me-2 text-primary"></i> Enroll a Student
                </span>
            </div>
            <div class="card-body">
                <!-- <p class="text-muted small mb-0">All registered students are currently enrolled in this course!</p> -->
                <form action="courses/show.php?id=1" method="POST">
                    <input type="hidden" name="action" value="quick_enroll">
                    <div class="mb-3">
                        <label for="student_id" class="form-label small fw-medium">Select Student</label>
                        <select name="student_id" id="student_id" class="form-select form-select-sm" required>
                            <option value="">-- Choose Student --</option>
                            <option value="1">Ahmed Mahmoud (22)</option>
                            <option value="2">Mohamed Ali (23)</option>
                            <option value="3">Omar Hassan (24)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <i class="bi bi-plus-lg me-1"></i> Add Student to Course
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Enrolled Students Table -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-people-fill me-2 text-primary"></i> Enrolled Students Roster (10)
                </span>
            </div>
            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Contact</th>
                            <th>Enrolled Date</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    No students are enrolled in this course yet.
                                </td>
                            </tr> -->

                        <tr>
                            <td>
                                <div class="fw-semibold text-dark">
                                    <a href="students/show.php?id=1" class="text-dark text-decoration-none">
                                        Ahmed Mahmoud
                                    </a>
                                </div>
                                <small class="text-muted">ahmed@gmail.com</small>
                            </td>
                            <td>
                                250552833344
                            </td>
                            <td class="text-secondary small">
                                Oct 4, 2026
                            </td>
                            <td class="text-end">
                                <a href="enrollments/delete.php?id=6&redirect=course&course_id=5"
                                    class="btn btn-outline-danger btn-sm-action"
                                    onclick="return confirm('Remove student &quot;Ahmed Mahmoud&quot; from this course?');"
                                    title="Remove Enrollment">
                                    <i class="bi bi-x-circle me-1"></i> Remove
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>