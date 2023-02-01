<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
</head>
<body>
    <h1>Account Details</h1>
    <form action="account.inc.html">
        <button type="submit">Back to Account</button>
    </form>
</body>
</html>

<?php
include_once 'dbh.inc.php';
    if(isset($_POST['password'])) {
        $passwords = $_POST['password'];
        $sql = "SELECT * FROM people Where `people`.`passwords` = '$passwords';";
        $result = $connect->query($sql);
        if($result->num_rows == 0) {
            echo "User Not Found <br>";
        }
        else {
            echo "<table>";
            echo "<tr>";
            echo "<th>First</th>";
            echo "<th>Last</th>";
            echo "<th>Username</th>";
            echo "<th>Country</th>";
            echo "<th>Phone</th>";
            echo "<th>Email</th>";
            echo "</tr>";
        }
            
        if ($result->num_rows >= 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $first = $row["fname"]; 
                $last = $row["lname"];
                $username = $row["username"];
                $country = $row["country"];
                $email = $row["email"];
                $phone = $row["phone"];
                echo "<tr>";
                echo "<td>$first</td>";
                echo "<td>$last</td>";
                echo "<td>$username</td>";
                echo "<td>$country</td>";
                echo "<td>$email</td>";
                echo "<td>$phone</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    

?>