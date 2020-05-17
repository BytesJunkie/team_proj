<?php
session_start();     
$user =$_SESSION['loggedin'];
$conn = new mysqli("localhost", "root", "", "alumni");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['name'];
$approved =$_POST['approved'];
$id = $_POST['id'];

$sql = "UPDATE students SET name='$name', approved ='$approved' WHERE username= '$$user'";
echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>