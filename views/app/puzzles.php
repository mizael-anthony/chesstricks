<?php session_start()?>
<?php
require '../../models/database/db-config.php';
require '../../vendor/autoload.php';

use App\CRUD\Article;
use App\src\Carousel;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = "S'entraîner";
    require '../public/title.php';
    ?>
</head>

<body>
    <?php require '../public/header.php'?>

    <?php        
        $images =
        [
            "../../img/carousel/dark-chess-board.jpg",
            "../../img/carousel/board.jpg",
            "../../img/carousel/chessboard.jpg",
        ];

        Carousel::createCarousel(
            "carousel_top",
            1000,
            $images,
            1400,
            500
        );
    ?>


    <?php
        $article = new Article($Connection());
        $article_counts = (int)($article->countArticle("puzzle"));
        $current_page = (int)($_GET["page"] ?? 1);
        $per_page = 12;
        $pages = ceil($article_counts / $per_page);
    ?>

    <section>
        <h1 class="font-weight-bold" id="current_page" value=<?=$current_page?>>Puzzles<span class="badge badge-pill badge-primary link"><?=$article_counts?></span></h1>
        <div class="container mt-3 mb-3" >
            <div class="row">
            </div>
        </div>
        <div class="container d-flex justify-content-between my-4">
            
            <?php if($current_page > 1):?>
                <a href="puzzles.php?page=<?=($current_page - 1)?>" class="btn btn-primary link">&laquo; Page précédente</a>
            <?php endif ?>
            <?php if($current_page < $pages):?>
                <a href="puzzles.php?page=<?=($current_page + 1)?>" class="btn btn-primary ml-auto link">Page suivante &raquo;</a>
            <?php endif ?>
        
        </div>

    </section>

    <?php require '../public/modal.php'?>
    <?php require '../public/footer.php'?>
    <script src="../../lib/jquery.js"></script>
    <script src="../../lib/bootstrap.min.js"></script>
    
    <script src="../../controllers/out/main.js"></script>

    <script src="../../models/class/js/Ajax.js"></script>
    <script src="../../models/class/js/Form.js"></script>
    <script src="../../models/class/js/Collapse.js"></script>
    <script src="../../models/class/js/Modal.js"></script>
    <script src="../../models/class/js/Card.js"></script>
    
    <script src="preview.js"></script>
    <script src="show_puzzles.js"></script>
    <script src="users.js"></script>



</body>
</html>