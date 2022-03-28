<?php
require '../../vendor/autoload.php';

use App\src\Form;
use App\src\Modal;

?>

<?php

    $form_login = new Form(
        "../../controllers/commands/login.php",
        "post",
        "form_login"
    );

    $form_login->inputText(
        "Nom de l'utilisateur:",
        "login_name",
        "form-group",
        "form-control",
        "Nom de l'utilisateur"
    );

    $form_login->inputPassword(
        "Mot de passe:",
        "login_password",
        "form-group",
        "form-control",
        "Mot de passe"
    );

    $form_login->inputButton(
        "Se connecter",
        "button_login",
        "btn btn-outline-success btn-lg"
    );

    $form_modal_login = new Modal("form_modal_login");
    $form_modal_login->createModalForm(
        "bg-success",
        "Connexion",
        $form_login
    );
    
?>

<?php

    $form_subscribe = new Form(
        "../../controllers/commands/subscribe.php",
        "post",
        "form_subscribe"
    );

    $form_subscribe->inputFile(
        "Photo de profile",
        "user_profile",
        "custom-file mb-3",
        "custom-file-label",
        "custom-file-input",
        "image/png,image/ico"
    );

    $form_subscribe->inputText(
        "Nom d'utilisateur:",
        "user_name",
        "form-group",
        "form-control",
        "votre nom d'utilisateur"
    );

    $form_subscribe->inputPassword(
        "Mot de passe:",
        "user_password",
        "form-group",
        "form-control",
        "votre mot de passe"
    
    );

    $form_subscribe->inputEmail(
        "Votre adresse e-mail:",
        "user_email",
        "form-group",
        "form-control",
        "exemple@gmail.com"
    );

    $form_subscribe->inputButton(
        "S'inscrire",
        "button_subscribe",
        "btn btn-outline-danger btn-lg"
    );

    $form_modal_subscribe = new Modal("form_modal_subscribe");
    $form_modal_subscribe->createModalForm(
        "bg-danger",
        "Inscription",
        $form_subscribe
    );

?>

<?php

    $form_upload = new Form(
        "../../controllers/commands/upload.php",
        "post",
        "form_upload"
    );

    $form_upload->inputFile(
        "Ajouter une image..",
        "article_image",
        "custom-file mb-3",
        "custom-file-label",
        "custom-file-input",
        "image/png"
    );

    $form_upload->inputSelect(
        "Choisir une catégorie",
        "article_categorie",
        null,
        "custom-select",
        ["blog","puzzle"]
    );

    $form_upload->inputText(
        "Nom:",
        "article_name",
        "form-group",
        "form-control",
        "Nom de l'article"
    
    );

    $form_upload->inputTextarea(
        "Description:",
        "article_description",
        "form-group",
        "form-control",
        null,
        5,
        "Description de l'article.."
    );

    $form_upload->inputButton(
        "Publier",
        "button_upload",
        "btn btn-outline-primary btn-lg"
    );

    $form_modal_upload = new Modal("form_modal_upload");
    $form_modal_upload->createModalForm(
        "bg-primary",
        "Article",
        $form_upload
    );

?>

