<?php
require_once 'includes/check_auth.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        $title = trim($_POST['title']);
        $video_url = trim($_POST['video_url']);
        $description = trim($_POST['description']);
        
        if (empty($title) || empty($video_url)) {
            $error = "Title and video URL are required.";
        } else {
            if (addVideo($pdo, $title, $video_url, $description, $_SESSION['admin_id'])) {
                $success = "Video added successfully!";
            } else {
                $error = "Failed to add video.";
            }
        }
    } elseif ($_POST['action'] === 'delete' && isset($_POST['video_id'])) {
        if (deleteVideo($pdo, $_POST['video_id'])) {
            $success = "Video deleted successfully!";
        } else {
            $error = "Failed to delete video.";
        }
    }
}

$videos = getAllVideos($pdo);
?>
<?php include 'includes/header.php'; ?>

<div class="videos-container">
    <h2>Manage YouTube Videos</h2>
    
    <?php if ($success): ?>
        <div class="success-message"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <div class="add-video-section">
        <h3>Add New Video</h3>
        <form method="POST" class="add-video-form">
            <input type="hidden" name="action" value="add">
            
            <div class="form-group">
                <label for="title">Video Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="video_url">YouTube URL:</label>
                <input type="url" id="video_url" name="video_url" placeholder="https://www.youtube.com/watch?v=..." required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Add Video</button>
        </form>
    </div>
    
    <div class="videos-list-section">
        <h3>Current Videos</h3>
        <?php if (empty($videos)): ?>
            <p class="no-videos">No videos added yet.</p>
        <?php else: ?>
            <table class="videos-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Added Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($videos as $video): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($video['title']); ?></td>
                            <td>
                                <a href="<?php echo htmlspecialchars($video['video_url']); ?>" target="_blank">
                                    View Video
                                </a>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($video['uploaded_date'])); ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>