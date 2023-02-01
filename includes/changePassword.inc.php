<?php
include_once 'dbh.inc.php';
    if (isset($_POST['passwords']) || isset($_POST['changePassword'])) {
        $passwords = $_POST['password'];
        $changePassword = $_POST['changePassword'];
    }

    $sql = "UPDATE `people` SET `passwords` = '$changePassword' WHERE `people`.`passwords` = '$passwords';";
    mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h1>Password Info Changed</h1>
    <form action="account.inc.html">
        <button type="submit">Back to Account</button>
    </form>
</body>
</html>