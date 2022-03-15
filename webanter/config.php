<?php
define("CONFIG_DBSERVER", "localhost");
define("CONFIG_DBUSER", "webanter_user");
define("CONFIG_DBPASS", "RRp2I)9h0LA9QBsZ");
define("CONFIG_DBNAME", "webanter");

$db = null;
try{
    $db = new PDO(
        "mysql:host=" . CONFIG_DBSERVER . ";dbname=" . CONFIG_DBNAME . ";charset=utf8mb4",
        CONFIG_DBUSER, CONFIG_DBPASS);
}
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}