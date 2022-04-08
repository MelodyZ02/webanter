<?php
session_start();

if(isset($_SESSION['user'])){
    require_once "../config.php";

    session_unset();
    session_destroy();
    header("location:/index.php");
}

?>