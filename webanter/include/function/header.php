<?php

include 'include/function/language.php';

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?= $lang['btn'] ?>
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item bg-dark text-light" href="?lang=hu">Magyar</a>
                    <a class="dropdown-item bg-dark text-light" href="?lang=en">English</a>
                </div>
    </div>
</nav>
