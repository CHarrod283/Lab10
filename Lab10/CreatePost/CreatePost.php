<?php
echo "<html>";
echo "<body>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "carterharrod", "oov7ahJu", "carterharrod");
if($mysqli->connect_errno) {
	echo "Connection failed:" . $mysqli->connect_error . "<br>";
	exit();
} else {
	echo "Connection Success <br>";
}


$query = "SELECT user_id FROM Users WHERE user_id=\"" . $_POST["userID"] . "\";";
$search = $mysqli->query($query);
if($search->num_rows > 0) {

	echo "Post Logged in database <br>";
	$postQuery = "SELECT post_id FROM Posts;";
	$postNum = $mysqli->query($postQuery)->num_rows + 1;
	$query = "INSERT INTO Posts (post_id, content, author_id) VALUES ($postNum , \"" . $_POST["content"] . "\" , \"" . $_POST["userID"] . "\");";
	$mysqli->query($query);
} else {
	echo "Error unknown username<br>";
}

echo "</body>";
echo "</html>";

$mysqli->close();

?>
