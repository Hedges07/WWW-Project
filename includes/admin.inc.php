<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Admin Tools</h1>
    <form action="admin.inc.php" method="POST">
        <label for="password" class="required">Password</label>
        <input type="password" name="password" id="password" placeholder="">
        <br>
        <button type="submit">Enter</button>
    </form>
    
    <form action="account.inc.html">
        <button type="submit">Back to Account</button>
    </form>
</body>
</html>
<?php
include 'dbh.inc.php';
    if (isset($_POST['password'])) {
        $passwords = $_POST['password'];
        $sql = "SELECT * FROM people Where `people`.`passwords` = '$passwords';";
        $admin = $connect->query($sql);
        if ($admin->num_rows >= 0) {
            // output data of each row
            while($row = $admin->fetch_assoc()) {
                $isAdmin = $row["admin"];
            }
        }
        if($isAdmin == 1) {
            admin();
        }
        else {
            echo "You're not an admin";
        }
    }
    function admin() {
        include 'dbh.inc.php';
        $sql = "SELECT * FROM `people`;";
        $all = $connect->query($sql);
        echo "<table>";
        echo "<tr>";
        echo "<th>First</th>";
        echo "<th>Last</th>";
        echo "<th>Username</th>";
        echo "<th>Country</th>";
        echo "<th>Phone</th>";
        echo "<th>Email</th>";
        echo "</tr>";
            
        if ($all->num_rows >= 0) {
            // output data of each row
            while($row = $all->fetch_assoc()) {
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
        //DELETE FROM `users` WHERE `users`.`username` = '$username'
    }
?>