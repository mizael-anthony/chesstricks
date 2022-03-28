<?php session_start()?>
<?php require '../../models/database/db-config.php'?>

<?php

require '../../vendor/autoload.php';
use App\CRUD\User;

?>


<?php

$user = new User($Connection());
$user_connected = $user->getOneUser(
    $_POST["login_name"],
    $_POST["login_password"]
);

?>

<?php

if($user_connected)
{

    header("Location:../../views/app/index.php");


    
    foreach($user_connected as $key => $value)
    {
        $_SESSION[$key] = $value;
    }

}



else{
    $title = "Erreur";
    require '../../views/public/title.php';
?>
<div class="alert alert-danger">
  <strong>Erreur !</strong>Veuillez réessayer s'il vous plait
</div>
<a href="../../views/app/index.php">&laquo; page d'acceuil</a>
<?php  
}

?>




