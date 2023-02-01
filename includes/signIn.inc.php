<?php
include_once 'dbh.inc.php';
        
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $passwords = $_POST['password'];

        $sql = "SELECT * FROM people Where `people`.`passwords` = '$passwords';";
        $resultPassword = $connect->query($sql);
        $sql = "SELECT * FROM people Where `people`.`username` = '$username';";
        $resultUsername = $connect->query($sql);
        if($resultUsername->num_rows > 0 && $resultPassword->num_rows > 0) {
            include "account.inc.html";
        }
        else {
            if($resultUsername->num_rows == 0) {
                echo "Username not Correct <br>";
            }
            if($resultPassword->num_rows == 0) {
                echo "Password not Correct <br>";
            }
        }
    }
    else {
        echo "Not enough info entered";
    }
?>