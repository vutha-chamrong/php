<?php
include 'config.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo 'Invalid request';
        exit;
    }

    if (empty($_POST['id'])) {
        http_response_code(400);
        echo 'Missing id';
        exit;
    }

    $id = (int) $_POST['id'];
    $stmt = $conn->prepare('DELETE FROM ajax_tb WHERE id = ?');
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        http_response_code(500);
        echo 'Delete failed';
    }
} catch (Exception $e) {
    http_response_code(500);
    echo 'Delete error: '.$e->getMessage();
}
?>
