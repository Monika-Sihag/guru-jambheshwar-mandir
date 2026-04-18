<?php
require_once '../admin/includes/config.php';
require_once '../admin/includes/functions.php';

$about_content = getContent($pdo, 'about');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Guru Jambheshwar Mandir Parta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo">🛕 Guru Jambheshwar Mandir</h1>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="location.php">Location</a></li>
                <li><a href="videos.php">Videos</a></li>
            </ul>
        </div>
    </nav>

    <div class="page-header">
        <h1><?php echo htmlspecialchars($about_content['title']); ?></h1>
    </div>

    <main class="container">
        <section class="about-section">
            <div class="about-content">
                <h2>Our Temple's Story</h2>
                <p><?php echo htmlspecialchars($about_content['description']); ?></p>
                
                <h3>What We Offer</h3>
                <ul class="features-list">
                    <li>Daily devotional services and prayers</li>
                    <li>Annual festivals and celebrations</li>
                    <li>Spiritual guidance and counseling</li>
                    <li>Community outreach programs</li>
                    <li>Educational initiatives</li>
                </ul>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2026 Guru Jambheshwar Mandir Parta. All rights reserved.</p>
            <p>Contact: info@guru-jambheshwar.com | Phone: +91-XXXXXXXXXX</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>