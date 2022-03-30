<?php
include_once '../config.php';

$db = null;

try{
    $db = new PDO(
        "mysql:host=" . CONFIG_DBSERVER . ";dbname=" . CONFIG_DBNAME . ";charset=utf8mb4",
        CONFIG_DBUSER, CONFIG_DBPASS);
}
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if(isset($_POST['submit'])){
    $stmt = $db->prepare("INSERT INTO friend (FID, UserID) VALUES (:fid, :uid)");
    $stmt->bindValue(':fid', $_POST['FID']);
    $stmt->bindValue(':uid', $_POST['userID']);
    $stmt->execute();

    header('Location: ../pages/main.php');
}
?>
