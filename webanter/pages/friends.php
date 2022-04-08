<?php

define('path', $_SERVER['DOCUMENT_ROOT'] . '/include/function/header.php');
include path;

// '/webanter/include/function/header.php' --otthon;
// '/include/function/header.php' --suli;

require_once '../config.php';

$db = null;

try{
    $db = new PDO(
        "mysql:host=" . CONFIG_DBSERVER . ";dbname=" . CONFIG_DBNAME . ";charset=utf8mb4",
        CONFIG_DBUSER, CONFIG_DBPASS);
}
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$sql = "SELECT * FROM userinfo WHERE userId=:user  ";
$stmt = $db->prepare($sql);
$stmt->bindValue(':user', $_SESSION['user']);
$stmt->execute();
$fetch = $stmt->fetch();

$stmt = $db->prepare("SELECT * FROM userinfo INNER JOIN friend ON userinfo.userID = friend.FID WHERE friend.UserID = :uid;");
$stmt->bindValue(":uid", $_SESSION['user']);
$stmt->execute();
$a = $stmt->fetchAll();

$data = null;
$tobb = False;
if (isset($_POST['submit'])) {
    if (is_numeric($_POST['profileSearch'])) {
        $stmt = $db->prepare("SELECT * FROM userinfo WHERE userID=:id");
        $stmt->bindValue(':id', $_POST['profileSearch']);
        $stmt->execute();
        $data = $stmt->fetch();

    } else {
        $stmt = $db->prepare("SELECT * FROM userinfo WHERE NAME LIKE :search");
        $stmt->bindValue(':search', '%' . $_POST['profileSearch'] . '%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $tobb = True;
    }
}

?>
<html>
<head>
    <title>webanter</title>

    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <script src="../js/background.js" type="text/javascript"></script>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

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
                    <a class="dropdown-item bg-dark text-light" href="?lang=hu">Magyar</a>
                    <a class="dropdown-item bg-dark text-light" href="?lang=en">English</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="card text-center border-dark mb-3 mx-auto bg-light rounded-top" style="width: 50rem;">
    <div class="card-header">
        <h3 class="card-title"><?= $lang['fhead'] ?></h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?= $lang['name'] ?></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
        <?php if(isset($_SESSION['user'])):
            foreach ($a as $friend): ?>
                <tr>
                    <th scope="row"><?= $friend['FID']?></th>
                    <td><img src="<?= $friend['profileIMG'] ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%;">
                    <?= $friend['name']?></td>
                    <td style="text-align: right">
                        <form method="post" action="../configs/deletefriend.php">
                            <input name="FID" type="hidden" value="<?=$friend['FID']?>">
                            <input name="userID" type="hidden" value="<?=$_SESSION['user']?>">
                            <input type="submit" class="btn btn-danger" value="<?= $lang['removeFriend'] ?>">
                        </form>
                    </td>
                </tr>
        <?php endforeach;?>
        <?php endif?>
            </tbody>
        </table>
        <hr>
        <h3><?= $lang['addFriend'] ?></h3>
        <form action="friends.php" method="post">
            <input type="text" name="profileSearch" placeholder="Ide írd a nevét vagy az ID-jét">
            <input type="submit" name="submit" value="Keresés" class="btn mb-3 mr-3 btn-success">
        </form>
        <hr>
        <?php if(isset($data)):?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?= $lang['name'] ?></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
        <?php if($tobb):?>
        <?php foreach($data as $adat):?>
        <tr>
            <th scope="row"><?= $adat['userID']?></th>
            <td><img src="<?= $adat['profileIMG'] ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%;">
                <?= $adat['name']?></td>
            <td style="text-align: right">
                <form method="post" action="../configs/addfriend.php">
                    <input name="FID" type="hidden" value="<?=$adat['userID']?>">
                    <input name="userID" type="hidden" value="<?=$_SESSION['user']?>">
                    <input type="submit" name="submit" class="btn mb-3 mr-3 btn-success" value="<?= $lang['addFriend'] ?>">
                </form>
            </td>
        </tr>
            <?php endforeach;?>
            <?php else:?>
            <tr>
                <th scope="row"><?= $data['userID']?></th>
                <td><img src="<?= $data['profileIMG'] ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%;">
                    <?= $data['name']?></td>
                <td style="text-align: right">
                    <form method="post" action="../configs/addfriend.php">
                        <input name="FID" type="hidden" value="<?=$data['userID']?>">
                        <input name="userID" type="hidden" value="<?=$_SESSION['user']?>">
                        <input type="submit" name="submit" class="btn mb-3 mr-3 btn-success" value="<?= $lang['addFriend'] ?>">
                    </form>
                </td>
            </tr>
            <?php endif;?>
            </tbody>
        </table>
            <?php else:?>
        <h1>Először keress!</h1>
        <?php endif;?>

    </div>

</div>

<footer class="container-fluid text-secondary" id="footer">
    © 2022 Copyright: MelodyZ
</footer>

</body>
</html>