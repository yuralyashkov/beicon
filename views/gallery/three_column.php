<?php
use app\models\ImageSizes;
$galleryItems = [];
foreach ($gallery->items as $ITEM)
    $galleryItems[] = $ITEM;

$size1 = '9_16_352';
$size2 = '9_16_352_2';
$size3 = '1_1_352';


// СОБЫТИЯ
if($article["section"] == 5){

    $size1 = '9_16_352_exact';
    $size2 = '9_16_352_2_exact';
    $size3 = '1_1_352_exact';


}



$article->name = str_replace('"', '', $article->name);
?>

<div class="gallery-mosaic">

    <!-- Start Gallery Mosaic List -->
    <div class="gallery-mosaic__list">
        <div class="gallery-mosaic__col-width"></div>
        <div class="gallery-mosaic__space-items"></div>


        <?php
        $n = 1;
        foreach ($galleryItems as $item){
        ?>
        <div class="gallery-mosaic__item"  data-gallery="<?=$gallery["id"]?>">

            <? if ($n == 1) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size1)?>" alt="<?=$article->name?>" width="352" height="536">
            <? } ?>
            <? if ($n == 2) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size2)?>" alt="<?=$article->name?>" width="352" height="256">
            <? } ?>
            <? if ($n == 3) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size1)?>" alt="<?=$article->name?>" width="352" height="536">
            <? } ?>
            <? if ($n == 4) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size3)?>" alt="<?=$article->name?>" width="352" height="550">
            <? } ?>
            <? if ($n == 5) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size1)?>" alt="<?=$article->name?>" width="352" height="536">
            <? } ?>
            <? if ($n == 6) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size1)?>" alt="<?=$article->name?>" width="352" height="536">
            <? } ?>
            <? if ($n == 7) { ?>
                <img src="<?=UPLOAD_DIR.ImageSizes::getResizesName($item["url"], $size2)?>" alt="<?=$article->name?>" width="352" height="256">
            <? } ?>
        </div>
        <? $n++; if($n == 8) $n = 1; } ?>
    </div>
    <!-- End Gallery Mosaic List -->


    <!-- Start Gallery Mosaic Fullscreen view -->
    <div class="gallery-fullscreen gallery-mosaic-fullscreen">
        <div class="gallery-fullscreen__wrapper">
            <div class="gallery-fullscreen__inner">
                <div class="swiper-container gallery-fullscreen__swiper">
                    <div class="swiper-wrapper gallery-fullscreen__content">
                        <? foreach ($galleryItems as $item) { ?>
                        <div class="swiper-slide">
                            <div class="gallery-fullscreen__image-container">
                                <img src="<?=UPLOAD_DIR.$item["url"]?>" alt="<?=$article->name?>">
                            </div>
                        </div>
                        <? } ?>

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button swiper-button-next"><svg class="inline-svg arrow-svg"><use xlink:href="#arrow"></use></svg></div>
                    <div class="swiper-button swiper-button-prev"><svg class="inline-svg arrow-svg"><use xlink:href="#arrow"></use></svg></div>
                </div>
            </div>
        </div>
        <div class="close-btn" role="button"><svg class="close-icon"><use xlink:href="#close"></use></svg></div>
    </div>

</div>

<script>
    $(function () {
        initGalleryMosaic();
    });
</script>