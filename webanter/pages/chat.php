<?php

define('path', $_SERVER['DOCUMENT_ROOT'] . '/include/function/header.php');
include path;

require_once '../config.php';

$sql = "SELECT * FROM userinfo WHERE userId=:user  ";
$stmt = $db->prepare($sql);
$stmt->bindValue(':user', $_SESSION['user']);
$stmt->execute();
$fetch = $stmt->fetch();

$stmt = $db->prepare("SELECT * FROM userinfo INNER JOIN friend ON userinfo.userID = friend.FID WHERE friend.UserID = :uid;");
$stmt->bindValue(":uid", $_SESSION['user']);
$stmt->execute();
$f = $stmt->fetchAll();




if(isset($_GET['r'])){
    $sql = "SELECT * FROM userinfo WHERE userId=:user  ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user', $_GET['r']);
    $stmt->execute();
    $friend = $stmt->fetch();

    $stmt = $db->prepare("SELECT * FROM `chat` WHERE senderID = :user AND receiverID = :friend OR senderID = :friend AND receiverID = :user;");
    $stmt->bindValue(':friend', $_GET['r']);
    $stmt->bindValue(':user', $_SESSION['user']);
    $stmt->execute();
    $chat = $stmt->fetchAll();



}

?>
<html>
<head>
    <title>webanter</title>

    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <script src="../js/background.js" type="text/javascript"></script>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body onload="backgr()">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 justify-content-between">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if(isset($_GET['lang'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="main.php?lang=<?=$_GET['lang']?>"><?= $lang['nav1'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="friends.php?lang=<?=$_GET['lang']?>"><?= $lang['nav4'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><b><?= $fetch['name'] ?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php?lang=<?=$_GET['lang']?>"><?= $lang['logout'] ?></a>
                </li>
            <?php else:?>
                <li class="nav-item">
                    <a class="nav-link" href="main.php"><?= $lang['nav1'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="friends.php"><?= $lang['nav4'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><b><?= $fetch['name'] ?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php"><?= $lang['logout'] ?></a>
                </li>
            <?php endif;?>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown navbar-right">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?= $lang['btn'] ?>
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item bg-dark text-light" href="?r=<?= $_GET['r']?>?lang=hu">Magyar</a>
                    <a class="dropdown-item bg-dark text-light" href="?r=<?= $_GET['r']?>?lang=en">English</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="card text-center border-dark mb-3 mx-auto bg-light rounded-top" style="width: 30rem;">
    <div class="card-header">
        <h3 class="card-title"><img src="<?= $friend['profileIMG'] ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%;"> <?= $friend['name'] ?></h3>
    </div>
    <div class="card-body">
        <div class="chat-box">
            <?php foreach($chat as $rows):
                if($rows['senderID'] == $friend['userID']): ?>

            <div class="chat incoming">
                <div class="details">
                    <p><?= $rows['message']?></p>
                </div>
            </div>
        <?php elseif ($rows['receiverID'] == $friend['userID']): ?>
                <div class="chat outgoing">
                    <div class="details">
                        <p><?= $rows['message']?></p>
                    </div>
                </div>
            <?php endif;
                endforeach; ?>
        </div>
        <hr>
        <form method="post" action="../configs/send_message.php" class="form-inline">
            <input name="receiverID" type="hidden" value="<?=$friend['userID']?>">
            <input name="senderID" type="hidden" value="<?=$_SESSION['user']?>">
            <input name="message" type="text" class="form-control mr-sm-2" placeholder="Lorem ipsum" style="width: 23rem">
            <input type="submit" name="submit" class="btn btn-success my-2 my-sm-0" style="height: 38px" value="<?= $lang['send']?>">
        </form>
    </div>
</div>

<footer class="container-fluid text-secondary" id="footer">
    © 2022 Copyright: MelodyZ
</footer>

</body>
</html>