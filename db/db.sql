-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 08:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `agywlh`

-- Create `user_types` table
CREATE TABLE `user_types` (
  `user_type_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for user types table',
  `type_name` VARCHAR(100) NOT NULL COMMENT 'Name of the user type (e.g., Admin, Staff)',
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- --------------------------------------------------------
-- Table: `users`
CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for users table',
  `firstname` VARCHAR(200) NOT NULL COMMENT 'User first name',
  `lastname` VARCHAR(200) NOT NULL COMMENT 'User last name',
  `email` VARCHAR(200) NOT NULL UNIQUE COMMENT 'User email address',
  `user_type_id` INT NOT NULL COMMENT 'Foreign key referencing user_types',
  `password` TEXT NOT NULL COMMENT 'Hashed password',
  `is_active` TINYINT(1) DEFAULT 1 COMMENT 'Indicates if user is active',
  `date_created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp for when user was created',
  PRIMARY KEY (`user_id`),
  FOREIGN KEY (`user_type_id`) REFERENCES `user_types`(`user_type_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `parent`
CREATE TABLE `parent` (
  `parent_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for parent table',
  `given_name` VARCHAR(45) NOT NULL COMMENT 'Parent given name',
  `family_name` VARCHAR(45) NOT NULL COMMENT 'Parent family name',
  `arv_number` VARCHAR(45) DEFAULT NULL UNIQUE COMMENT 'ARV number (if applicable)',
  `date_of_birth` DATE NOT NULL COMMENT 'Parent date of birth',
  `place_of_residence` VARCHAR(100) DEFAULT NULL COMMENT 'Parent place of residence',
  `phone_number` VARCHAR(45) DEFAULT NULL COMMENT 'Parent phone number',
  `marital_status` ENUM('single', 'married', 'divorced', 'widowed') DEFAULT NULL COMMENT 'Marital status',
  `is_active` TINYINT(1) DEFAULT 1 COMMENT 'Indicates if parent is active',
  `created_by` INT(11) DEFAULT NULL COMMENT 'User who created this record',
  `date_created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp for when record was created',
  `changed_by` INT(11) DEFAULT NULL COMMENT 'User who last updated the record',
  `date_changed` DATETIME DEFAULT NULL COMMENT 'Timestamp for when record was last updated',
  PRIMARY KEY (`parent_id`),
  FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL,
  FOREIGN KEY (`changed_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Trigger for `parent`
DELIMITER $$
CREATE TRIGGER `after_parent_inactive`
AFTER UPDATE ON `parent`
FOR EACH ROW
BEGIN
    IF NEW.is_active = 0 THEN
        UPDATE `child` SET `is_active` = 0 WHERE `guardian_id` = NEW.parent_id;
    END IF;
END$$
DELIMITER ;


CREATE TABLE inclusion_criteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    criteria_name VARCHAR(255) UNIQUE COMMENT 'Name of inclusion criteria'
);

CREATE TABLE additional_inclusion_criteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    criteria_name VARCHAR(255) UNIQUE COMMENT 'Name of additional inclusion criteria'
);

CREATE TABLE parent_inclusion_criteria (
    parent_id INT NOT NULL COMMENT 'Reference to parent table',
    inclusion_criteria_id INT NOT NULL COMMENT 'Reference to inclusion criteria',
    FOREIGN KEY (parent_id) REFERENCES parent(parent_id) ON DELETE CASCADE,
    FOREIGN KEY (inclusion_criteria_id) REFERENCES inclusion_criteria(id) ON DELETE CASCADE,
    PRIMARY KEY (parent_id, inclusion_criteria_id)
);

CREATE TABLE parent_additional_inclusion_criteria (
    parent_id INT NOT NULL COMMENT 'Reference to parent table',
    additional_inclusion_criteria_id INT NOT NULL COMMENT 'Reference to additional inclusion criteria',
    FOREIGN KEY (parent_id) REFERENCES parent(parent_id) ON DELETE CASCADE,
    FOREIGN KEY (additional_inclusion_criteria_id) REFERENCES additional_inclusion_criteria(id) ON DELETE CASCADE,
    PRIMARY KEY (parent_id, additional_inclusion_criteria_id)
);

-- --------------------------------------------------------
-- Table: `child`
CREATE TABLE `child` (
  `child_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for child table',
  `given_name` VARCHAR(45) NOT NULL COMMENT 'Child given name',
  `family_name` VARCHAR(45) NOT NULL COMMENT 'Child family name',
  `hcc_number` VARCHAR(45) DEFAULT NULL UNIQUE COMMENT 'HCC number (if applicable)',
  `arv_number` VARCHAR(45) DEFAULT NULL COMMENT 'ARV number (if applicable)',
  `date_of_birth` DATE NOT NULL COMMENT 'Child date of birth',
  `gender` ENUM('male', 'female') NOT NULL COMMENT 'Gender of child',
  `guardian_id` INT(11) NOT NULL COMMENT 'Reference to parent/guardian',
  `is_active` TINYINT(1) DEFAULT 1 COMMENT 'Indicates if child is active',
  `created_by` INT(11) DEFAULT NULL COMMENT 'User who created this record',
  `date_created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp for when record was created',
  `changed_by` INT(11) DEFAULT NULL COMMENT 'User who last updated the record',
  `date_changed` DATETIME DEFAULT NULL COMMENT 'Timestamp for when record was last updated',
  PRIMARY KEY (`child_id`),
  FOREIGN KEY (`guardian_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL,
  FOREIGN KEY (`changed_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `parent_visit`
CREATE TABLE `parent_visit` (
  `visit_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for parent visits',
  `parent_id` INT(11) NOT NULL COMMENT 'Reference to parent',
  `child_id` INT(11) NOT NULL COMMENT 'Reference to child',
  `meeting_date` DATE NOT NULL COMMENT 'Date of the visit',
  `next_appointment_date` DATE NOT NULL COMMENT 'Next appointment date',
  `appointment_status` ENUM('attended', 'missed', 'defaulted') DEFAULT 'attended' COMMENT 'Status of the appointment',
  `adherence` TINYINT(4) DEFAULT NULL COMMENT 'Adherence percentage',
  `eligible_for_vl` ENUM('yes', 'no') DEFAULT NULL COMMENT 'Eligibility for viral load test',
  `date_of_vl_test` DATE DEFAULT NULL COMMENT 'Date of viral load test',
  `vl_result` VARCHAR(45) DEFAULT NULL COMMENT 'Viral load result',
  `malnutrition_status` VARCHAR(100) DEFAULT NULL COMMENT 'Status of malnutrition assessment',
  `comment` TEXT DEFAULT NULL COMMENT 'Additional comments about the visit',
  `created_by` INT(11) DEFAULT NULL COMMENT 'User who created this record',
  `date_created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp for when record was created',
  PRIMARY KEY (`visit_id`),
  FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE,
  FOREIGN KEY (`child_id`) REFERENCES `child` (`child_id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `services`
CREATE TABLE `services` (
  `service_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for services table',
  `service_name` VARCHAR(255) NOT NULL UNIQUE COMMENT 'Name of the service',
  `description` TEXT DEFAULT NULL COMMENT 'Description of the service',
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `services_accessed`
CREATE TABLE `services_accessed` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for services accessed',
  `visit_id` INT(11) NOT NULL COMMENT 'Reference to parent visit',
  `service_id` INT(11) NOT NULL COMMENT 'Reference to services table',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`visit_id`) REFERENCES `parent_visit` (`visit_id`) ON DELETE CASCADE,
  FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `outcomes`
CREATE TABLE `outcomes` (
  `outcome_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for outcomes table',
  `outcome_name` VARCHAR(255) NOT NULL COMMENT 'Name of the outcome',
  `description` VARCHAR(255) NOT NULL COMMENT 'Description of the outcome',
  PRIMARY KEY (`outcome_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table: `visit_outcomes`
CREATE TABLE `visit_outcomes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for visit outcomes',
  `visit_id` INT(11) NOT NULL COMMENT 'Reference to parent visit',
  `outcome_id` INT(11) NOT NULL COMMENT 'Reference to outcomes table',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`visit_id`) REFERENCES `parent_visit` (`visit_id`) ON DELETE CASCADE,
  FOREIGN KEY (`outcome_id`) REFERENCES `outcomes` (`outcome_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
