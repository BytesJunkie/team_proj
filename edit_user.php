<?php
$conn = new mysqli("localhost", "root", "", "alumni");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user = $_POST['username'];
$name = $_POST['name'];
$password =$_POST['password'];
$email = $_POST['email'];
$school = $_POST['school'];
$description = $_POST['description'];
$approved =$_POST['approved'];



$sql = "UPDATE students SET name ='$name', password = '$password', email = '$email', school = '$school', description = '$description',approved = '$approved' WHERE username = '$user'";
echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>