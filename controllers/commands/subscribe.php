<?php
header("Location:../../views/app/index.php")
?>

<?php require '../../models/database/db-config.php'?>


<?php
require '../../vendor/autoload.php';

use App\CRUD\User;
use App\helpers\File;


$file = new File("user_profile", "../../img/dir/");
$user = new User($Connection());

$user->createUser(
    $_POST['user_name'],
    $_POST['user_password'],
    $_POST['user_email'],
    $file->getFile()
    

);

