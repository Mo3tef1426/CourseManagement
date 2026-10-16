<?php
require_once __DIR__ . '/includes/header.php';

// fetch totals from database

require_once 'classes/Student.php';
require_once 'classes/Course.php';
require_once 'classes/Enrollment.php';

use Classes\Student;
use Classes\Course;
use Classes\Enrollment;

$studentObj = new Student();
$courseObj = new Course();
$enrollmentObj = new Enrollment();

$recentEnrollments = $enrollmentObj->getRecentEnrollments();
$studentsCount = $studentObj->countStudents();
$coursesCount = $courseObj->countCourses();
$enrollmentsCount = $enrollmentObj->countEnrollments();



?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold text-dark mb-1">System Overview</h2>
        <p class="text-secondary small mb-0">Welcome to your Course Management Dashboard.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="students/create.php" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-person-plus me-1"></i> Add Student
        </a>
        <a href="courses/create.php" class="btn btn-outline-success btn-sm">
            <i class="bi bi-journal-plus me-1"></i> Add Course
        </a>
    </div>
</div>

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <!-- Total Students Card -->
    <div class="col-md-4">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <!-- fetch totals from database -->
                    <span class="text-secondary small text-uppercase fw-semibold">Total Students</span>
                    <!-- me -->
                  <h3 class="fw-bold mt-2 mb-0 text-dark">
    <?= $studentsCount['total']; ?>
</h3>
                    <a href="students/index.php" class="text-primary small text-decoration-none mt-2 d-inline-block">
                        View students <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="icon-badge badge-blue">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Courses Card -->
    <div class="col-md-4">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-secondary small text-uppercase fw-semibold">Total Courses</span>
                    <!-- fetch totals from database -->
                    <h3 class="fw-bold mt-2 mb-0 text-dark">
                        <?= $coursesCount['total']; ?>
                    </h3>  <a href="courses/index.php" class="text-success small text-decoration-none mt-2 d-inline-block">
                        View courses <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="icon-badge badge-green">
                    <i class="bi bi-journal-code"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Enrollments Card -->
    <div class="col-md-4">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                   <span class="text-secondary small text-uppercase fw-semibold">Total Enrollments</span>
                   <!-- fetch totals from database -->
                    <h3 class="fw-bold mt-2 mb-0 text-dark">
                        <?= $enrollmentsCount['total']; ?>
                    </h3> <a href="enrollments/index.php" class="text-purple small text-decoration-none mt-2 d-inline-block" style="color: #9333ea;">
                        View enrollments <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="icon-badge badge-purple">
                    <i class="bi bi-check2-circle"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Enrollments & Quick Actions -->
<div class="row g-4">
    <!-- Recent Enrollments Table -->
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text-dark fw-semibold">
                    <i class="bi bi-clock-history me-2 text-primary"></i> Recent Enrollments
                </span>
                <a href="enrollments/index.php" class="small text-decoration-none">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Enrolled Date</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    No enrollments found yet.
                                </td>
                            </tr> -->

                            <!-- foreach catch data    -->
                            <?php foreach($recentEnrollments as $row){ ?>
                        <tr>
                            <td>
                                <div class="fw-semibold text-dark"> <?php echo $row['student_name']; ?></div>
                                <small class="text-muted"><?php echo $row['email']; ?></small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border"><?php echo $row['course_title']; ?></span>
                            </td>
                            <td class="text-secondary small">
                               <?php echo $row['enrolled_at']; ?>
                            </td>
                            <td class="text-end">
                            <a href= "enrollments/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm-action"
                                    onclick="return confirm('Are you sure you want to remove this enrollment?');"
                                    title="Remove Enrollment">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Info / Helpful Links -->
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header">
                <span class="text-dark fw-semibold">
                    <i class="bi bi-lightning-charge-fill me-2 text-warning"></i> Quick Actions
                </span>
            </div>
            <div class="card-body d-flex flex-column gap-3">
                <a href="enrollments/create.php" class="btn btn-primary d-flex align-items-center justify-content-between p-3 rounded-3 text-decoration-none">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-plus-circle-fill fs-4 me-3"></i>
                        <div class="text-start">
                            <div class="fw-bold">New Enrollment</div>
                            <small class="text-white-50">Assign student to course</small>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="students/create.php" class="btn btn-outline-secondary d-flex align-items-center justify-content-between p-3 rounded-3 text-decoration-none">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-plus-fill fs-4 me-3 text-primary"></i>
                        <div class="text-start">
                            <div class="fw-bold text-dark">Register Student</div>
                            <small class="text-muted">Create a new student profile</small>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>

                <a href="courses/create.php" class="btn btn-outline-secondary d-flex align-items-center justify-content-between p-3 rounded-3 text-decoration-none">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-journal-plus fs-4 me-3 text-success"></i>
                        <div class="text-start">
                            <div class="fw-bold text-dark">Create Course</div>
                            <small class="text-muted">Add a new curriculum item</small>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>