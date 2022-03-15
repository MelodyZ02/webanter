<?php
session_start();

require_once '../config.php';

if(ISSET($_POST['submit'])){
    if($_POST['email'] != "" || $_POST['password'] != ""){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM userinfo WHERE email=? AND password=? ";
        $query = $db->prepare($sql);
        $query->execute(array($email,$password));
        $row = $query->rowCount();
        $fetch = $query->fetch();
        echo $email;
        if($row > 0) {
            $_SESSION['user'] = $fetch['mem_id'];
            header("location: main.php");
        } else{
            echo "hiba";
        }
    }else{
        echo "hiba a bejelentkezésnél";
    }
}