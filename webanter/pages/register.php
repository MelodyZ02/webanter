<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/function/header.php';
require_once '../config.php';

?>
<html>
<head>
    <title>webanter</title>

    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="../js/background.js" type="text/javascript"></script>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</head>
<body onload="backgr()">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if(isset($_GET['lang'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?lang=<?=$_GET['lang']?>"><?= $lang['nav1'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php?lang=<?=$_GET['lang']?>"><?= $lang['nav2'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php?lang=<?=$_GET['lang']?>"><?= $lang['nav3'] ?></a>
                </li>
            <?php else:?>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php"><?= $lang['nav1'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><?= $lang['nav2'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"><?= $lang['nav3'] ?></a>
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


    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5"><?= $lang['Createacc'] ?></h2>

                            <form role="form" method="post" action="registerconfig.php">

                                <div class="form-outline mb-4">
                                    <input name="realname" type="text" id="name" class="form-control form-control-lg" placeholder="<?= $lang['form1'] ?>" />
                                    <br>
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="email" type="email" id="email" class="form-control form-control-lg" placeholder="<?= $lang['form2'] ?>" />
                                    <br>
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="password" type="password" id="pass" class="form-control form-control-lg" placeholder="<?= $lang['form3'] ?>" />
                                    <br>
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="password2" type="password" id="pass2" class="form-control form-control-lg" placeholder="<?= $lang['form4'] ?>" />
                                    <br>
                                </div>

                                <div class="form-check d-flex justify-content-left mb-5">
                                    <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value=""
                                            id="tos"
                                    />
                                    <label class="form-check-label" for="tosLink">
                                        <?= $lang['tos'] ?>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input name="submit" class="btn btn-lg btn-dark btn-block" type="submit" value="<?= $lang['register'] ?>">
                                </div>

                                <p class="text-center text-muted mt-5 mb-0"><?= $lang['already'] ?> <a href="login.php" class="fw-bold text-body"><u><?= $lang['login'] ?></u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<footer class="container-fluid text-secondary" id="footer">
    © 2022 Copyright: MelodyZ
</footer>

</body>
</html>