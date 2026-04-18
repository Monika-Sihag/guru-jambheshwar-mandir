<?php
function getContent($pdo, $page_type) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM content WHERE page_type = ?");
        $stmt->execute([$page_type]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function updateContent($pdo, $page_type, $title, $description, $image_path, $user_id) {
    try {
        $stmt = $pdo->prepare("UPDATE content SET title = ?, description = ?, background_image = ?, updated_by = ? WHERE page_type = ?");
        return $stmt->execute([$title, $description, $image_path, $user_id, $page_type]);
    } catch (PDOException $e) {
        return false;
    }
}

function getAllVideos($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM youtube_videos ORDER BY uploaded_date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

function addVideo($pdo, $title, $video_url, $description, $user_id) {
    try {
        // Extract video ID from YouTube URL
        $video_id = extractYouTubeID($video_url);
        $stmt = $pdo->prepare("INSERT INTO youtube_videos (title, video_url, video_id, description, added_by) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $video_url, $video_id, $description, $user_id]);
    } catch (PDOException $e) {
        return false;
    }
}

function deleteVideo($pdo, $video_id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM youtube_videos WHERE id = ?");
        return $stmt->execute([$video_id]);
    } catch (PDOException $e) {
        return false;
    }
}

function extractYouTubeID($url) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?\s]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : '';
}

function uploadImage($file) {
    $upload_dir = '../uploads/images/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    $file_name = time() . '_' . basename($file['name']);
    $file_path = $upload_dir . $file_name;
    
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        return $file_name;
    }
    return false;
}
?>