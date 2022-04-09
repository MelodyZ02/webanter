<?php

include_once '../config.php';


    $stmt = $db->prepare("SELECT * FROM chat WHERE senderID = :fid AND receiverID = :uid OR senderID = :uid AND receiverID = :fid");
    $stmt->bindValue(':fid', $_POST['FID']);
    $stmt->bindValue(':uid', $_POST['userID']);
    $stmt->execute();

    $rows = $stmt->rowCount();


    if($_POST['FID'] == $_POST['userID'] ||  $rows > 0){
        echo '<script>
              alert("error/hiba");
              window.location.replace("http://localhost:8001/pages/friends.php");
              </script>';
    }else{

    $stmt = $db->prepare("INSERT INTO chat (`messageID`, `ChatID`, `senderID`, `receiverID`) VALUES ( NULL , '', :sender, :receiver);");
    $stmt->bindValue(':receiver', $_POST['FID']);
    $stmt->bindValue(':sender', $_POST['userID']);
    $stmt->execute();

    header('Location: ../pages/main.php');

    }


?>
