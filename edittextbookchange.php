<?php
$isbn=$_POST["isbn"];
$textbookname=$_POST['textbookname'];
$author=$_POST['author'];
$price=$_POST['price'];
$pricelink=$_POST['pricelink'];
$pdflink=$_POST['pdflink'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="cop4710-1";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM textbook WHERE isbn=$isbn";
if ($conn->query($sql) === TRUE) {
	echo "Changing record...";
} else {
	echo "Error changing record: " . $conn->error;
}
$sql = "INSERT INTO textbook VALUES ($isbn, \"$textbookname\", \"$author\", $price, \"$pricelink\", \"$pdflink\")";
if ($conn->query($sql) === TRUE) {	
	echo "Success!";
} else {
	echo "Error changing record: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<body>
<form action="update.php" method="post">
	<br><br>
	<input type="submit" value="Back">
</form>
</body>
</html>