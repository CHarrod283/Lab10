<?php
echo "<html>";
echo "<body>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "carterharrod", "oov7ahJu", "carterharrod");
if($mysqli->connect_errno) {
	echo "Connection failed:" . $mysqli->connect_error . "<br>";
	exit();
}


$query = "SELECT author_id, post_id, content FROM Posts;";

if($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		if(isset($_POST["" . $row["post_id"] . ""])){
			$query = "DELETE FROM Posts WHERE post_id=\"" . $row["post_id"] . "\";";
			$mysqli->query($query);
		}
	}
	echo "</table>";

} else {
	echo "No Users Stored on Database<br>";
}

echo "</body>";
echo "</html>";

$mysqli->close();

?>
