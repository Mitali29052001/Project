<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "your_username", "your_password", "your_database_name");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["login_email"];
    $password = $_POST["login_password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["email"] = $email;
        header("Location: dashboard.php");
    } else {
        echo "Invalid email or password";
    }

    $conn->close();
}
?>
