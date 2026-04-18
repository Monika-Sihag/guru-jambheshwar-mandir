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
    <title>Guru Jambheshwar Mandir Parta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- 🔥 Background Slider -->
<div class="slider">
    <img src="assets/temple1.png" class="slide active">
    <img src="assets/temple2.png" class="slide">
    <img src="assets/temple3.png" class="slide">
    <img src="assets/temple4.png" class="slide">
    <img src="assets/temple5.png" class="slide">
    <img src="assets/temple6.png" class="slide">
</div>

<!-- Navbar -->
<nav class="navbar">
    <div class="nav-container">
        <h1 class="logo">🛕 Guru Jambheshwar Mandir Parta</h1>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="location.php">Location</a></li>
            <li><a href="videos.php">Videos</a></li>
        </ul>
    </div>
</nav>

<!-- Hero -->
<header class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><?php echo htmlspecialchars($home_content['title']); ?></h1>
        <p><?php echo htmlspecialchars($home_content['description']); ?></p>
    </div>
</header>

<main class="container">
    <section class="welcome-section">
        <h2>Welcome to Our Sacred Temple</h2><br>
        <p>
            Guru Jambheshwar Mandir Parta is a place of spiritual enlightenment, devotion, and peace. 
            We welcome devotees and visitors from all walks of life to experience divine presence.
        </p>

        <div class="buttons">
            <a href="about.php" class="btn btn-primary">Learn More</a>
            <a href="location.php" class="btn btn-secondary">Visit Us</a>
        </div>
    </section>

    <section class="info-grid">
        <div class="info-card">
            <h3>📖 Our History</h3>
            <p>Rich spiritual heritage dedicated to Guru Jambheshwar.</p>
        </div>

        <div class="info-card">
            <h3>🙏 Worship</h3>
            <p>Daily prayers and devotional rituals for devotees.</p>
        </div>

        <div class="info-card">
            <h3>🎉 Festivals</h3>
            <p>Celebrate spiritual festivals with devotion and joy.</p>
        </div>

        <div class="info-card">
            <h3>🤝 Community</h3>
            <p>Join our spiritual family and grow together.</p>
        </div>
    </section>
</main>

<footer class="footer">
    <p>&copy; 2026 Guru Jambheshwar Mandir Parta</p>
</footer>

<!-- 🔥 Slider Script -->
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