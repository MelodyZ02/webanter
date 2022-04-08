<?php

include_once '../config.php';


$stmt = $db->prepare("INSERT INTO chat (`messageID`, `ChatID`, `senderID`, `receiverID`) VALUES ( NULL , '', :sender, :receiver);");
$stmt->bindValue(':receiver', $_POST['FID']);
$stmt->bindValue(':sender', $_POST['userID']);
$stmt->execute();

header('Location: ../pages/main.php');


?>
