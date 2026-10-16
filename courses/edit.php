<?php
require_once __DIR__ . '/../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="h4 fw-bold text-dark mb-1">Edit Course</h2>
                <p class="text-secondary small mb-0">Update course details for Ahmed</p>
            </div>
            <a href="courses/index.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Courses
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <span class="fw-semibold text-dark">
                    <i class="bi bi-pencil-square me-2 text-warning"></i> Edit Course #1
                </span>
            </div>
            <div class="card-body p-4">
                <form action="courses/edit.php?id=1" method="POST">
                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title" class="form-label fw-medium">Course Title <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="form-control" 
                               value="PHP Crash Course" 
                               required>
                    </div>

                    <!-- Price Field -->
                    <div class="mb-3">
                        <label for="price" class="form-label fw-medium">Price (USD) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" 
                                   step="0.01" 
                                   min="0"
                                   name="price" 
                                   id="price" 
                                   class="form-control" 
                                   value="5000" 
                                   required>
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-medium">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4" 
                                  class="form-control">Learn PHP from scratch and build web applications.</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="courses/index.php" class="btn btn-light px-4 border">Cancel</a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-lg me-1"></i> Update Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
