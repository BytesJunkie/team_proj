<?php  //Start the Session
session_start();
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "alumni";

// Create connection
$conn = new mysqli($servername1, $username1, $password1, $dbname1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
 //3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
}
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `students` WHERE username='$username' and password='$password'";

 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1)
{
echo "Hai " . $username . "<br>";
echo "This is the Members Area";
//header("Location: customers/Action.php");
}
else
{
    //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
echo $fmsg;
//header('refresh:1; url=Home.html');

}


?>