<?php
require_once __DIR__ . '/../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="h4 fw-bold text-dark mb-1">New Enrollment</h2>
                <p class="text-secondary small mb-0">Assign a registered student to a training course.</p>
            </div>
            <a href="enrollments/index.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Enrollments
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-link-45deg me-2 text-primary"></i> Enrollment Information
                </span>
            </div>
            <div class="card-body p-4">
                <form action="enrollments/create.php" method="POST" novalidate>
                    <!-- Student Selection -->
                    <div class="mb-4">
                        <label for="student_id" class="form-label fw-medium">Student <span class="text-danger">*</span></label>
                        <select name="student_id"
                            id="student_id"
                            class="form-select"
                            required>
                            <option value="">-- Choose a Student --</option>
                            <option value="1">Ahmed Mahmoud</option>
                            <option value="2">Mohamed Ali</option>
                            <option value="3">Omar Hassan</option>
                        </select>
                        <div class="form-text">Don't see the student? <a href="students/create.php">Add a new student</a>.</div>
                    </div>

                    <!-- Course Selection -->
                    <div class="mb-4">
                        <label for="course_id" class="form-label fw-medium">Course <span class="text-danger">*</span></label>
                        <select name="course_id"
                            id="course_id"
                            class="form-select"
                            required>
                            <option value="">-- Choose a Course --</option>
                            <option value="1">Introduction to PHP</option>
                            <option value="2">Advanced JavaScript</option>
                            <option value="3">MySQL for Beginners</option>
                            <option value="4">React.js Fundamentals</option>
                            <option value="5">Laravel Framework</option>
                            <option value="6">Object-Oriented Programming</option>
                            <option value="7">CSS & UI Design</option>
                            <option value="8">Git & Version Control</option>
                            <option value="9">RESTful APIs</option>
                            <option value="10">Database Management Systems</option>
                        </select>
                        <div class="form-text">Don't see the course? <a href="courses/create.php">Create a new course</a>.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="enrollments/index.php" class="btn btn-light px-4 border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle-fill me-1"></i> Complete Enrollment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>