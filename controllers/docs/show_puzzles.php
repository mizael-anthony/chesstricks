
<?php require '../../models/database/db-config.php'?>

<?php

require '../../vendor/autoload.php';

use App\CRUD\Article;

?>


<?php

    $article = new Article($Connection());
    $per_page = 12;
    $offset = $per_page * ($_GET["current_page"] - 1);
    

    echo json_encode($article->showArticle($per_page, $offset, "puzzle"));
?>






