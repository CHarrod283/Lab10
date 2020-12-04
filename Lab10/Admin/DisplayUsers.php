<?php
echo "<html>";
echo "<body>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "carterharrod", "oov7ahJu", "carterharrod");
if($mysqli->connect_errno) {
	echo "Connection failed:" . $mysqli->connect_error . "<br>";
	exit();
}


$query = "SELECT user_id FROM Users;";

if($result = $mysqli->query($query)) {
	echo "<table>";
	echo "<tr><th>Usernames<th></tr>";
	while ($row = $result->fetch_assoc()) {

		echo "<tr>";
		echo "<td>" . $row["user_id"] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

} else {
	echo "No Users Stored on Database<br>";
}

echo "</body>";
echo "</html>";

$mysqli->close();

?>
