<?php
include "db.php";
$users = $conn->query("SELECT name, score FROM users ORDER BY score DESC LIMIT 10");
?><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<h2>Leaderboard</h2>
<table>
    <tr><th>Name</th><th>Score</th></tr>
    <?php while ($row = $users->fetch_assoc()) { ?>
        <tr><td><?= $row["name"] ?></td><td><?= $row["score"] ?></td></tr>
    <?php } ?>
</table>
