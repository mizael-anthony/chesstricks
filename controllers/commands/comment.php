

<?php session_start() ?>

<?php require '../../models/database/db-config.php'?>

<?php

require '../../vendor/autoload.php';
use App\CRUD\Comment;

?>


<?php



$comment = new Comment($Connection());

$comment->createComment(
    $_POST["comment_button"],
    $_SESSION["UserID"],
    $_POST["comment_article"]
);

echo json_encode($comment->getLastComment());


?>
