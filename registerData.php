<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "alumni";

//name
if (isset($_POST["name"]))
{
  $name = $_POST["name"];
} 

//username
if (isset($_POST["username"]))
{
  $username = $_POST["username"];
} 

//email
if (isset($_POST["email"]))
{
  $email = $_POST["email"];
} 

//password
if (isset($_POST["password"]))
{
  $password = $_POST["password"];
} 

//school
if (isset($_POST["school"]))
{
  $school = $_POST["school"];
} 

//description
if (isset($_POST["description"]))
{
  $description = $_POST["description"];
} 






// Create connection
$conn = new mysqli($servername1, $username1, $password1, $dbname1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ExistName = "SELECT * FROM `students` WHERE username='$username'";
$result = mysqli_query($conn, $ExistName) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 1)
{
    $fmsg = "User already exists.";
    echo $fmsg;
   // header('Location: exists.html');
}
else
{
    $stmt = $conn->prepare("INSERT INTO students (name, username, password, email ,school, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",$name,$username, $password, $email,$school,$description);

    $stmt->execute();
    $stmt->close();
    $fmsg = "Successful register";
    echo $fmsg;
    //header("Location: Home_registered.php");
}

$conn->close();
?>