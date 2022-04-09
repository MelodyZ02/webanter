<?php
require_once '../config.php';

if(isset($_POST['submit'])){
    $stmt = $db->prepare("INSERT INTO chat (messageID, senderID, receiverID, message) VALUES (NULL, :sender, :receiver, :message);");
    $stmt->bindValue(':sender',$_POST['senderID']);
    $stmt->bindValue(':receiver',$_POST['receiverID']);
    $stmt->bindValue(':message',$_POST['message']);
    $stmt->execute();

    header('Location: ../pages/chat.php?r=' . $_POST['receiverID']);

} else {
    var_dump($_POST);
}
