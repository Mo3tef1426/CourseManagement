<?php

require_once "../classes/Student.php";
use Classes\Student ;
//object 
$studentObj= new Student();
$students = $studentObj->getAll();
require_once __DIR__ . '/../includes/header.php';
?>



<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold text-dark mb-1">Student Management</h2>
        <p class="text-secondary small mb-0">View, register, and manage enrolled students.</p>
    </div>
    <a href="students/create.php" class="btn btn-primary shadow-sm">
        <i class="bi bi-person-plus-fill me-1"></i> Add Student
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-semibold text-dark">
            <i class="bi bi-people-fill me-2 text-primary"></i> All Students (5)
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-custom mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Enrolled Courses</th>
                    <th class="text-end" style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(empty($students)){ ?>

                <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            No students registered yet. Click "Add Student" to create the first record.
                        </td>
                    </tr>
                <tr>
                    <?php  } else { ?>

                    <?php 
                        foreach($students  as $student ){  ?>
                    <td class="text-secondary fw-semibold">#<?php echo $student['id'] ?></td>
                    <td class="fw-semibold text-dark">
                        <a href="students/show.php?id=1" class="text-dark text-decoration-none hover-primary">
                            <?php echo $student['name'] ?>
                        </a>
                    </td>
                    <td><?php echo $student['email'] ?></td>
                    <td><?php echo $student['phone'] ?></td>
                    <td>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle badge-count">
                            <i class="bi bi-journal-bookmark me-1"></i>
                            3 Courses
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="students/show.php?id=<?php echo $student['id'] ?>"
                                class="btn btn-outline-info"
                                title="View Details">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="students/edit.php?id=<?php echo $student['id'] ?>"
                                class="btn btn-outline-warning"
                                title="Edit Student">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="students/delete.php?id=<?php echo $student['id'] ?>"
                                class="btn btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete student &quot;Ahmed Mahmoud&quot;? All their enrollments will also be removed.');"
                                title="Delete Student">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>