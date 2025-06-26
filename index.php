<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: quiz.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | QuizMaster</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">QuizMaster</div>
    <div class="nav-links">
        <a href="leaderboard.php"> Leaderboard</a>
        <a href="admin.php">Admin</a>

    </div>
</nav>

<div class="home-container">
    <h1>Welcome to QuizMaster</h1>
    <p>Test your knowledge and compete with others! To begin, <a href="register.php">Register</a> or <a href="login.php">Login</a>.</p>
</div>

</body>
</html>
