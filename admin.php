<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $q = $_POST["question"];
        $o1 = $_POST["option1"];
        $o2 = $_POST["option2"];
        $o3 = $_POST["option3"];
        $o4 = $_POST["option4"];
        $ans = $_POST["answer"];
        $conn->query("INSERT INTO questions (question, option1, option2, option3, option4, answer) VALUES ('$q', '$o1', '$o2', '$o3', '$o4', '$ans')");
    } elseif (isset($_POST["delete"])) {
        $conn->query("DELETE FROM questions WHERE id=" . $_POST["delete"]);
    }
}

$questions = $conn->query("SELECT * FROM questions");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS file -->
</head>
<body>

<h2>Admin Panel</h2>

<!-- Add Question Form -->
<form method="post" class="add-question-form">
    <input type="text" name="question" required placeholder="Question">
    <input type="text" name="option1" required placeholder="Option 1">
    <input type="text" name="option2" required placeholder="Option 2">
    <input type="text" name="option3" required placeholder="Option 3">
    <input type="text" name="option4" required placeholder="Option 4">
    <input type="text" name="answer" required placeholder="Correct Answer">
    <button type="submit" name="add">Add Question</button>
</form>

<!-- Space after the form using <br> -->
<br><br><br>

<!-- Existing Questions Table -->
<table>
    <tr><th>Question</th><th>Delete</th></tr>
    <?php while ($row = $questions->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["question"] ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="delete" value="<?= $row["id"] ?>">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
