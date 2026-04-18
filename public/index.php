<?php
require_once '../admin/includes/config.php';
require_once '../admin/includes/functions.php';

$home_content = getContent($pdo, 'home');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>श्री गुरु जंभेश्वर भगवान मंदिर पारता</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Slider CSS */
        .slider {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }
    </style>
</head>
<body>

    <!-- Background Slider -->
    <div class="slider">
        <img src="../assets/images/temple1.png" class="slide active">
        <img src="../assets/images/temple2.png" class="slide">
        <img src="../assets/images/temple3.png" class="slide">
        <img src="../assets/images/temple4.png" class="slide >

        <img src="../assets/images/temple6.png" class="slide">
    </div>

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

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($home_content['title']); ?></h1>
            <p><?php echo htmlspecialchars($home_content['description']); ?></p>
        </div>
    </header>

    <main class="container">
        <section class="welcome-section">
            <h2>Welcome to Our Sacred Temple</h2>
            <p>Guru Jambheshwar Mandir Parta is a place of spiritual enlightenment, devotion, and peace. We welcome devotees and visitors from all walks of life to experience the divine presence and tranquility of our holy temple.</p>
            <div class="buttons">
                <a href="about.php" class="btn btn-primary">Learn More</a>
                <a href="location.php" class="btn btn-secondary">Visit Us</a>
            </div><br>
        </section>

        <section class="info-grid">
            <div class="info-card">
                <h3>📖 Our History</h3>
                <p>A temple with a rich spiritual heritage spanning generations, dedicated to Lord Jambheshwar.</p>
            </div>
            <div class="info-card">
                <h3>🙏 Worship & Prayer</h3>
                <p>Daily prayers, special rituals, and devotional activities for all devotees.</p>
            </div>
            <div class="info-card">
                <h3>🎉 Celebrations</h3>
                <p>Experience grand celebrations during festivals and special occasions throughout the year.</p>
            </div>
            <div class="info-card">
                <h3>🤝 Community</h3>
                <p>Join our spiritual community and grow in your journey of faith and enlightenment.</p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2026 Guru Jambheshwar Mandir Parta. All rights reserved.</p>
            <p>Contact: info@guru-jambheshwar.com | Phone: +91-XXXXXXXXXX</p>
        </div>
    </footer>

    <!-- Slider JS -->
    <script>
        let slides = document.querySelectorAll('.slide');
        let index = 0;

        setInterval(() => {
            slides[index].classList.remove('active');
            index = (index + 1) % slides.length;
            slides[index].classList.add('active');
        }, 3000);
    </script>

</body>
</html>