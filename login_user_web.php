<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];
$password =$_POST['password'];

$sql = "SELECT * FROM USERS WHERE EMAIL = '$email' AND PASSWORD = '$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        header('Location:web_monitor/introduction page_1.html');
    }
}else{
    echo "failed";
}
