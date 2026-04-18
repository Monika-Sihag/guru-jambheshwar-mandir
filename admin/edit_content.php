<?php
require_once 'includes/check_auth.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';

$success = '';
$error = '';
$page_type = isset($_POST['page_type']) ? $_POST['page_type'] : 'home';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $image_name = '';
    
    if (!empty($_FILES['background_image']['name'])) {
        $image_name = uploadImage($_FILES['background_image']);
        if (!$image_name) {
            $error = "Failed to upload image.";
        }
    } else {
        $current_content = getContent($pdo, $page_type);
        $image_name = $current_content['background_image'];
    }
    
    if (empty($error)) {
        if (updateContent($pdo, $page_type, $title, $description, $image_name, $_SESSION['admin_id'])) {
            $success = "Content updated successfully!";
        } else {
            $error = "Failed to update content.";
        }
    }
}

$content = getContent($pdo, $page_type);
?>
<?php include 'includes/header.php'; ?>

<div class="edit-container">
    <h2>Edit Content - <?php echo ucfirst($page_type); ?> Page</h2>
    
    <?php if ($success): ?>
        <div class="success-message"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data" class="edit-form">
        <div class="form-group">
            <label for="page_type">Select Page:</label>
            <select name="page_type" id="page_type" onchange="this.form.submit()">
                <option value="home" <?php echo $page_type === 'home' ? 'selected' : ''; ?>>Home Page</option>
                <option value="about" <?php echo $page_type === 'about' ? 'selected' : ''; ?>>About Page</option>
                <option value="location" <?php echo $page_type === 'location' ? 'selected' : ''; ?>>Location Page</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="title">Page Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($content['title']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="10" required><?php echo htmlspecialchars($content['description']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="background_image">Background Image:</label>
            <input type="file" id="background_image" name="background_image" accept="image/*">
            <?php if ($content['background_image']): ?>
                <p class="current-image">Current Image: <?php echo htmlspecialchars($content['background_image']); ?></p>
            <?php endif; ?>
        </div>
        
        <button type="submit" class="submit-btn">Update Content</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>