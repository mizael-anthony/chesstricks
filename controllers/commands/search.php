
<?php require '../../models/database/db-config.php'?>

<?php 
require '../../vendor/autoload.php';

use App\CRUD\Article;
?>


<?php

$article = new Article($Connection());
echo json_encode($article->retrieveArticle($_GET["search_article"], "blog"));   


?>

