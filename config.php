<?php
try {
    $conn = new mysqli('localhost', 'root', '', 'ajax_db');

    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
} catch(Exception $e) {
    http_response_code(500);
    die('error'.$e->getMessage());
}
