<?php


namespace App\src;


class Media
{

    public static function createMedia(string $image, string $name, string $date, string $text)
    {?>

        <div class="media">
            <img src=<?=$image?> class="mr-3 mt-3 rounded-circle" width=100>
            <div class="media-body">
                <h4><?=$name?> <small class="text-muted"> <?=$date?></small></h4>
                <p><?=$text?></p>
            </div>
        </div>

    <?php
    }






}