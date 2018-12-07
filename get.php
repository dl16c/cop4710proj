<?php
$y=$_POST['ccode'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="cop4710-1";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqljoin = "SELECT * FROM coursetext INNER JOIN textbook ON coursetext.idcourse = \"" . $y . "\" AND coursetext.isbn = textbook.isbn";
$resultjoin = $conn->query($sqljoin);
if ($resultjoin->num_rows > 0) {
	while($row2 = $resultjoin->fetch_assoc()) {
		$textbookname = $row2['textbookname'];
		$pricelink = $row2["pricelink"];
		$price = $row2["price"];
		echo "Required textbook found.<br><br>\"" . $row2["textbookname"] . "\" by: " . $row2["author"] . "<br> Price: <a href='$pricelink'>$price</a><br>";
		if ($row2['pdflink'] == NULL) {
			echo "No pdf link, but you might find a better deal at these bookstores:<br>";
			$sql3 = "SELECT * FROM bookstore";
			$result3 = $conn->query($sql3);
			if ($result3->num_rows > 0) {
				while ($row3 = $result3->fetch_assoc()) {
					echo $row3["bookstorename"] . " @ " . $row3["location"] . "<br>";
				}
				$link = "https://www.google.com/search?q=" . $textbookname . "+filetype%3Apdf";
				echo "Or try our automatic google search <a href='$link'>here!</a>";
				echo "<br><br><br>";
			}
		} else {
			$pdf = $row2["pdflink"];
			echo "<a href='$pdf'>pdf link</a><br><br><br>";
		}
	}
} else {
	echo "No textbook required or course not found!";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<form action="find.php" method="post">
	<input type="submit" value="Back">
	<br><br>
</form>
<form action="sample.php" method="post">
	<input type="submit" value="Main Menu">
</form>
</body>
</html>