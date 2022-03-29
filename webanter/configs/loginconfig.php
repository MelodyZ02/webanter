<?php
require_once '../config.php';

if(ISSET($_POST['submit'])){
    if($_POST['email'] != "" || $_POST['password'] != ""){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM userinfo WHERE email=:email AND password=:pw ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':pw', $password);
        $stmt->execute();
        $fetch = $stmt->fetch();

        if(count($fetch) > 0) {
            $_SESSION['user'] = $fetch['userID'];

            header("location:../pages/main.php");
        } else{
            echo "hiba";
        }
    }else{
        echo "hiba a bejelentkezésnél";
    }
}