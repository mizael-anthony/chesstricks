<?php session_start()?>
<?php require '../../models/database/db-config.php'?>

<?php

require '../../vendor/autoload.php';

use App\src\Form;
use App\CRUD\User;
use App\src\Media;
use App\CRUD\Article;
use App\CRUD\Comment;

?>



<?php

    $hidden = User::isConnected() ? null:"invisible";


    $article = new Article($Connection()); 
    $comment = new Comment($Connection());

    
    $article_to_see = $article->getOneArticle($_GET["seemore_button"]); 
    $article_comments = $comment->retrieveComment($_GET["seemore_button"]);
    $comment_counts = $comment->countComment($_GET["seemore_button"]);
?>
<?php
    $title = $article_to_see["ArticleName"];
    require '../../views/public/title.php';
?>

<?php

    $form_comment = new Form(
        "comment.php",
        "post",
        "form_comment"
    );

    $form_comment->inputTextarea(
        null,
        "comment_article",
        "form-group",
        "form-control",
        null,
        5,
        "Votre commentaire.."
    );

    $form_comment->inputButton(
        "Commenter",
        "comment_button",
        "btn btn-success",
        $article_to_see["ArticleID"]
    );

?>

<section>
    <div class="row">

        <div class="col-5 container">
        <h2 class="font-weight-border"><?= $article_to_see["ArticleName"]?></h2>
            <p class="text-muted"><?= $article_to_see["ArticleDate"]?></p>
            <img src=<?=$article_to_see["ArticleImage"]?> class="mx-auto d-block img-thumbnail" width=50%>
            <p class="text-break"><?=$article_to_see["ArticleDescription"]?></p>
            <?php
                $form_comment->showForm(null,"form-group $hidden");
            ?>
            <a href="../../views/app/index.php">&laquo;page d'acceuil</a>
        </div>

        <div class="col-4 container">
            <h2 class="font-weight-border">
                <span class="badge badge-pill badge-dark"><?=$comment_counts?></span>
                Commentaires
            </h2>

            <?php for($i = 0; $i < count($article_comments); $i++):?>
                <?php
                    Media::createMedia(
                        $article_comments[$i]["UserProfile"],
                        $article_comments[$i]["UserName"],
                        $article_comments[$i]["CommentDate"],
                        $article_comments[$i]["CommentText"]
                    )
                ?>
            <?php endfor?>
        </div>
    </div>
</section>

<script src="../../models/class/js/Ajax.js"></script>
<script src="../../models/class/js/Media.js"></script>
<script src="../../views/app/comment.js"></script>



