<?php
require_once __DIR__ . '/../classes/Enrollment.php';
use Classes\Enrollment;
$enrollObj = new Enrollment();
$enrollments = $enrollObj->getAll();
require_once __DIR__ . '/../includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4 fw-bold">Enrollments (<?php echo count($enrollments); ?>)</h2>
    <a href="enrollments/create.php" class="btn btn-primary">Enroll Student</a>
</div>

<div class="card"><div class="table-responsive">
<table class="table table-custom mb-0">
<thead><tr><th>ID</th><th>Student</th><th>Course</th><th>Date</th><th class="text-end">Action</th></tr></thead>
<tbody>
<?php if (empty($enrollments)) { ?>
<tr><td colspan="5" class="text-center py-4">No enrollments yet.</td></tr>
<?php } else { ?>
<?php foreach ($enrollments as $e) { ?>
<tr>
<td>#<?php echo $e['id']; ?></td>
<td><?php echo htmlspecialchars($e['student_name']); ?></td>
<td><?php echo htmlspecialchars($e['course_title']); ?></td>
<td><?php echo $e['enrolled_at']; ?></td>
<td class="text-end"><a href="enrollments/delete.php?id=<?php echo $e['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Drop?');">Drop</a></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>
</div></div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
