<?php
session_start();
?>
<!-- using Ajax & jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- using bootrstrap framework -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/adp.css">
<!DOCTYPE html>
<html>

<head>
    <title>Team project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>

<body>
    <div class="row">
        <div class="column left">
            <h2><b>Welcome Guest<b></h2>
            <p>Some text..</p>
        </div>
        <div class="column middle">
            <table class="table table-striped" id="nameTable">
                <thead class="thead-dark">
                    <tr data-href="test">
                        <th onclick="sortTable(0)">Name</th>
                        <th onclick="sortTable(1)">Username</th>
                        <th onclick="sortTable(2)">School</th>
                        <th onclick="sortTable(3)">Approved</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <?php
                        $conn = mysqli_connect("localhost", "root", "", "alumni");
                        $test ="";
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $result = $conn->query("SELECT * FROM students");
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            
                        $test = $row["username"];
                        echo "
                        <tr> 
                        <td><a href=page.php?username='$test' </a>" .$row["name"]. "</td>
                        <td>" . $row["username"] . "</td><td>" . $row["school"] . "</td><td>" . $row["approved"] . "</td><td>" . $row["description"] . "</td></tr>";
                        }
                        echo "</table>";
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
            </table>
        </div>
    </div>

    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("nameTable");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

    </script>

</body>

</html>
