<?php
$isbn=$_POST["isbn"];
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
$sql = "SELECT * FROM textbook WHERE isbn=$isbn";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$textbookname = $row["textbookname"];
    	$author = $row["author"];
    	$price = $row["price"];
    	$pricelink = $row["pricelink"];
    	$pdflink = $row["pdflink"];
    }
}



$conn->close();
?>

<!DOCTYPE html>
<html>
<body>



<form action="edittextbookchange.php" method="post">
	ISBN: <?php echo htmlentities($isbn); ?> <br><br>
	<input type="hidden" name="isbn" value="<?php echo htmlentities($isbn); ?>">
	Name: <input type="text" name="textbookname" value="<?php echo htmlentities($textbookname); ?>" /> <br><br>
	Author: <input type="text" name="author" value="<?php echo htmlentities($author); ?>" /> <br><br>
	Price: <input type="text" name="price" value="<?php echo htmlentities($price); ?>" /> <br><br>
	Pricelink: <input type="text" name="pricelink" value="<?php echo htmlentities($pricelink); ?>" /> <br><br>
	PDFLink: <input type="text" name="pdflink" value="<?php echo htmlentities($pdflink); ?>" /> <br><br>
	<input type="submit" name="Change">
</form>
<form action="update.php" method="post">
	<br><br>
	<input type="submit" value="Back">
</form>
</body>
</html>