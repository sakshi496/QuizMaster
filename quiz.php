<?php
include "db.php";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$questions = $conn->query("SELECT * FROM questions ORDER BY RAND() LIMIT 10");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    foreach ($_POST as $key => $value) {
        $qid = str_replace("question_", "", $key);
        $result = $conn->query("SELECT * FROM questions WHERE id=$qid");
        $row = $result->fetch_assoc();
        if ($row["answer"] == $value) {
            $score++;
        }
    }
    $user_id = $_SESSION["user_id"];
    $conn->query("UPDATE users SET score=$score WHERE id=$user_id");
    header("Location: leaderboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <link rel="stylesheet" href="style.css"> <!-- Include the CSS file here -->
</head>
<body>

<div class="navbar">
    <a href="register.php">Home</a>
    <a href="leaderboard.php">Leaderboard</a>
    <a href="admin.php">Admin</a>
    <a href="logout.php">Logout</a>
</div>

<h2>Welcome to the Quiz!</h2>

<form method="post">
    <?php while ($row = $questions->fetch_assoc()) { ?>
        <div class="question-container">
            <p><?= $row["question"] ?></p>
            <label><input type="radio" name="question_<?= $row["id"] ?>" value="<?= $row["option1"] ?>"> <?= $row["option1"] ?></label><br>
            <label><input type="radio" name="question_<?= $row["id"] ?>" value="<?= $row["option2"] ?>"> <?= $row["option2"] ?></label><br>
            <label><input type="radio" name="question_<?= $row["id"] ?>" value="<?= $row["option3"] ?>"> <?= $row["option3"] ?></label><br>
            <label><input type="radio" name="question_<?= $row["id"] ?>" value="<?= $row["option4"] ?>"> <?= $row["option4"] ?></label><br>
        </div>
    <?php } ?>
    <button type="submit">Submit</button>
</form>

</body>
</html>
