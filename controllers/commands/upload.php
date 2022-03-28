<?php
header("Location:../../views/app/index.php")
?>

<?php require '../../models/database/db-config.php'?>

<?php
require '../../vendor/autoload.php';

use App\CRUD\Article;
use App\helpers\File;

?>

<?php

$file = new File("article_image", "../../img/dir/");

$article = new Article($Connection());

$article->createArticle(
    $_POST['article_name'],
    $_POST['article_categorie'],
    $file->getFile(),
    $_POST['article_description']

);


?>













