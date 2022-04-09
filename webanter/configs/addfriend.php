<?php
include_once '../config.php';


if(isset($_POST['submit'])){
    $stmt = $db->prepare("SELECT * FROM friend WHERE FID = :fid AND UserID = :uid");
    $stmt->bindValue(':fid', $_POST['FID']);
    $stmt->bindValue(':uid', $_POST['userID']);
    $stmt->execute();

    $rows = $stmt->rowCount();

    var_dump($rows);

    if($_POST['FID'] == $_POST['userID'] ||  $rows > 0) {
        echo '<script>
              alert("error/hiba");
              window.location.replace("http://localhost:8001/pages/friends.php");
              </script>';
    } else {

        $stmt = $db->prepare("INSERT INTO friend (FID, UserID) VALUES (:fid, :uid)");
        $stmt->bindValue(':fid', $_POST['FID']);
        $stmt->bindValue(':uid', $_POST['userID']);
        $stmt->execute();
        header('Location: ../pages/friends.php');
    }
}
?>
