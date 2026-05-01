<?php
include 'config.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die('Invalid request');
    }

    if (empty($_POST['name']) || empty($_POST['email'])) {
        die('Name and email are required');
    }

    $name = htmlspecialchars($_POST['name']);
    $gender = htmlspecialchars($_POST['gender']);
    $contact = htmlspecialchars($_POST['contact']);
    $salary = htmlspecialchars($_POST['salary']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // FIXED SQL QUERY
    $insert = "INSERT INTO users (name, gender, contact, salary, email, password) 
               VALUES ('$name', '$gender', '$contact', '$salary', '$email', '$password')";

    if ($conn->query($insert)) {
        echo "success";
    } else {
        echo "fail: " . $conn->error;
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>