<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/aded.css">
<head>
    <title>Covid-19 data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    </style>
</head>

<body>
    <?php
    $username = $_GET['username'];

    $conn =  mysqli_connect("localhost", "root", "", "alumni");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `students` WHERE `username` = ".$_GET['username'];
$result = $conn->query($sql);

$row = $result->fetch_array();

$conn->close();
    
$name =  $row["name"];
$username = $row["username"];
$password = $row["password"];
$email = $row["email"];
$school = $row["school"];  
$description = $row["description"];    
$approved = $row["approved"];    
      
?>

    <div class="container">
    <form action="edit_user.php" method="post">
       
       <?php   
        echo "<p>Your name is $name</p>";?>
        
        <?php   
        echo "<p>You are approved: $approved</p>";
         ?><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly><br><br>
        <label for="email">E-mail:</label>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br><br>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>
        <label for="school">School:</label>
        <input type="text" id="school" name="school" value="<?php echo $school; ?>"><br><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo $description; ?>"><br><br>
        <label for="approved">Approved:</label><br>
        <select id="approved" name="approved">
            <option value="no">No</option>
            <option value="yes">Yes</option>
        </select><br><br>
        <input type="submit" value="Submit changes">

    </form>
    </div>
</body>

</html>
