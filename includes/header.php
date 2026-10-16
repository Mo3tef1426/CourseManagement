<?php
// Auto-detect project BASE_URL so CSS & links work from any subfolder
// e.g. /route_c48/oop_pro - TMP/  (handles spaces in folder name)
$projectRoot = str_replace('\\', '/', realpath(__DIR__ . '/..'));
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));
$BASE_URL = str_replace($docRoot, '', $projectRoot);
$BASE_URL = '/' . trim($BASE_URL, '/') . '/';

require_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management System</title>
    <!-- Base URL: makes ALL relative links (assets/css, students/...) resolve from project root -->
    <base href="<?= $BASE_URL ?>">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons 1.11.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Admin Dashboard CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div id="wrapper">
        <!-- Sidebar Overlay for mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Include Sidebar -->
        <?php require_once __DIR__ . '/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper">
            <!-- Top Navigation Bar -->
            <header class="top-navbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-light d-lg-none border" id="sidebarToggle" type="button" aria-label="Toggle navigation">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <div class="d-flex align-items-center">
                        <span class="text-secondary small fw-medium me-2">App /</span>
                        <span class="fw-semibold text-dark">Course Management System</span>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-light text-secondary border px-3 py-2 d-none d-sm-inline-flex align-items-center">
                        <i class="bi bi-calendar3 me-2"></i> 2026-10-4
                    </span>
                    <a href="enrollments/create.php" class="btn btn-primary btn-sm px-3 shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> Enroll Student
                    </a>
                </div>
            </header>

            <!-- Main Body Content -->
            <main class="main-content">