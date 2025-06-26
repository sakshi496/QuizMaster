<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
    $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
     echo "<script type='text/javascript'>
            alert('Registration successful! You will be redirected to the login page.');
            window.location.href = 'login.php'; // Redirect to login page after the alert
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - Quiz Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</div>

<div class="auth-container">
    <h2>Register</h2>
    <form method="post">
        <input type="text" name="name" required placeholder="Your Name">
        <input type="email" name="email" required placeholder="Your Email">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
