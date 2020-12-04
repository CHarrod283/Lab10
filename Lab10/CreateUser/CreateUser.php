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

	echo "Duplicate username in database <br>";
} else {
	$query = "INSERT INTO Users (user_id) VALUES (\"" . $_POST["userID"] . "\");";
	$mysqli->query($query);
	echo "Added User:" . $_POST["userID"] . "<br>";
}

echo "<b>Welcome " . $_POST["userID"] . " </b><br>";
echo "</body>";
echo "</html>";

$mysqli->close();

?>
