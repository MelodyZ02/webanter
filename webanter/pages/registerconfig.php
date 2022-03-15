<?php
session_start();

require_once '../config.php';


if(ISSET($_POST['submit'])){
    if($_POST['realname'] != "" || $_POST['email'] != "" || $_POST['password'] != "" || $_POST['password2'] != ""){
        try{
            $realname = $_POST['realname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO userinfo VALUES ('', '$email', '$realname', '$password', '', '')";
            $db->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
        $db = null;
        header('location:/webanter/index.php');
    }else{
        echo "hiba a regisztrációnál";
    }
}
