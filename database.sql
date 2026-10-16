-- ========================================================
-- Course Management System - Database Schema & Sample Data
-- For Training Students in PHP OOP & PDO
-- ========================================================

CREATE DATABASE IF NOT EXISTS `course_management` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE `course_management`;

-- --------------------------------------------------------
-- 1. Table structure for table `students`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `students` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `phone` VARCHAR(30) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_students_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 2. Table structure for table `courses`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `courses` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(150) NOT NULL,
    `description` TEXT NULL,
    `price` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_courses_title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 3. Table structure for table `enrollments`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `enrollments` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `student_id` INT UNSIGNED NOT NULL,
    `course_id` INT UNSIGNED NOT NULL,
    `enrolled_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `fk_enrollments_student` 
        FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_enrollments_course` 
        FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `uq_student_course` 
        UNIQUE (`student_id`, `course_id`),
    INDEX `idx_enrollments_student` (`student_id`),
    INDEX `idx_enrollments_course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 4. Sample Seed Data
-- --------------------------------------------------------

-- Insert Students if not already present
INSERT INTO `students` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Ahmed Hassan', 'ahmed.hassan@example.com', '01012345678'),
(2, 'Sara Mohamed', 'sara.mohamed@example.com', '01123456789'),
(3, 'Omar Khaled', 'omar.khaled@example.com', '01234567890'),
(4, 'Nour Ali', 'nour.ali@example.com', '01545678901'),
(5, 'Youssef Ibrahim', 'youssef.ibrahim@example.com', '01098765432')
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);

-- Insert Courses if not already present
INSERT INTO `courses` (`id`, `title`, `description`, `price`) VALUES
(1, 'PHP OOP & MySQL Mastery', 'Learn Object-Oriented PHP from basics to advanced, PDO database connection, and building real-world dynamic web applications.', 120.00),
(2, 'Modern Frontend with Bootstrap 5', 'Build responsive, elegant web dashboards, landing pages, and components using Bootstrap 5 and modern CSS techniques.', 85.00),
(3, 'JavaScript Essentials for Web Developers', 'Master core JavaScript concepts, DOM manipulation, asynchronous programming, and Fetch API.', 95.00),
(4, 'Full-Stack Web Development Bootcamp', 'Complete roadmap covering HTML5, CSS3, JS, PHP, MySQL, and deployment of secure web applications.', 250.00)
ON DUPLICATE KEY UPDATE `title`=VALUES(`title`);

-- Insert Enrollments if not already present
INSERT INTO `enrollments` (`id`, `student_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 2),
(6, 3, 4),
(7, 4, 1),
(8, 5, 4)
ON DUPLICATE KEY UPDATE `enrolled_at`=`enrolled_at`;
