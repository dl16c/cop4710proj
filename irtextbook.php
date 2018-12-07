<?php

$isbn=$_POST['isbn'];
$textbookname=$_POST['textbookname'];
$author=$_POST['author'];
$price=$_POST['price'];
$pricelink=$_POST['pricelink'];
$pdflink=$_POST['pdflink'];
$ccode=$_POST['ccode'];
$uni=$_POST['uni'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="cop4710-1";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['remove'])){
	$sql = "DELETE FROM textbook WHERE isbn=$isbn";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
	
} else {

	$sql = "INSERT INTO textbook VALUES ($isbn, \"$textbookname\", \"$author\", $price, \"$pricelink\", \"$pdflink\")";
	if ($conn->query($sql) === TRUE) {
		echo "New Record Created In Textbook<br>";
	} else {
		echo "Error creating record: " . $conn->error;
	}

	$sql = "INSERT INTO coursetext VALUES ($isbn, \"$ccode\")";
	if ($conn->query($sql) === TRUE) {
		echo "New Relationship Created";
	} else {
		echo "Error creating record: " . $conn->error;
	}

	$sql = "SELECT * FROM course WHERE idcourse=\"$ccode\" and university=\"$uni\"";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	echo "<br>Class already exists. Changes complete.";
    } else {
    	$sql = "INSERT INTO course VALUES (idcourse=\"$ccode\", university=\"$uni\", textrequire=1)";
    	if ($conn->query($sql) === TRUE) {
			echo "<br>New Class Created. Changes complete. <br>";
		} else {
			echo "<br>Error creating record: " . $conn->error;
		}
    }
}

$conn->close();
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