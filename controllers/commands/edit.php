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



    $file = new File("new_article_image", "../../img/");
    $article = new Article($Connection());

    $article->updateArticle(
        $_POST["edit_button"],
        $_POST["new_article_name"],
        $_POST["new_article_categorie"],
        $file->getFile(),
        $_POST["new_article_description"]
    );



?>