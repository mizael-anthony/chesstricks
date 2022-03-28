<?php
namespace App\src;

class Carousel
{
    public static function createCarousel(string $id, int $data_interval, array $images, int $width, int $height)
    {
      ?>

      <div class="jumbotron-fluid">
        <div id=<?=$id?> class="carousel slide" data-ride="carousel" data-interval=<?=$data_interval?>>
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target=<?='#' . $id?> data-slide-to="0" class="active"></li>
        <?php for($i = 1; $i < count($images); $i++):?>
          <li data-target=<?='#' . $id?> data-slide-to=<?=$i?>></li>
        <?php endfor?>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src=<?=$images[0]?> class="mx-auto d-block" width=<?=$width?> height=<?=$height?>>
          </div>
        <?php for($j = 1; $j < count($images); $j++):?>
          <div class="carousel-item">
            <img src=<?=$images[$j]?> class="mx-auto d-block" width=<?=$width?> height=<?=$height?>>
          </div>
        <?php endfor?>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href=<?='#'.$id?> data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href=<?='#'.$id?> data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
        </div>
      </div>

      <?php
    }
    
 
}