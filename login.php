<?php
include "db.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();
    
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: quiz.php");
        exit();
    } else {
          echo "<script type='text/javascript'>
            alert('Invalid credentials!');
          </script>";
      
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Quiz Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</div>

<div class="auth-container">
    <h2>Login</h2>
    <form method="post">
        <input type="email" name="email" required placeholder="Your Email">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
