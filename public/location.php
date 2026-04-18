<?php
require_once '../admin/includes/config.php';
require_once '../admin/includes/functions.php';

$location_content = getContent($pdo, 'location');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location - Guru Jambheshwar Mandir Parta</title>
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
        <h1><?php echo htmlspecialchars($location_content['title']); ?></h1>
    </div>

    <main class="container">
        <section class="location-section">
            <div class="location-content">
                <h2>How to Reach Us</h2>
                <p><?php echo htmlspecialchars($location_content['description']); ?></p>
                
                <div class="location-details">
                    <div class="detail-card">
                        <h3>📍 Address</h3>
                        <p>Guru Jambheshwar Mandir<br>Parta, Rajasthan<br>India</p>
                    </div>
                    <div class="detail-card">
                        <h3>⏰ Timings</h3>
                        <p>Morning: 5:00 AM - 12:00 PM<br>Evening: 4:00 PM - 9:00 PM<br>Open Daily</p>
                    </div>
                </div>
            </div>

            <div class="map-container">
                <h2>Map Location</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3563.8914682467373!2d71.80384!3d27.28749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3944ab1234567890%3A0x1234567890abcdef!2sParta%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1234567890123" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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