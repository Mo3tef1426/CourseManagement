<?php

require_once "../classes/Course.php";
use Classes\Course ;
//object 
$courseObj= new Course();
$courses = $courseObj->getAll();
require_once __DIR__ . '/../includes/header.php';
?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4 fw-bold">Course Catalog (<?php echo count($courses); ?>)</h2>
    <a href="courses/create.php" class="btn btn-success">Add Course</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-custom mb-0">
            <thead><tr><th>ID</th><th>Title</th><th>Price</th><th>Students</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
                <?php if (empty($courses)) { ?>
                    <tr><td colspan="5" class="text-center py-4">No courses yet.</td></tr>
                <?php } else { ?>
                    <?php foreach ($courses as $c) { ?>
                        <tr>
                            <td>#<?php echo $c['id']; ?></td>
                            <td><a href="courses/show.php?id=<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['title']); ?></a></td>
                            <td>$<?php echo $c['price']; ?></td>
                            <!-- <td><?php echo $num; ?></td> -->
                            <td class="text-end">
                                <a href="courses/show.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm">View</a>
                                <a href="courses/edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                <a href="courses/delete.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
