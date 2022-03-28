


<?php require '../../models/database/db-config.php'?>

<?php

require '../../vendor/autoload.php';

use App\CRUD\Article;

?>


<?php
    $article = new Article($Connection());
    $article->deleteArticle($_GET["delete_button"]);
?>