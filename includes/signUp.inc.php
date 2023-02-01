<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form action="../signUp_signIn.html">
            <button type="submit">Back to Login</button>
    </form>
</body>
</html>
<?php

include_once 'dbh.inc.php';
    if (isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['username']) || isset($_POST['country']) || isset($_POST['email']) ||  isset($_POST['phone']) || isset($_POST['password']) || isset($_POST['confirmPassword']) || isset($_POST['age'])) {
        $first = $_POST['firstName'];
        $last = $_POST['lastName'];
        $username = $_POST['username'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $passwords = $_POST['password'];
        $cpassword = $_POST['confirmPassword'];
        $age = $_POST['age'];
    }
    else {
        echo "Info Missing";
    }

    
    
    if(($first == null) || ($passwords != $cpassword)) {
        echo "Not Added<br>";
        echo "Passwords do not match<br>";
        echo "Or a field was not filled<br>";
    }
    if($age == null) {
        echo "You're not old enough to access this website ";
    }
    else {
        $sql = "INSERT INTO people (fname, lname, username, country, email, phone, passwords, cpassword, age) VALUES ('$first','$last','$username','$country','$email','$phone','$passwords','$cpassword','$age');";
        mysqli_query($connect,$sql);
        echo "Signed Up";
    }
?>