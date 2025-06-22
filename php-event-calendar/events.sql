CREATE DATABASE IF NOT EXISTS event_calendar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE event_calendar;

CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL
);
