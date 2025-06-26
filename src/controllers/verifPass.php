<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Récupérer les données du formulaire
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$logDir = __DIR__.'/../log';
$logFilePath = $logDir.'/logs.txt';

$logFile = fopen($logFilePath, 'a');
if(!$logFile){
    die("Unable to open file");
}

fwrite($logFile, date('Y-m-d H:i:s')." - Attemp to connect -> Username : ".$username." Password : ".$password." IP : ".$_SERVER['REMOTE_ADDR']. "\n");
fclose($logFile);

if($username === "Admin" && $password === "root"){
    $_SESSION['user'] = $username;
    header('Location: ../dashboard.php');
    exit;
}else {
    header('Location: ../index.php?error=1');
    exit;
}

?>