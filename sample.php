<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="cop4710-1";
$textbookname="";
$author="";
$price=1;
$pricelink="";
$pdflink="";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("connection failed: " . $conn->connection_error);
}
$sql = "SELECT * FROM textbook WHERE pdflink <> ''";
$result = $conn->query($sql);

$rows = $result->num_rows;
echo "Welcome to the online student textbook database! Open to all FSU, FAMU, and TCC computer science students! ";
echo "We have a total of " . $rows . " free pdf textbooks in our database!";

$conn->close();
?>


<!DOCTYPE html>
<html>
<body>
<br><br><br>
<form action="find.php" method="post">
	<input type="submit" value="Find"> Textbooks for my course<br>
	<br><br>
</form>
<form action="update.php" method="post">
	<input type="submit" value="Update"> Tables/Relationships
</form>


</body>
</html>