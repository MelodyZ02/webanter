<?php
include_once '../config.php';


if(isset($_POST['submit'])){
    $stmt = $db->prepare("INSERT INTO friend (FID, UserID) VALUES (:fid, :uid)");
    $stmt->bindValue(':fid', $_POST['FID']);
    $stmt->bindValue(':uid', $_POST['userID']);
    $stmt->execute();

    header('Location: ../pages/main.php');
}
?>
