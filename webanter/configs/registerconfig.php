<?php

require_once '../config.php';


if(ISSET($_POST['submit'])){
    if($_POST['realname'] != "" || $_POST['email'] != "" || $_POST['password'] != "" || $_POST['password2'] != ""){
        try{
            $realname = $_POST['realname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO userinfo VALUES ('', '$email', '$realname', '$password', '', 'https://carta.fiu.edu/kopenhavercenter/wp-content/uploads/sites/17/2021/01/depositphotos_29387653-stock-photo-facebook-profile.jpg')";
            $db->exec($sql);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
        $db = null;

        header('location:../index.php');
    }else{
        echo "hiba a regisztrációnál";
    }
}
