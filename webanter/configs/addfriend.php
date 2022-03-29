<?php
include_once '../config.php';

$db = null;

try{
    $db = new PDO(
        "mysql:host=" . CONFIG_DBSERVER . ";dbname=" . CONFIG_DBNAME . ";charset=utf8mb4",
        CONFIG_DBUSER, CONFIG_DBPASS);
}
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$stmt = $db->prepare("INSERT INTO `friend` WHERE `friend`.`FID` = :fid AND `friend`.`UserID`=:uid");
$stmt->bindValue(':uid', $_SESSION['user']);
$stmt->bindValue(':fid', $_POST['FID']);
$stmt->execute();

header('Location:../pages/main.php');
?>
<form>
    <input type="text" name="search" placeholder="írd be a barátod ID-ját, vagy a nevét">
    <input type="submit" value="Keresés">
</form>
