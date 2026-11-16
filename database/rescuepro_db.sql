CREATE DATABASE IF NOT EXISTS `rescuepro_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `rescuepro_db`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(120) NOT NULL,
    `email` VARCHAR(190) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'customer') NOT NULL DEFAULT 'customer',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `service_requests` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NULL,
    `ticket_code` VARCHAR(30) NOT NULL UNIQUE,
    `full_name` VARCHAR(120) NOT NULL,
    `email` VARCHAR(190) NOT NULL,
    `phone` VARCHAR(40) NOT NULL,
    `service_type` VARCHAR(80) NOT NULL,
    `property_type` VARCHAR(50) NOT NULL DEFAULT 'Residential',
    `zip_code` VARCHAR(20) NOT NULL DEFAULT '37066',
    `address` VARCHAR(255) NOT NULL,
    `water_category` VARCHAR(60) NULL DEFAULT 'N/A',
    `details` TEXT NULL,
    `status` ENUM('New', 'Dispatched', 'On-Site Drying', 'Completed', 'Cancelled') NOT NULL DEFAULT 'New',
    `admin_notes` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `fk_request_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
    INDEX `idx_request_status` (`status`),
    INDEX `idx_request_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `franchise_inquiries` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(120) NOT NULL,
    `email` VARCHAR(190) NOT NULL,
    `phone` VARCHAR(40) NOT NULL,
    `territory_state` VARCHAR(100) NOT NULL,
    `liquid_capital` VARCHAR(80) NOT NULL,
    `notes` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `ce_registrations` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(120) NOT NULL,
    `email` VARCHAR(190) NOT NULL,
    `agency_name` VARCHAR(150) NOT NULL,
    `license_number` VARCHAR(80) NOT NULL,
    `course_title` VARCHAR(180) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `erp_profiles` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NULL,
    `facility_name` VARCHAR(180) NOT NULL,
    `facility_type` VARCHAR(80) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `water_shutoff` VARCHAR(180) NOT NULL,
    `electric_panel` VARCHAR(180) NOT NULL,
    `gas_shutoff` VARCHAR(180) NOT NULL,
    `emergency_contact` VARCHAR(150) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `fk_erp_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'RescuePro National Admin', 'admin@rescuepro.test', '$2y$12$WwrrlUizIgjv.qLpOUl9zOq80iP53UzbmASRMkkxmBWWncQC9s7Eu', 'admin'),
(2, 'Demo Homeowner Customer', 'customer@rescuepro.test', '$2y$12$.lCM3/fsr8MlyGOTYj0fyuFAtaEj.eiK/mfUApbOpLPvryvBu8Pmm', 'customer')
ON DUPLICATE KEY UPDATE `email` = VALUES(`email`);

INSERT INTO `service_requests` (`user_id`, `ticket_code`, `full_name`, `email`, `phone`, `service_type`, `property_type`, `zip_code`, `address`, `water_category`, `details`, `status`, `admin_notes`) VALUES
(2, 'RP-2026-1001', 'Demo Homeowner Customer', 'customer@rescuepro.test', '(615) 555-0192', 'Water Damage Restoration', 'Residential', '37066', '412 Maplewood Drive, Gallatin, TN 37066', 'Category 1 - Clean Water', 'Burst copper supply line behind upstairs guest bathroom vanity causing ceiling drywall saturation.', 'On-Site Drying', 'Crew Chief M. Davis on site with 4 air movers and 2 LGR dehumidifiers.'),
(2, 'RP-2026-1002', 'Demo Homeowner Customer', 'customer@rescuepro.test', '(615) 555-0192', 'Mold Remediation', 'Residential', '37201', '815 Cumberland Ave, Nashville, TN 37201', 'N/A', 'Musty odor and visible dark spotting along basement concrete block wall after heavy spring rains.', 'Dispatched', 'HEPA containment and negative air scrubber unit scheduled for 14:00 inspection.'),
(NULL, 'RP-2026-1003', 'Elena Vance - Summit Hotel', 'evance@summithotel.com', '(214) 555-0148', 'Commercial Large Loss', 'Commercial', '75201', '1200 Commerce St, Dallas, TX 75201', 'Category 2 - Grey Water', 'Sprinkler head malfunction on 4th floor east wing affecting 8 guest suites and corridor carpeting.', 'New', 'Priority Large Loss team notified; awaiting adjuster Xactimate claim #.'),
(NULL, 'RP-2026-1004', 'Marcus Sterling', 'msterling@example.com', '(615) 555-0174', 'Fire & Smoke Damage', 'Residential', '37066', '109 Harbor Point Rd, Hendersonville, TN 37075', 'N/A', 'Kitchen grease flare-up damaged upper cabinetry and left heavy soot residue across living room HVAC returns.', 'Completed', 'Thermal fogging, ozone treatment, and duct cleaning signed off by homeowner.')
ON DUPLICATE KEY UPDATE `ticket_code` = VALUES(`ticket_code`);
