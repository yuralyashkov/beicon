<?php

use app\models\ImageSizes;

$galleryItems = [];
foreach ($gallery->items as $ITEM)
    $galleryItems[] = $ITEM;


$firstSize = 'gallery_only_main';
$secondSize = 'gallery_only_other';

if ($view_type == 'gallery-one-column' || $view_type == 'gallery-only-one-column') {
    $firstSize = 'gallery_one_main';
    $secondSize = 'gallery_one_other';
}

$firstSize = '16_9_1040';
$secondSize = '16_9_830';


?>
<div class="gallery-tile">
    <div class="custom-slider swiper-container swiper-container-horizontal swiper-container-free-mode">
        <ul class="e-ch-articles__list swiper-wrapper" style="">

            <? foreach ($galleryItems as $galleryItem) { ?>
                <li class="gallery-slider-item swiper-slide gallery-tile-prev__item" style="" data-gallery="<?=$gallery["id"]?>">
                    <img src="<?= UPLOAD_DIR . ImageSizes::getResizesName($galleryItem["url"], '16_9_734_nocrop', $gallery["id"]) ?>"
                         alt="">
                </li>
            <? } ?>
        </ul>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>

    <div class="gallery-fullscreen">
        <div class="gallery-fullscreen__wrapper">
            <div class="gallery-fullscreen__inner">
                <div class="swiper-container gallery-fullscreen__swiper">
                    <div class="swiper-wrapper gallery-fullscreen__content">
                        <? foreach ($gallery->items as $item) { ?>
                            <div class="swiper-slide">
                                <div class="gallery-fullscreen__image-container">
                                    <img src="/uploads/<?=$item["url"]?>" alt="">
                                </div>
                                <div class="right-aside">
                                    <p class="swiper-slide__description"><?=$item->content?></p>
                                    <div class="article__teaser_buy">
                                        <!--                                    <div class="image-container">-->
                                        <!--                                        <a href="#"><img src="/web/img/article-teaser-vert2.jpg" width="768" height="1200" alt=""></a>-->
                                        <!--                                    </div>-->

                                    </div>
                                </div>
                            </div>
                        <? } ?>

                    </div>
                    <!-- Ads Slides Counter -->
                    <div class="swiper-slide-count"><span class="swiper-slide__current"></span>/<span class="swiper-slide__total"></span></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button swiper-button-next"><svg class="inline-svg arrow-svg"><use xlink:href="#arrow"></use></svg></div>
                    <div class="swiper-button swiper-button-prev"><svg class="inline-svg arrow-svg"><use xlink:href="#arrow"></use></svg></div>
                </div>
            </div>
        </div>
        <div class="close-btn" role="button"><svg class="close-icon"><use xlink:href="#close"></use></svg></div>
    </div>
</div>


<style>
    .swiper-button-prev.swiper-button-disabled, .swiper-button-next.swiper-button-disabled {
        display: none;
    }

    .custom-slider .swiper-button-prev {
        background-image: url('/img/arrow.svg');
        transform: rotate(-180deg);
    }

    .swiper-button-next {
        background-image: url('/img/arrow.svg');
    }

    .swiper-button-prev, .swiper-button-next {
        opacity: 0.6;
    }

    .swiper-button-prev:hover, .swiper-button-next:hover {
        opacity: 1;
    }
</style>