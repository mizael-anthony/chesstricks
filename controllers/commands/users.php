
<?php require '../../models/database/db-config.php'?>

<?php

require '../../vendor/autoload.php';

use App\CRUD\User;

?>

<?php


$users_subscribed = new User($Connection());

echo json_encode($users_subscribed->showUser());


?>