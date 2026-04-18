<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Guru Jambheshwar Mandir</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <nav class="admin-navbar">
        <div class="navbar-container">
            <h1>Admin Panel</h1>
            <ul class="nav-links">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="edit_content.php">Edit Content</a></li>
                <li><a href="manage_videos.php">Manage Videos</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </div>
    </nav>
    <main class="admin-main">