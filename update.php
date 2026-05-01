<?php 
include "config.php";
try {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $geender = $_POST['geender'];
    $contact = $_POST['contact'];
    $salary = $_POST['salary'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE customers SET name='$name', geender='$geender', contact='$contact', salary='$salary', email='$email', password='$password' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>