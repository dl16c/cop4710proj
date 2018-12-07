<!DOCTYPE html>
<html>
<body>

<form action="sample.php" method="post">
	<input type="submit" value="<--"> back <br><br>
</form>

<form action="irtextbook.php" method="post">
	INSERT/REMOVE A BOOK-COURSE RELATIONSHIP:<br><br>
	ISBN: <input type="number" name="isbn"> <br>
	Book Name: <input type="text" name="textbookname"> <br>
	Author: <input type="text" name="author"> <br>
	Price: <input type="number" name="price"> <br>
	Price Link: <input type="text" name="pricelink"> <br>
	PDF Link: <input type="text" name="pdflink"> <br>
	Class relationship: <input type="text" name="ccode"> <br>
	University:
	<select name="uni">
  		<option value="FSU">FSU</option>
  		<option value="FAMU">FAMU</option>
  		<option value="TCC">TCC</option>
	</select> <br>
	<input type="checkbox" name="remove" value="No"> this is a removal process. (only ISBN needed) (will remove isbn-course relationship) <br>
	<input type="submit" value=" Go "> <br><br>
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="cop4710-1";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM textbook";
$result = $conn->query($sql);

echo "-------------------------------[textbook]--------------------------------<br>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	echo $row["isbn"] . " : " . $row["textbookname"] . " : " . $row["author"] . " : " . $row["price"] . " : " . $row["pricelink"] . " : " . $row["pdflink"] . "<br>";
    }
}
$sql = "SELECT * FROM coursetext";
$result = $conn->query($sql);

echo "<br>-----------------------[course-text relationship]-----------------------<br>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	echo $row["isbn"] . " : " . $row["idcourse"] . "<br>";
    }
}

$conn->close();
?>

<br><br>
EDIT AN EXISTING RECORD<br><br>
<form action="edittextbook.php" method="post">
	ISBN: <input type="number" name="isbn">
	<input type="submit" value="Edit"> <br><br>

</form>

</body>
</html>

