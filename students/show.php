<?php

    require_once "../classes/Student.php";
    use Classes\Student ;
    //object 
    $studentObj= new Student();
    $id = $_GET['id'];
    $student = $studentObj->getById($id);
    $numOfCourses = $studentObj->countCourses($id);
    $courses = $studentObj->getStudentCourses($id);

    // $numOfCourses= $studentObj->c       function for count courses
    require_once __DIR__ . '/../includes/header.php';
    
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold text-dark mb-1"><?php echo $student['name'] ?></h2>
        <p class="text-secondary small mb-0"><?php echo $student['email'] ?></p>
        <p class="text-secondary small mb-0"> Courses :<?php echo $numOfCourses['total']; ?>
</p>
    </div>
    <div class="d-flex gap-2">
        <a href="index.php" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Students
        </a>
        <a href="edit.php" class="btn btn-warning btn-sm text-dark">
            <i class="bi bi-pencil-square me-1"></i> Edit Student
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Student Information Card -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-person-badge-fill me-2 text-primary"></i> Personal Details
                </span>
            </div>
            <div class="card-body">
                <div class="text-center pb-3 border-bottom mb-3">
                    <div class="avatar-placeholder bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px; font-size: 1.75rem;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-0 text-dark"><?php echo $student['name'] ?></h5>
                    <span class="badge bg-secondary-subtle text-secondary mt-1">Student #<?php echo $student['id'] ?></span>
                </div>

                <ul class="list-group list-group-flush small">
                    <li class="list-group-item d-flex justify-content-between px-0 py-2">
                        <span class="text-muted"><i class="bi bi-envelope me-2"></i>Email</span>
                        <span class="fw-medium text-dark"><?php echo $student['email'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0 py-2">
                        <span class="text-muted"><i class="bi bi-telephone me-2"></i>Phone</span>
                        <span class="fw-medium text-dark"><?php echo $student['phone'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0 py-2">
                        <span class="text-muted"><i class="bi bi-calendar3 me-2"></i>Registered</span>
                        <span class="fw-medium text-dark">2026-04-06 12:12:12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0 py-2">
                        <span class="text-muted"><i class="bi bi-journal-check me-2"></i>Active Courses</span>
                        <span class="badge bg-primary rounded-pill"> <?php echo $numOfCourses['total']; ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Quick Enroll Box -->
        <div class="card">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-plus-circle-fill me-2 text-success"></i> Enroll in New Course
                </span>
            </div>
            <div class="card-body">

                <!-- <p class="text-muted small mb-0">This student is already enrolled in all available courses!</p> -->
                <form action="students/show.php?id=1" method="POST">
                    <input type="hidden" name="action" value="quick_enroll">
                    <div class="mb-3">
                        <label for="course_id" class="form-label small fw-medium">Select Course</label>
                        <select name="course_id" id="course_id" class="form-select form-select-sm" required>
                            <option value="">-- Choose Course --</option>
                            <option value="1">
                                PHP ($100)
                            </option>
                            <option value="2">
                                Laravel ($500)
                            </option>
                            <option value="3">
                                JS ($500)
                            </option>
                            <option value="4">
                                Python ($500)
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm w-100">
                        <i class="bi bi-check2-circle me-1"></i> Enroll Student
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Enrolled Courses Table -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-journal-bookmark-fill me-2 text-primary"></i> Enrolled Courses (<?php echo $numOfCourses['total']; ?>)
                </span>
            </div>
            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Price</th>
                            <th>Enrolled Date</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    This student is not enrolled in any courses yet.
                                </td>
                            </tr> -->

                            <!-- student show one  -->
                            <?php foreach($courses as $course){ ?>

                        <tr>
                            <td>
                                <div class="fw-semibold text-dark">
                                    <a href="courses/show.php?id=<?php echo $course['course_id']; ?>" class="text-dark text-decoration-none">
                                        <?php echo $course['title']; ?>
                                    </a>
                                </div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;">
                                    <!-- PHP ($100) -->  <?php echo $course['price']; ?>
                                </small>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                    <!-- $100 -->  $<?php echo $course['price']; ?>
                                </span>
                            </td>
                            <td class="text-secondary small">
                               <?php echo $course['enrolled_at']; ?>
                            </td>
                            <td class="text-end">
                                <a href="enrollments/delete.php?id=<?php echo $course['enrollment_id']; ?> &redirect=student&student_id=5"
                                    class="btn btn-outline-danger btn-sm-action"
                                    onclick="return confirm('Remove student from &quot;PHP&quot;?');"
                                    title="Drop Course">
                                    <i class="bi bi-x-circle me-1"></i> Drop
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>