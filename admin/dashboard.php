<?php
require_once 'includes/check_auth.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<?php include 'includes/header.php'; ?>

<div class="dashboard-container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h2>
    
    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3>📝 Manage Content</h3>
            <p>Edit home page, about page, and location information.</p>
            <a href="edit_content.php" class="card-btn">Go to Content</a>
        </div>
        
        <div class="dashboard-card">
            <h3>🎥 YouTube Videos</h3>
            <p>Add, edit, or remove YouTube video links from your channel.</p>
            <a href="manage_videos.php" class="card-btn">Manage Videos</a>
        </div>
        
        <div class="dashboard-card">
            <h3>🖼️ Upload Images</h3>
            <p>Update temple background images and other visuals.</p>
            <a href="edit_content.php" class="card-btn">Upload Image</a>
        </div>
        
        <div class="dashboard-card">
            <h3>📊 Statistics</h3>
            <p>View overall website statistics and updates.</p>
            <div class="stats">
                <?php
                $videos = getAllVideos($pdo);
                echo "<p>Total Videos: " . count($videos) . "</p>";
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>