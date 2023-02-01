<?php
include_once 'dbh.inc.php';
    if (isset($_POST['credit']) && isset($_POST['expiry']) && isset($_POST['csv']) || isset($_POST['cardholder']) || isset($_POST['password'])) {
        $credit = $_POST['credit'];
        $expiry = $_POST['expiry'];
        $csv = $_POST['csv'];
        $cardholder = $_POST['cardholder'];
        $passwords = $_POST['password'];
    }
    
    $sql = "UPDATE `people` SET `credit` = '$credit' WHERE `people`.`passwords` = '$passwords';";
    mysqli_query($connect,$sql);
    $sql = "UPDATE `people` SET `expiry` = '$expiry' WHERE `people`.`passwords` = '$passwords';";
    mysqli_query($connect,$sql);
    $sql = "UPDATE `people` SET `csv` = '$csv' WHERE `people`.`passwords` = '$passwords';";
    mysqli_query($connect,$sql);
    $sql = "UPDATE `people` SET `cardholder` = '$cardholder' WHERE `people`.`passwords` = '$passwords';";
    mysqli_query($connect,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Payment</title>
</head>
<body>
    <h1>Payment Info Changed</h1>
    <form action="account.inc.html">
        <button type="submit">Back to Account</button>
    </form>
</body>
</html>