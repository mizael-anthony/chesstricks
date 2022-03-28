
<?php
require '../../vendor/autoload.php';

use App\src\Form;
use App\CRUD\User;
use App\helpers\Loop;
?>

<?php
    $links = 
    [
        "index.php" => "Acceuil",
        "puzzles.php" => "S'entraîner",        
    ];
?>
<header>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a href="index.php" class="navbar-brand"><h2>ChessTricks</h2></a>
        
        <?php

            Loop::loopLink(
                $links,
                "nav",
                "nav-item",
                "nav-link"   
            )

        ?>

        <?php
        
            $form_search_bar = new Form(
                "../../controllers/commands/search.php",
                "get",
                "form_search_bar"
            );

            $form_search_bar->inputText(
                null,
                "search_article",
                null,
                "form-control mr-sm-2",
                "Rechercher.."
            );

            $form_search_bar->inputButton(
                "Rechercher",
                null,
                "btn btn-outline-secondary",
                null
            );
            
            $form_search_bar->showForm(
                null,
                "form-inline col-5"
            );

        ?>


        <ul class="nav navbar-nav">
            <?php if((User::isConnected())):?>
                <?php if($_SESSION["UserRole"] === "ADMIN"):?>
                    <li class="nav-item">
                        <a href="#" class="text-primary nav-link " data-toggle="modal" data-target="#form_modal_upload">
                        Publier
                        </a>            
                    </li>
                    <li class="nav-item">
                        <a href="../../controllers/commands/users.php" class="nav-link " id="subscribed_users">
                        Abonnées
                        </a>            
                    </li>
                <?php endif?>
                <li class="nav-item">
                    <a href="../../controllers/commands/logout.php" class="nav-link text-warning">
                    Se déconnecter
                    </a>
                </li>
            <?php else:?>
                <li class="nav-item">
                    <a href="#" class="text-success nav-link " data-toggle="modal" data-target="#form_modal_login">
                    Se connecter
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="text-danger nav-link " data-toggle="modal" data-target="#form_modal_subscribe">
                    S'inscrire
                    </a>
                </li>
            <?php endif?>

        </ul>



        
    </nav>
</header>








