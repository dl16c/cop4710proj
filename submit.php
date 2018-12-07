<?php
$x=$_POST['course'];
$y=$_POST['university'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="cop4710-1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("connection failed: " . $conn->connection_error);
}
echo "connected successfully";
$sql = "INSERT INTO bookstore VALUES ('$x','$y');";
if ($conn->query($sql) === TRUE) {
	echo "new record created successfully";
} else {
	echo "ERROR: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>