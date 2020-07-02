<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);
include_once ("dbconnect.php");
// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true); 

$name = $_POST['name'];
$email = $_POST['email'];
$password1 = $_POST['password'];

$sqlinsert = "INSERT INTO USERS(NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$password1')";

if ($conn->query($sqlinsert) === true)
{
    header('Location:web_monitor/monitor.html');
    
}
else
{
    echo "failed";
}

try{

    $mail->CharSet ="UTF-8";                     
    $mail->SMTPDebug = 0;                        
    $mail->isSMTP();                             
    $mail->Host = 'sg2plcpnl0234.prod.sin2.secureserver.net';                
    $mail->SMTPAuth = true;                      
    $mail->Username = 'noreply@lossyhome.xyz';                
    $mail->Password = 'qaz147';             
    $mail->SMTPSecure = 'ssl';                    
    $mail->Port = 465;                            

    $mail->setFrom('noreply@lossyhome.xyz', 'Sintok Monitoring and Surveiliance Webapp');  //发件人
    $mail->addAddress($email);  
   
    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Your email have registered successfully!';
    $mail->Body    = '<h1>You have registered !</h1>'.'<div>Your email: <div>'.$email.'<p><p>' .'<div>Registered date: <div>'.'GMT+0: '.date('Y-m-d H:i:s');

    $mail->send();
}catch (Exception $e) {
    echo 'Send failed: ', $mail->ErrorInfo;
}

?>
