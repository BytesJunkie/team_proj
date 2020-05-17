<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$approved = "no";
//description
if (isset($_POST["approved"]))
{
  $approved = $_POST["approved"];
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
    header('Location: exists.html');
}
else
{
    $stmt = $conn->prepare("INSERT INTO students (name, username, password, email ,school,approved, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$name,$username, $password, $email,$school,$approved ,$description);
    $name = $username = $password = $email = $school = $approved = $description= "";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $user1 = $_POST["user1"];
        $email1 = $_POST["email1"];
        $pass1 = $_POST["pass1"];
    }
    $stmt->execute();
    header("Location: Home_registered.php");
}
$stmt->close();
$conn->close();
?>