<?php
require_once '../admin/includes/config.php';
require_once '../admin/includes/functions.php';

$videos = getAllVideos($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos - Guru Jambheshwar Mandir Parta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo">🛕 श्री गुरु जंभेश्वर भगवान मंदिर </h1>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="location.php">Location</a></li>
                <li><a href="videos.php">Videos</a></li>
            </ul>
        </div>
    </nav>

    <div class="page-header">
        <h1>🎥 हमारे वीडियो</h1>
        <p> हमारे चैनल पर भक्ति वीडियो और मंदिर की ताज़ा जानकारी देखें!</p>
    </div>

    <main class="container">
        <section class="videos-section">
            <h2>Youtube Videos & Devotional Content</h2><br>
            
            <?php if (empty($videos)): ?>
                <p class="no-videos-msg">No videos available yet. Check back soon!</p>
            <?php else: ?>
                <div class="videos-grid">
                    <?php foreach ($videos as $video): ?>
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['video_id']); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="video-info">
                                <h3><?php echo htmlspecialchars($video['title']); ?></h3>
                                <p><?php echo htmlspecialchars(substr($video['description'], 0, 100)); ?>...</p>
                                <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($video['video_id']); ?>" class="watch-btn" target="_blank">Watch on YouTube</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <section class="youtube-channel">
            <h2>Subscribe to Our Channel</h2>
            <p>Follow us on YouTube for more devotional content, updates, and spiritual guidance.</p>
            <a href="https://www.youtube.com/@gurujambheshwarmandir" class="btn btn-primary" target="_blank">Visit Our YouTube Channel</a>
        </section>
    </main>

    <footer class="footer"><style>background: rgb(205, 71, 71);</style>
            <div class="footer-content">
            <p>&copy; 2026 Guru Jambheshwar Mandir Parta. All rights reserved.</p>
            <p>Contact: info@guru-jambheshwar.com | Phone: +91-7082348532</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>