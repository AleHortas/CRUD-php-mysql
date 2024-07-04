<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'movies_cac';

try {
    $conn = new PDO("mysql:host = $servername; dbname=$dbname", $username, $password);
    // set PDO throw exceptions for errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅Connected";
} catch (PDOException $e) {
    // Captures any exception during connection and sends the error message 
    echo "⛔Connection failed: " . $e->getMessage();
}
?>