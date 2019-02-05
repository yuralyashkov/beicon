<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use app\models\ImageSizes;
$this->title = 'Be Icon';
$tmp = [];
foreach ($head_articles as $i)
    $tmp[] = $i;

$articles = $tmp;



$bg = ImageSizes::getResizesName($articles[0]->header_img, '16_9_1040');
$bg2 = ImageSizes::getResizesName($articles[0]->header_img, '9_16_352');
?>
<!-- End Subscribe aside -->
<!-- Start Top Article Section -->
<section class="top-articles">
    <!-- Background Image has to added as a style by script -->
    <div class="top-articles__bg" style="background-image: url('/uploads/<?=$bg?>')"></div>
    <div class="top-articles__bg top-articles__bg-mobile" style="background-image: url('/uploads/<?=$bg2?>')"></div>
    <div class="article-overlay"></div>
    <div class="top-articles__logo"><img src="/img/assets/logo.svg" width="303" height="103" alt="logo"></div>
    <div class="top-articles-wrapper">



        <?php if(isset($articles[0])){ ?><h2><a href="<?=Url::to(['articles/view', 'url' => $articles[0]->url, 'section' => $articles[0]->sectionData->url])?>"><?=$articles[0]->name?></a></h2><?php } ?>
        <ul class="top-articles__list bl-wrapper">
          <?php if(isset($articles[1])) { ?>
              <?php $article = $articles[1]; ?>
            <li class="top-article__item">
                <h3><a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>"><?=$article->name?></a></h3>
                <div class="article__teaser__info clearfix">
                    <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                    <?php if($article["views"] >= 5000) { ?> <div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                </div>
            </li>
            <?php } ?>
          <?php if(isset($articles[2])) { ?>
              <?php $article = $articles[2]; ?>
            <li class="top-article__item">
                <h3><a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>"><?=$article->name?></a></h3>
                <div class="article__teaser__info clearfix">
                    <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                    <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                </div>
            </li>
            <?php } ?>
          <?php if(isset($articles[3])) { ?>
              <?php $article = $articles[3]; ?>
            <li class="top-article__item">
                <h3><a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>"><?=$article->name?></a></h3>
                <div class="article__teaser__info clearfix">
                    <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                    <?php if($article["views"] >= 5000) { ?> <div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>
<!-- End Top Article Section -->


<!-- Start Articles Block Type 1 -->
<div class="articles-block articles-block_v1 bl-wrapper">
    <div class="articles__list col col_l">
        <?php if(isset($articles[4])) { $article = $articles[4];
        $img = ImageSizes::getResizesName($article->preview_img, '16_9_1040');
        ?>
        <article class="article__item article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>
                <img src="/uploads/<?=$img?>" alt="">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?> <div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[5])) { $article = $articles[5];
        $img = ImageSizes::getResizesName($article->preview_img, 'mini');
        ?>
        <article class="article__teaser_small el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article__teaser__image-container">
                    <div class="article-overlay"></div>
                    <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                <div class="article__teaser__wrapper">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?>   <div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[6])) { $article = $articles[6];
        $img = ImageSizes::getResizesName($article->preview_img, 'mini');
        ?>
        <article class="article__teaser_small el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article__teaser__image-container">
                    <div class="article-overlay"></div>
                    <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                <div class="article__teaser__wrapper">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?>  <div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[7])) { $article = $articles[7];
        $img = ImageSizes::getResizesName($article->preview_img, 'mini');
        ?>
        <article class="article__teaser_small el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article__teaser__image-container">
                    <div class="article-overlay"></div>
                    <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                <div class="article__teaser__wrapper">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?> <div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[8])) { $article = $articles[8];
        $img = ImageSizes::getResizesName($article->preview_img, 'mini');
        ?>
        <article class="article__teaser_small el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article__teaser__image-container">
                    <div class="article-overlay"></div>
                    <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                <div class="article__teaser__wrapper">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
    </div>
    <div class="articles__list col col_c">

        <?php if(isset($articles[9])) { $article = $articles[9];
            $img = ImageSizes::getResizesName($article->preview_img, 'mini');
            ?>
            <article class="article__teaser_small el-wrapper clearfix">
                <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                    <div class="article__teaser__image-container">
                        <div class="article-overlay"></div>
                        <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                    <div class="article__teaser__wrapper">
                        <h3><?=$article["name"]?></h3>
                        <div class="article__teaser__info">
                            <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                            <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                        </div>
                    </div>
                </a>
            </article>
        <?php } ?>
        <?php if(isset($articles[10])) { $article = $articles[10];
            $img = ImageSizes::getResizesName($article->preview_img, 'mini');
            ?>
            <article class="article__teaser_small el-wrapper clearfix">
                <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                    <div class="article__teaser__image-container">
                        <div class="article-overlay"></div>
                        <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                    <div class="article__teaser__wrapper">
                        <h3><?=$article["name"]?></h3>
                        <div class="article__teaser__info">
                            <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                            <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                        </div>
                    </div>
                </a>
            </article>
        <?php } ?>
        <?php if(isset($articles[11])) { $article = $articles[11];
        $img = ImageSizes::getResizesName($article->preview_img, '1_1_690');
        ?>
        <article class="article__item article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>

                <img src="/uploads/<?=$img?>"alt="" class="article-img-full">
                <img src="<?= UPLOAD_DIR.ImageSizes::getResizesName($article["preview_img"], '16_9_1040');?>"alt="" class="article-img-small">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
    </div>
    <div class="articles__list col col_r">
        <div class="banner-240-400">
            <a href="#" target="_blank"><div class="banner-240-400__inner" style="background-image: url('/basic/web/img/banner-240-400.jpg')"></div></a>
        </div>
        <?php if(isset($articles[12])) { $article = $articles[12];
            $img = ImageSizes::getResizesName($article->preview_img, 'mini');
            ?>
            <article class="article__teaser_small el-wrapper clearfix">
                <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                    <div class="article__teaser__image-container">
                        <div class="article-overlay"></div>
                        <img src="/uploads/<?=$img?>" width="80" height="80" alt=""></div>
                    <div class="article__teaser__wrapper">
                        <h3><?=$article["name"]?></h3>
                        <div class="article__teaser__info">
                            <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                            <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                        </div>
                    </div>
                </a>
            </article>
        <?php } ?>

    </div>
</div>
<!-- End Articles Block view 1 -->




<!-- Start Inline-Banner -->
<div class="inline-banner bl-wrapper">
    <div class="el-wrapper">
        <a href="#" target="_blank">
            <!-- Add background-image for banne and background-color for banner-wrapper -->
            <div class="inline-banner__inner" style="background-image: url('/basic/web/img/inline-banner.jpg'); background-color: #eeedf2"></div>
        </a>
    </div>
</div>
<!-- End Inline Banner -->

<div class="articles-block articles-block_v2 bl-wrapper">
    <div class="articles-block__col articles-block__col_l">
        <?php

        $n = 13;
        while ($n < 19) {
            if (isset($articles[$n])) {
                $article = $articles[$n];
                $img = ImageSizes::getResizesName($article->preview_img, 'mini');
                ?>
                <article class="article__teaser_small el-wrapper clearfix">
                    <a href="<?= Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url]) ?>">
                        <div class="article__teaser__image-container">
                            <div class="article-overlay"></div>
                            <img src="/uploads/<?= $img ?>" width="80" height="80" alt=""></div>
                        <div class="article__teaser__wrapper">
                            <h3><?= $article["name"] ?></h3>
                            <div class="article__teaser__info">
                                <div class="article__teaser__date"><?= date('d.m.Y', strtotime($article["date_publish"])) ?></div>
                                <?php if ($article["views"] >= 5000) { ?>
                                    <div class="article__teaser__views"><span
                                            class="views__num"><?= $article["views"] ?></span>
                                    <svg class="inline-svg views__icon">
                                        <use xlink:href="#visibility"></use>
                                    </svg></div><?php } ?>
                            </div>
                        </div>
                    </a>
                </article>
            <?php }
            $n++;
        }
        ?>


    </div>
    <div class="articles-block__col articles-block__col_r">
        <?php if(isset($articles[19])) { $article = $articles[19];
        $img = ImageSizes::getResizesName($article->preview_img, '1_1_690');
        ?>
        <article class="article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>
                <img src="/uploads/<?=$img?>"alt="" class="article-img-full">
                <img src="<?= UPLOAD_DIR.ImageSizes::getResizesName($article["preview_img"], '16_9_1040');?>"alt="" class="article-img-small">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[20])) { $article = $articles[20];
        $img = ImageSizes::getResizesName($article->preview_img, '1_1_690');
        ?>
        <article class="article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>
                <img src="/uploads/<?=$img?>"alt="" class="article-img-full">
                <img src="<?= UPLOAD_DIR.ImageSizes::getResizesName($article["preview_img"], '16_9_1040');?>"alt="" class="article-img-small">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>

    </div>
</div>

<!-- Start Articles Block Type 3 -->
<div class="articles-block articles-block_v3 bl-wrapper">
    <div class="articles-block__list">
        <?php if(isset($articles[21])) { $article = $articles[21];
        $img = ImageSizes::getResizesName($article->preview_img, '1_1_690');
        ?>
        <article class="article__item article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>
                <img src="/uploads/<?=$img?>"alt="" class="article-img-full">
                <img src="<?= UPLOAD_DIR.ImageSizes::getResizesName($article["preview_img"], '16_9_1040');?>"alt="" class="article-img-small">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[22])) { $article = $articles[22];
        $img = ImageSizes::getResizesName($article->preview_img, '1_1_690');
        ?>
        <article class="article__item article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>
                <img src="/uploads/<?=$img?>"alt="" class="article-img-full">
                <img src="<?= UPLOAD_DIR.ImageSizes::getResizesName($article["preview_img"], '16_9_1040');?>"alt="" class="article-img-small">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
        <?php if(isset($articles[23])) { $article = $articles[23];
        $img = ImageSizes::getResizesName($article->preview_img, '16_9_1040');
        ?>
        <article class="article__item article__teaser_vertical el-wrapper clearfix">
            <a href="<?=Url::to(['articles/view', 'url' => $article["url"], 'section' => $article->sectionData->url])?>">
                <div class="article-overlay"></div>
                <img src="/uploads/<?=$img?>"alt="" class="article-img-full">
                <img src="<?= UPLOAD_DIR.ImageSizes::getResizesName($article["preview_img"], '16_9_1040');?>"alt="" class="article-img-small">
                <div class="article-overlay_bottom">
                    <h3><?=$article["name"]?></h3>
                    <div class="article__teaser__info">
                        <div class="article__teaser__date"><?=date('d.m.Y', strtotime($article["date_publish"]))?></div>
                        <?php if($article["views"] >= 5000) { ?><div class="article__teaser__views"><span class="views__num"><?=$article["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><?php } ?>
                    </div>
                </div>
            </a>
        </article>
        <?php } ?>
    </div>
</div>
<!-- End Articles Block Type 3 -->

<section class="e-ch-articles-section">
    <h2>Выбор редакции</h2>
    <div class="recommend-slider swiper-container swiper-container-horizontal swiper-container-free-mode">
        <ul class="e-ch-articles__list swiper-wrapper" style="">

            <? foreach ($recomended as $recItem) { ?>
                <li class="article__item swiper-slide" style="">
                    <a href="<?=Url::to(['articles/view/', 'url' => $recItem["url"], 'section' => $recItem->sectionData->url])?>">
                        <div class="article__teaser_half">
                            <div class="image-container">
                                <? if($recItem["preview_img"] != '' || $recItem["header_img"] != ''){ ?>
                                    <img src="<?if(file_exists($_SERVER["DOCUMENT_ROOT"].UPLOAD_DIR.$recItem["header_img"])){
                                        echo UPLOAD_DIR.$recItem["header_img"];
                                    } elseif(file_exists($_SERVER["DOCUMENT_ROOT"].UPLOAD_DIR.$recItem["preview_img"])) echo UPLOAD_DIR.$recItem["preview_img"]; ?>"alt="">
                                <? } ?>
                            </div>



                            <div class="info-wrapper">
                                <h3><?=$recItem["name"]?></h3>
                                <div class="article__teaser__info clearfix">
                                    <div class="article__teaser__date"><? if($recItem["date_publish"] != '0000-00-00 00:00:00') { ?><?=date('d.m.Y', strtotime($recItem["date_publish"]))?><? } ?></div>
                                    <? if($recItem["views"] >= 5000) { ?> <div class="article__teaser__views"><span class="views__num"><?=$recItem["views"]?></span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div><? } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            <? } ?>
        </ul>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</section>

<!-- Start Subscribe aside -->
<aside class="subscribe-block bl-wrapper">
    <div class="el-wrapper">
        <div class="subscribe-block__wrapper">
            <div class="subscribe-block__col subscribe-block__col_l">
                <h2>Не пропусти самые вкусные новости</h2>
                <span class="subscribe-block__description">С нашей рассылкой не пропустишь</span>
                <form name="subscribeForm" id="subscribeForm" action="#" method="post">
                    <div class="input-in-line">
                        <input type="email" id="userEmailSubscribe" class="" name="userEmailSubscribe" value="" placeholder="E-mail">
                        <button type="submit" class="btn" name="subscribeBtn">Подписаться</button>
                    </div>
                </form>
            </div>
            <div class="subscribe-block__col subscribe-block__col_r">
                <div class="subscribe-block__bg"></div>
            </div>
        </div>
    </div>
</aside>
<!-- End Subscribe aside -->

<script>
    $(document).ready(function() {
        initSimpleSlider('.simple-slider', 16, 16, 16, 8, 8);

        //Show Info Popup
        // $('#needJS').fadeIn(300);
        // $('.overlay-bg_ind').fadeIn(300);

        //Hide Info Popup
        $('#needJS').find('.close-btn').click(function () {
            $('#needJS').fadeOut(300);
            $('.overlay-bg_ind').fadeOut(300);
        });

        //Show Cookies popup
        // $('.cookie-block').addClass('show');
        $('#cookies-agree').click(function () {
            $('.cookie-block').removeClass('show');
        });
    })

</script>