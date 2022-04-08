<?php

require_once '../config.php';


if(ISSET($_POST['submit'])){
    if($_POST['realname'] != "" || $_POST['profileIMG'] != "" || $_POST['gender'] != "" || $_POST['email'] != ""){
        try{
            $realname = $_POST['realname'];
            $profileImage = $_POST['profileIMG'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $user = $_SESSION['user'];

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE userinfo SET email ='$email', name ='$realname' , 
                    gender ='$gender', profileIMG ='$profileImage' WHERE userId ='$user' ";
            $db->exec($sql);

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
        $db = null;

        header('location:../pages/profile.php');
    }else{
        echo "hiba a regisztrációnál";
    }
}
