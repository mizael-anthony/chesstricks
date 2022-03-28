<?php
namespace App\helpers;

class Loop
{
    public static function loopLink(array $links, string $class_ul, string $class_li, string $class_a)
    {?>
        <ul class=<?=$class_ul?>>
        <?php foreach($links as $href => $link):?>
            <li class=<?=$class_li?>>
                <a href=<?=$href?> class=<?=$class_a?>><?=$link?></a>
            </li>
        <?php endforeach ?>
        </ul>
    <?php
    }
    
    
}