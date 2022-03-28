<?php
session_start();
?>

<?php require '../../models/database/db-config.php'?>

<?php
foreach($_SESSION as $key => $value)
{
    unset($_SESSION[$key]);
}
// $Check($_SESSION);

header("Location:../../views/app/index.php");