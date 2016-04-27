<?php
define('DB_SERVER', 'eu-cdbr-azure-north-e.cloudapp.net');
define('DB_USERNAME', 'b007c3ffbd1a09');
define('DB_PASSWORD', 'e4d0b324');
define('DB_DATABASE', 'rgutest_cmm503_HRLT');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($db->connect_error){
    die("Connection failed:".$db->connect_error);
}
$stmt=$db->prepare("INSERT INTO MyGuests (username, email)VALUES(?,?)");
$stmnt->bind_param("sss", $username,$email);
?>
