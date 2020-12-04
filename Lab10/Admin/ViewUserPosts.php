<?php
echo "<html>";
echo "<body>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "carterharrod", "oov7ahJu", "carterharrod");
if($mysqli->connect_errno) {
	echo "Connection failed:" . $mysqli->connect_error . "<br>";
	exit();
}


$query = "SELECT author_id, post_id, content FROM Posts WHERE author_id=\"" . $_POST["username"] . "\";";
//echo "$query <br>";
if($result = $mysqli->query($query)) {
	echo "<table>";
	echo "<tr>";
	echo "<th>" . $_POST["username"] . "<th>";
	echo "<th>Post Number<th>";
	echo "<th>Content<th>";
	echo "</tr>";
	while ($row = $result->fetch_assoc()) {

		echo "<tr><td><td>";
		echo "<td>" . $row["post_id"] . "</td>";
		echo "<td>" . $row["content"] . "</td>";
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
