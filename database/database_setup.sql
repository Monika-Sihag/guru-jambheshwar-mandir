-- Create Database
CREATE DATABASE IF NOT EXISTS guru_jambheshwar_mandir;
USE guru_jambheshwar_mandir;

-- Admin Users Table
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Content Table (Home & About Page Content)
CREATE TABLE content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_type VARCHAR(50) NOT NULL UNIQUE, -- 'home', 'about', 'location'
    title VARCHAR(255),
    description LONGTEXT,
    background_image VARCHAR(255),
    updated_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (updated_by) REFERENCES admin_users(id)
);

-- YouTube Videos Table
CREATE TABLE youtube_videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    video_url VARCHAR(500) NOT NULL,
    video_id VARCHAR(100),
    description TEXT,
    uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    added_by INT,
    FOREIGN KEY (added_by) REFERENCES admin_users(id)
);

-- Insert Default Content
INSERT INTO content (page_type, title, description, background_image) VALUES
('home', 'Guru Jambheshwar Mandir Parta', 'Welcome to Guru Jambheshwar Mandir Parta - A sacred place of worship and spirituality', 'temple-bg.jpg'),
('about', 'About Our Temple', 'Guru Jambheshwar Mandir Parta is a revered temple dedicated to Lord Jambheshwar, known for its spiritual significance and architectural beauty.', 'temple-bg.jpg'),
('location', 'Visit Us', 'Located in Parta, our temple welcomes devotees and visitors from around the world.', 'temple-bg.jpg');

-- Insert Default Admin (Username: admin, Password: admin123)
INSERT INTO admin_users (username, password, email) VALUES 
('admin', '$2y$10$dXJ3SW6G7P50eS3xesJEKOJ.AUVVT5F3nJjhJqd5uLj2KhxwvG7pK', 'admin@guru-jambheshwar.com');