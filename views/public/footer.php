
<?php

use App\helpers\Loop;

    $image_links = 
    [
        "http://www.lichess.org" => "<img src=../../img/footer/lichess.png class=rounded-circle width=50 >",
        "http://www.playchess.com" => "<img src=../../img/footer/chesscom.png class=rounded-circle width=50 >",
        "http://www.chesstempo.com" => "<img src=../../img/footer/chesstempo.png class=rounded-circle width=50 >",      
    ];

?>



<footer>
    <div class="container-fluid bg-dark">
    <h2 class="text-center text-white">Rejoignez-moi</h2>
    <nav class="navbar navbar-expand-sm justify-content-center">
        <?php
            Loop::loopLink(
                $image_links,
                "navbar-nav",
                "nav-item",
                "nav-link"
            );
            ?>
    </nav>
    <span class="invisible"><?=$_SESSION["UserRole"]?></span>

    </div>
</footer>