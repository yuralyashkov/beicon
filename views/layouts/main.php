<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Sections;
use app\models\Pages;
use app\models\Mnu;
use yii\helpers\Url;
use app\models\Socials;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/img/assets/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/basic/web/img/assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans%7CMontserrat:200,400,500,700%7CSource+Sans+Pro%7CSpectral:400,500&amp;subset=cyrillic-ext" rel="stylesheet">
    <!-- Jquery from Yandex CDN -->
    <script src="https://yastatic.net/jquery/3.1.1/jquery.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script src="/basic/web/packages/mosaic/masonry.pkgd.min.js"></script>
    <script src="/basic/web/packages/mosaic/imagesloaded.pkgd.min.js"></script>
    <script src="/basic/web/packages/swiper/js/swiper.js"></script>
    <script src="/basic/web/js/script.js"></script>




</head>
<body class="page-bg page-branding_l <? if(isset($this->context->body_id)) echo $this->context->body_id; ?>" id="" style="background-image: url('/basic/web/img/banners/branding-l.jpg'); background-color: #ba1a1d">
<?php $this->beginBody() ?>


<!-- Start Search Popup -->
<div class="popup" id="searchPopup">
    <!-- Start Search form -->
    <form name="search" id="searchFormMenu" action="#" method="get" class="search-form">
        <div class="fields-wrapper">
            <input type="text" id="searchRequestMenu" name="searchRequest" placeholder="Поиск" value="">
            <button type="submit" id="searchRequestSubmitMenu" name="searchRequestSubmit"><svg class="inline-svg search-icon-dark"><use xlink:href="#searchDark"></use></svg></button>
        </div>
    </form>
    <!-- End Search form -->
</div>
<!-- End Search Popup -->

<!-- Start Left Menu Block -->
<div class="menu-block" id="menuBlock">
    <div class="menu-block__wrapper">
        <div class="menu-block__line menu-block__line_1 clearfix">
            <div class="menu-block__logo col_r">
                <a href="/"><img class="logo-img" src="/img/assets/logo.svg" width="303" height="103" alt="Be-icon logo"></a>
            </div>
            <ul class="menu-block__menu-list col_l">
                <?php

                $sections = Sections::find()->where(['hidden' => 0])->orderBy('sort')->all();

                foreach ($sections as $section) {
                ?>
                <li class="menu-block__menu-item"><a href="<?=Url::to(['sections/view/', 'url' => $section["url"]])?>"><?=$section["name"]?></a></li>
            <? } ?>
            </ul>
        </div>
        <div class="menu-block__lines-wrapper clearfix">
            <div class="menu-block__line  menu-block__line-2">
                <div class="menu-block__account col_l">
                    <ul class="line__item account-wrapper">
                        <li class="account__login">
                            <!--<button class="account__btn login__btn to-login"><i class="account__login-icon"></i>Войти</button>-->
                            <button class="account__btn login__btn to-login"><svg class="inline-svg account-svg"><use xlink:href="#account"></use></svg>Войти</button>
                        </li>
                        <li class="account__sign-up">
                            <button class="account__btn sign-up__btn to-reg">Регистрация</button>
                        </li>
                    </ul>
                </div>
                <div class="social-block col_r">
                    <div class="social-login__list">
                        <?
                        $socials = Socials::find()->orderBy(['sort' => SORT_ASC])->all();

                        foreach ($socials as $social) {
                            if($social["href"] == '#' || !$social["href"]) continue;
                        ?>
                        <a class="social-login__item" href="<?=$social["href"]?>" target="_blank"><svg class="inline-svg social-svg"><use xlink:href="#<?=$social["name"]?>"></use></svg></a>
                        <? } ?>
                    </div>
                </div>
            </div>
            <footer class="menu-block__line  menu-block__line-3">
                <div class="footer__copyright col_l">
                    <p>Все права защищены</p>
                    <p>Для лиц старше 18 лет</p>
                </div>
                <div class="footer__coop col_r">
                    <ul class="footer-links__list">
                        <?php

                        $list = Mnu::find()->where(['hidden' => 0])->all();

                        foreach ($list as $item) { ?>

                        <li class="footer-links__item"><a href="<?=Url::to(['p/view', 'url' => $item["url"]])?>"><?=$item->name?></a></li>
                        <? } ?>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</div>
<!-- End Left Menu Block -->


<!-- Start Nav bar -->
<nav class="nav-bar">
    <div class="nav-wrapper">
        <ul class="nav-btn-list">
            <!-- Add 'active' class to 'nav-btn-item' class if the item is active -->
            <li class="nav-btn-item" id="burgerIcon">
                <div class="nav-icon burger-icon" role="button">
                    <div class="burger-icon__line burger-icon__line-1"></div>
                    <div class="burger-icon__line burger-icon__line-2"></div>
                    <div class="burger-icon__line burger-icon__line-3"></div>
                </div>
            </li>
            <li class="nav-btn-item disable" id="shopIcon"><svg class="nav-icon shop-icon"><use xlink:href="#shopping"></use></svg>
<!--                <span id="goodsCount">4</span>-->
            </li>
            <li class="nav-btn-item disable" id="favoriteIcon"><svg class="nav-icon favorite-icon"><use xlink:href="#favorites"></use></svg></li>
            <li class="nav-btn-item" id="searchIcon"><svg class="nav-icon search-icon"><use xlink:href="#search"></use></svg></li>
        </ul>
    </div>
    <div class="logo-wrapper">
        <a href="/"><img class="logo-img" src="/img/assets/logo.svg" width="118" height="40" alt="Be-icon logo"></a>
    </div>
</nav>
<!-- End Nav Bar -->


<!-- Start Shopping and Favorites Slide Page -->
<div class="slide-page" id="slidePage">

    <!-- Start Shopping and Favorites Menu -->
    <div class="slide-page__header">
        <div class="slide-page-menu sp-content-wrapper">
            <div class="slide-page-menu__item" id="tab1" role="button">Корзина</div>
            <div class="slide-page-menu__item" id="tab2" role="button">Нравится</div>
        </div>
        <button class="close-btn"><svg class="close-icon"><use xlink:href="#close"></use></svg></button>
    </div>
    <!-- End Shopping and Favorites Menu -->

    <!-- Start Shopping Body-->
    <div class="slide-page__body shopping-body" id="content1">
        <div class="goods-wrapper">
            <ul class="goods__list sp-content-wrapper">
                <li class="goods__item shopping-good">
                    <div class="goods__item__image-container"><img src="/img/good1.jpg" width="80" height="80" alt=""></div>
                    <div class="goods__item__info-wrapper">
                        <div class="goods__item__info-item">
                            <h3>Oscar de la Renta, весна-лето 2018</h3>
                            <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                        </div>
                        <div class="good__item__count-wrapper">
                            <div class="goods__item__price">12 999&#8381;</div>
                            <div class="goods__item__quantity">
                                <div class="goods__item__btn" role="button"><i class="reduce-btn"></i></div>
                                <div class="goods__item__amount">3</div>
                                <div class="goods__item__btn" role="button"><i class="increase-btn"></i></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="goods__item shopping-good">
                    <div class="goods__item__image-container"><img src="/img/good1.jpg" width="80" height="80" alt=""></div>
                    <div class="goods__item__info-wrapper">
                        <div class="goods__item__info-item">
                            <h3>Oscar de la Renta, весна-лето 2018</h3>
                            <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                        </div>
                        <div class="good__item__count-wrapper">
                            <div class="goods__item__price">12 999&#8381;</div>
                            <div class="goods__item__quantity">
                                <div class="goods__item__btn" role="button"><i class="reduce-btn"></i></div>
                                <div class="goods__item__amount">3</div>
                                <div class="goods__item__btn" role="button"><i class="increase-btn"></i></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="goods__item shopping-good">
                    <div class="goods__item__image-container"><img src="/img/good1.jpg" width="80" height="80" alt=""></div>
                    <div class="goods__item__info-wrapper">
                        <div class="goods__item__info-item">
                            <h3>Oscar de la Renta, весна-лето 2018</h3>
                            <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                        </div>
                        <div class="good__item__count-wrapper">
                            <div class="goods__item__price">12 999&#8381;</div>
                            <div class="goods__item__quantity">
                                <div class="goods__item__btn" role="button"><i class="reduce-btn"></i></div>
                                <div class="goods__item__amount">3</div>
                                <div class="goods__item__btn" role="button"><i class="increase-btn"></i></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="goods__item shopping-good">
                    <div class="goods__item__image-container"><img src="/img/good1.jpg" width="80" height="80" alt=""></div>
                    <div class="goods__item__info-wrapper">
                        <div class="goods__item__info-item">
                            <h3>Oscar de la Renta, весна-лето 2018</h3>
                            <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                        </div>
                        <div class="good__item__count-wrapper">
                            <div class="goods__item__price">12 999&#8381;</div>
                            <div class="goods__item__quantity">
                                <div class="goods__item__btn" role="button"><i class="reduce-btn"></i></div>
                                <div class="goods__item__amount">3</div>
                                <div class="goods__item__btn" role="button"><i class="increase-btn"></i></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
        <div class="shopping-footer">
            <form name="shoppingFirstStep" action="/order.html" method="post" id="shoppingFirstStep" class="sp-content-wrapper">
                <input type="email" name="user-email" id="userEmail" value="" placeholder="E-mail">
                <div class="total-order-wrapper">
                    <div class="total">
                        <div class="total__text">Итого</div>
                        <div class="total__sum">65 999&#8381;</div>
                    </div>
                    <div class="btn-container">
                        <button class="btn" type="submit">Оформить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Shopping Body-->

    <!-- Start Favorites Body-->
    <div class="slide-page__body favorites-body sp-content-wrapper" id="content2">

        <div class="favorites" id="content">
            <!-- Start Favorites Submenu -->
            <div class="submenu">
                <ul class="submenu__list">
                    <li class="submenu__item active" id="subTab1">Товары</li>
                    <li class="submenu__item" id="subTab2">Статьи</li>
                </ul>
            </div>
            <!-- End Favorites Submenu -->

            <!-- Start Favorites Goods -->
            <div class="favorites__content favorites__goods" id="favContent1">
                <ul class="goods__list">
                    <li class="goods__item shopping-good clearfix">
                        <div class="goods__item__image-container"><img src="/basic/web/img/good1.jpg" width="80" height="80" alt=""></div>
                        <div class="goods__item__info-wrapper">
                            <div class="goods__item__info-item">
                                <h3>Oscar de la Renta, весна-лето 2018</h3>
                                <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                            </div>
                            <div class="good__item__count-wrapper">
                                <div class="goods__item__price">12 999&#8381;</div>
                                <div class="buy">
                                    <button class="btn_small">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="goods__item shopping-good clearfix">
                        <div class="goods__item__image-container"><img src="/basic/web/img/good1.jpg" width="80" height="80" alt=""></div>
                        <div class="goods__item__info-wrapper">
                            <div class="goods__item__info-item">
                                <h3>Oscar de la Renta, весна-лето 2018</h3>
                                <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                            </div>
                            <div class="good__item__count-wrapper">
                                <div class="goods__item__price">12 999&#8381;</div>
                                <div class="buy">
                                    <button class="btn_small">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="goods__item shopping-good clearfix">
                        <div class="goods__item__image-container"><img src="/basic/web/img/good1.jpg" width="80" height="80" alt=""></div>
                        <div class="goods__item__info-wrapper">
                            <div class="goods__item__info-item">
                                <h3>Oscar de la Renta, весна-лето 2018</h3>
                                <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                            </div>
                            <div class="good__item__count-wrapper">
                                <div class="goods__item__price">12 999&#8381;</div>
                                <div class="buy">
                                    <button class="btn_small">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="goods__item shopping-good clearfix">
                        <div class="goods__item__image-container"><img src="/basic/web/img/good1.jpg" width="80" height="80" alt=""></div>
                        <div class="goods__item__info-wrapper">
                            <div class="goods__item__info-item">
                                <h3>Oscar de la Renta, весна-лето 2018</h3>
                                <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                            </div>
                            <div class="good__item__count-wrapper">
                                <div class="goods__item__price">12 999&#8381;</div>
                                <div class="buy">
                                    <button class="btn_small">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="goods__item shopping-good clearfix">
                        <div class="goods__item__image-container"><img src="/basic/web/img/good1.jpg" width="80" height="80" alt=""></div>
                        <div class="goods__item__info-wrapper">
                            <div class="goods__item__info-item">
                                <h3>Oscar de la Renta, весна-лето 2018</h3>
                                <a class="goods__item__link" href="#" target="_blank">www.net-a-porter.com</a>
                            </div>
                            <div class="good__item__count-wrapper">
                                <div class="goods__item__price">12 999&#8381;</div>
                                <div class="buy">
                                    <button class="btn_small">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Favorites Goods -->

            <!-- Start Favorites Articles -->
            <div class="favorites__content articles__list_simple" id="favContent2">
                <article class="article__item clearfix">
                    <div class="article__teaser__image-container"><img src="/basic/web/img/article-prew.jpg" width="160" height="90" alt=""></div>
                    <div class="article__teaser__wrapper">
                        <h3><a href="#">5 ювелирных брендов, которые могут стать в будущем легендарными</a></h3>
                        <div class="tags">
                            <ul class="tags__list">
                                <li class="tags__item"><a href="#">Мода</a></li>
                                <li class="tags__item"><a href="#">Красота</a></li>
                            </ul>
                        </div>
                        <div class="article__teaser__info">
                            <div class="article__teaser__date">Сегодня</div>
                            <div class="article__teaser__views"><span class="views__num">234</span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div>
                        </div>
                    </div>
                </article>
                <article class="article__item clearfix">
                    <div class="article__teaser__image-container"><img src="/basic/web/img/article-prew.jpg" width="160" height="90" alt=""></div>
                    <div class="article__teaser__wrapper">
                        <h3><a href="#">5 ювелирных брендов, которые могут стать в будущем легендарными</a></h3>
                        <div class="tags">
                            <ul class="tags__list">
                                <li class="tags__item"><a href="#">Мода</a></li>
                                <li class="tags__item"><a href="#">Красота</a></li>
                            </ul>
                        </div>
                        <div class="article__teaser__info">
                            <div class="article__teaser__date">Сегодня</div>
                            <div class="article__teaser__views"><span class="views__num">234</span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div>
                        </div>
                    </div>
                </article>
                <article class="article__item clearfix">
                    <div class="article__teaser__image-container"><img src="/basic/web/img/article-prew.jpg" width="160" height="90" alt=""></div>
                    <div class="article__teaser__wrapper">
                        <h3><a href="#">5 ювелирных брендов, которые могут стать в будущем легендарными</a></h3>
                        <div class="tags">
                            <ul class="tags__list">
                                <li class="tags__item"><a href="#">Мода</a></li>
                                <li class="tags__item"><a href="#">Красота</a></li>
                            </ul>
                        </div>
                        <div class="article__teaser__info">
                            <div class="article__teaser__date">Сегодня</div>
                            <div class="article__teaser__views"><span class="views__num">234</span><svg class="inline-svg views__icon"><use xlink:href="#visibility"></use></svg></div>
                        </div>
                    </div>
                </article>
            </div>
            <!-- End Favorites articles -->
        </div>
    </div>
    <!-- End Favorites Body-->
</div>
<!-- End Shopping and Favorites Slide Page -->



<!-- Start backgrounds overlays -->
<div class="overlay-bg overlay-bg_dark"></div>
<div class="overlay-bg overlay-bg_transparent"></div>
<div class="overlay-bg overlay-bg_ind"></div>
<!-- End backgrounds overlays -->


<!-- Start Sign in and Sign up Popup -->
<div class="popup" id="signPopup">
    <!-- Start Sign Popup Header -->
    <div class="slide-page__header">
        <div class="slide-page-menu sp-content-wrapper">
            <div class="slide-page-menu__item to-login active" id="signInTab" role="button">Вход</div>
            <div class="slide-page-menu__item to-reg" id="signUpTab" role="button">Регистрация</div>
        </div>
        <button class="close-btn"><svg class="close-icon"><use xlink:href="#close"></use></svg></button>
    </div>
    <!-- End Sign Popup Header -->

    <!-- Start Sign In Body -->
    <div class="sp-content-wrapper slide-page__body" id="signInContent">
        <form name="signIn" action="#" method="post" id="signInForm">
            <div class="fields-wrapper form-el form-el_1">
                <label for="userEmailAuth">E-mail</label>
                <input type="email" name="userEmail" id="userEmailAuth" value="">
            </div>

            <div class="fields-wrapper form-el form-el_2">
                <label for="userPwd">Пароль</label>
                <input type="password" name="userPwd" id="userPwd" value="">
            </div>

            <div class="form-el form-el_3">
                <button type="submit" class="btn">Войти</button>
            </div>
        </form>

        <div class="no-enter">
            <div class="not-reg"><button class="reg__btn to-reg">Я еще не зарегистрирован</button></div>
            <div class="fgt-pass"><button class="fgt-pass__btn">Я забыл пароль</button></div>
        </div>
    </div>
    <!-- End Sign In Body -->

    <!-- Start Sign Up Body -->
    <div class="sp-content-wrapper slide-page__body" id="signUpContent">
        <form name="signUp" action="#" method="post" id="signUpForm">
            <label for="userEmailReg">E-mail</label>
            <input type="email" name="userEmailReg" id="userEmailReg" value="">
            <button type="submit" class="btn" id="reg-submit-btn">Зарегистрироваться</button>
        </form>

        <div class="no-enter">
            <div class="not-reg"><button class="sign-in__btn to-login">У меня уже есть аккаунт</button></div>
        </div>
    </div>
    <!-- End Sign Up Body -->

    <!-- Start Registration Success Message Body-->
    <div class="content-wrapper" id="regMsgSuccess">
        <div class="reg-msg">
            <i class="reg-msg-icon success-icon"></i>
            <div class="successRegMsg">На Вашу почту отправлено письмо с подтверждением регистрации и паролем</div>
        </div>
    </div>
    <!-- End Registration Success Message Body -->

    <!-- Start Social Login -->
    <div class="social-login sp-content-wrapper">
        <div class="social-sign__label">Войти через соцсети</div>
        <div class="social-block">
            <div class="social-login__list">
                <button class="social-login__item"><svg class="inline-svg social-svg"><use xlink:href="#fb"></use></svg></button>
                <button class="social-login__item"><svg class="inline-svg social-svg"><use xlink:href="#insta"></use></svg></button>
                <button class="social-login__item"><svg class="inline-svg social-svg"><use xlink:href="#vk"></use></svg></button>
                <button class="social-login__item"><svg class="inline-svg social-svg"><use xlink:href="#twitter"></use></svg></button>
                <button class="social-login__item"><svg class="inline-svg social-svg"><use xlink:href="#ok"></use></svg></button>
            </div>
        </div>
    </div>
    <!-- End Social Login -->
</div>
<!-- End Sign in and Sign up Popup -->


<?php
if($this->context->id == 'sections' || $this->context->id == 'articles'){

    if(!isset($this->context->hide_header)){
    ?>
    <header class="page-header underline page-wrapper">
        <div class="menu-block__wrapper">
            <div class="menu-block__line menu-block__line_1 clearfix">
                <div class="menu-block__logo col_r">
                    <a href="/"><img class="logo-img" src="/img/assets/logo.svg" width="303" height="103" alt="Be-icon logo"></a>
                </div>
                <ul class="menu-block__menu-list col_l">
                    <?php

                    $sections = Sections::find()->where(['hidden' => 0])->orderBy('sort')->all();

                    foreach ($sections as $section) {
                        if(isset($section["url"])){
                        ?>
                        <li class="menu-block__menu-item <? if(isset($_GET["url"]) && $_GET["url"] == $section["url"]) echo 'active'; ?>"><a href="<?=Url::to(['sections/view/', 'url' => $section["url"]])?>"><?=$section["name"]?></a></li>
                    <? } } ?>
                </ul>
            </div>
        </div>
    </header>
<? } } ?>


<!-- Start Main Content -->
<main class="main-content page-wrapper <? if(isset($this->context->contentClass)) echo $this->context->contentClass;?>">

        <?= $content ?>

</main>






<!-- Start SVG Sprite -->
<svg style="display: none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <symbol id="account" viewBox="0 0 34 34">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-107.000000, -195.000000)">
                <rect x="0" y="0" width="1280" height="720"></rect>
                <g transform="translate(104.000000, 192.000000)">
                    <polygon points="0 0 40 0 40 40 0 40"></polygon>
                    <path d="M20,3.33333333 C10.8,3.33333333 3.33333333,10.8 3.33333333,20 C3.33333333,29.2 10.8,36.6666667 20,36.6666667 C29.2,36.6666667 36.6666667,29.2 36.6666667,20 C36.6666667,10.8 29.2,3.33333333 20,3.33333333 L20,3.33333333 Z M20,8.33333333 C22.7666667,8.33333333 25,10.5666667 25,13.3333333 C25,16.1 22.7666667,18.3333333 20,18.3333333 C17.2333333,18.3333333 15,16.1 15,13.3333333 C15,10.5666667 17.2333333,8.33333333 20,8.33333333 L20,8.33333333 Z M20,32 C15.8333333,32 12.15,29.8666667 10,26.6333333 C10.05,23.3166667 16.6666667,21.5 20,21.5 C23.3166667,21.5 29.95,23.3166667 30,26.6333333 C27.85,29.8666667 24.1666667,32 20,32 L20,32 Z" fill="#788089"></path>
                </g>
            </g>
        </g>
    </symbol>
    <symbol id="fb" viewBox="0 0 40 40">
        <path d="M25.1879131,19.5947931 L22.0392821,19.5947931 L22.0392821,30.2307692 L17.2688387,30.2307692 L17.2688387,19.5947931 L15,19.5947931 L15,15.8569897 L17.2688387,15.8569897 L17.2688387,13.4382064 C17.2688387,11.7085153 18.1596402,9 22.0817462,9 L25.6153846,9.01363103 L25.6153846,12.641806 L23.0514993,12.641806 C22.6306334,12.641806 22.0392821,12.8358307 22.0392821,13.6606533 L22.0392821,15.86047 L25.6043754,15.86047 L25.1879131,19.5947931 Z"></path>
    </symbol>
    <symbol id="insta" viewBox="0 0 40 40">
        <path d="M15.0529527,8.07272974 C13.775238,8.13094615 12.9027716,8.33348055 12.1400567,8.63010702 C11.3509231,8.93635468 10.6819779,9.34729404 10.0143373,10.0142551 C9.34734897,10.6812162 8.93622978,11.3499711 8.62996963,12.1398879 C8.33333107,12.9028979 8.13078841,13.7751656 8.07256963,15.0526652 C8.01353546,16.3321216 8,16.7412672 8,20.0000815 C8,23.2588959 8.01353546,23.6678784 8.07256963,24.9473348 C8.13078841,26.2249975 8.33333107,27.0974282 8.62996963,27.8601121 C8.93622978,28.6492135 9.3463705,29.3189468 10.0143373,29.9859079 C10.6809994,30.652706 11.3499446,31.0626669 12.1400567,31.3700561 C12.9037501,31.6666825 13.775238,31.8692169 15.0529527,31.9274333 C16.3334398,31.9854867 16.7414605,32 20.0004077,32 C23.2603334,32 23.6683541,31.9864651 24.9480257,31.9274333 C26.2255774,31.8692169 27.0978807,31.6666825 27.8607587,31.3700561 C28.6498923,31.0626669 29.3188375,30.652706 29.9866412,29.9859079 C30.6534664,29.3189468 31.0636071,28.6492135 31.3708458,27.8601121 C31.6674843,27.0974282 31.8710054,26.2249975 31.9280827,24.9473348 C31.9863015,23.6668999 32,23.2588959 32,20.0000815 C32,16.7412672 31.9863015,16.3321216 31.9280827,15.0526652 C31.870027,13.7751656 31.6674843,12.9028979 31.3708458,12.1398879 C31.0636071,11.3509495 30.6534664,10.6820316 29.9866412,10.0142551 C29.3196529,9.34729404 28.6498923,8.93635468 27.8617372,8.63010702 C27.0978807,8.33348055 26.2255774,8.12996773 24.9490042,8.07272974 C23.6693325,8.01467641 23.2603334,8 20.0013862,8 C16.7414605,8 16.3334398,8.01369798 15.0529527,8.07272974 M15.1516148,29.7677187 C13.9818576,29.7143944 13.3458541,29.5196874 12.9231564,29.3548225 C12.3629841,29.1367963 11.9636065,28.877024 11.5428657,28.4572787 C11.1231034,28.0375335 10.862505,27.6381722 10.6452854,27.0778597 C10.4804137,26.6553423 10.2856988,26.0195278 10.2322092,24.8494921 C10.1741535,23.584549 10.162575,23.2045932 10.162575,20.0000815 C10.162575,16.7955699 10.175132,16.4165925 10.2322092,15.150671 C10.2856988,13.9806353 10.4815552,13.3457992 10.6452854,12.9221403 C10.8634835,12.3619908 11.1231034,11.9626295 11.5428657,11.5419059 C11.962628,11.1221607 12.3620056,10.8614099 12.9231564,10.6443622 C13.3458541,10.4794972 13.9818576,10.2846271 15.1516148,10.2314659 C16.4167726,10.1732495 16.7967439,10.1616715 20.0004077,10.1616715 C23.20505,10.1616715 23.5840428,10.174228 24.850016,10.2314659 C26.0200993,10.2846271 26.6551244,10.4804756 27.0784744,10.6443622 C27.6389729,10.8614099 28.0381874,11.1221607 28.4589282,11.5419059 C28.8785274,11.9616511 29.1384735,12.3619908 29.3565085,12.9221403 C29.5213802,13.3448208 29.7160951,13.9806353 29.7694215,15.150671 C29.8276403,16.4165925 29.8392189,16.7955699 29.8392189,20.0000815 C29.8392189,23.2036147 29.8276403,23.5835706 29.7694215,24.8494921 C29.7160951,26.0195278 29.5204017,26.6553423 29.3565085,27.0778597 C29.1384735,27.6381722 28.8785274,28.0375335 28.4589282,28.4572787 C28.0391659,28.877024 27.6389729,29.1367963 27.0784744,29.3548225 C26.6559398,29.5196874 26.0200993,29.7143944 24.850016,29.7677187 C23.5850213,29.8259351 23.20505,29.8375132 20.0004077,29.8375132 C16.7967439,29.8375132 16.4167726,29.8259351 15.1516148,29.7677187 M24.9662905,13.5938305 C24.9662905,14.3888024 25.6109371,15.0342382 26.4067569,15.0342382 C27.2015982,15.0342382 27.8472233,14.3888024 27.8472233,13.5938305 C27.8472233,12.7990216 27.2027397,12.1545643 26.4067569,12.1545643 C25.6109371,12.1545643 24.9662905,12.7990216 24.9662905,13.5938305 M13.8383491,20.0000815 C13.8383491,23.4033769 16.5971366,26.1618889 20.0004077,26.1618889 C23.4038418,26.1618889 26.1624663,23.4033769 26.1624663,20.0000815 C26.1624663,16.5967861 23.4038418,13.8381111 20.0004077,13.8381111 C16.5971366,13.8381111 13.8383491,16.5967861 13.8383491,20.0000815 M16.000761,20.0000815 C16.000761,17.7909563 17.7913555,15.9997826 20.0004077,15.9997826 C22.209623,15.9997826 24.0008697,17.7909563 24.0008697,20.0000815 C24.0008697,22.2090437 22.209623,24.0003805 20.0004077,24.0003805 C17.7913555,24.0003805 16.000761,22.2090437 16.000761,20.0000815"></path>
    </symbol>
    <symbol id="vk" viewBox="0 0 40 40">
        <path d="M19.7425669,27.5149075 L21.1771355,27.5149075 C21.1771355,27.5149075 21.6101452,27.4674326 21.8317002,27.2313502 C22.0353353,27.0143224 22.028819,26.6067492 22.028819,26.6067492 C22.028819,26.6067492 22.0007988,24.6987126 22.8941867,24.417739 C23.7748678,24.1409639 24.9057757,26.2618299 26.1044533,27.0772992 C27.0105481,27.6941492 27.6996493,27.5591527 27.6996493,27.5591527 L30.9047029,27.5149075 C30.9047029,27.5149075 32.581027,27.4122068 31.7860356,26.1058412 C31.7211982,25.998942 31.3230508,25.1392275 29.4030162,23.3726465 C27.3930563,21.5237113 27.6625062,21.8227705 30.0833203,18.6245162 C31.5576385,16.6767557 32.1470399,15.4876239 31.9629538,14.9783189 C31.7873389,14.4932358 30.7030227,14.6214502 30.7030227,14.6214502 L27.0942829,14.6434113 C27.0942829,14.6434113 26.826462,14.60724 26.6283657,14.7251197 C26.4341793,14.8400928 26.3097175,15.108794 26.3097175,15.108794 C26.3097175,15.108794 25.7385618,16.6157166 24.9771294,17.8978604 C23.3702041,20.6023117 22.7273688,20.7457051 22.464761,20.577444 C21.8535299,20.1860187 22.0063376,19.0049608 22.0063376,18.1659156 C22.0063376,15.5447875 22.4074173,14.4518972 21.2253563,14.1689858 C20.8330736,14.075005 20.5440747,14.0129971 19.5408867,14.0029854 C18.2532613,13.990067 17.163732,14.0068609 16.5466362,14.306566 C16.135782,14.5058312 15.8190887,14.9498986 16.0122977,14.9754123 C16.2507951,15.0067392 16.7909983,15.1197746 17.0770649,15.5060325 C17.4471921,16.0050028 17.4341594,17.1246986 17.4341594,17.1246986 C17.4341594,17.1246986 17.6465916,20.2102406 16.9379414,20.5935919 C16.4514979,20.8564798 15.7842264,20.3197234 14.3516127,17.8658875 C13.6175489,16.6089345 13.0633356,15.2195686 13.0633356,15.2195686 C13.0633356,15.2195686 12.9564679,14.9599103 12.7658654,14.8207153 C12.534536,14.6524542 12.2116522,14.5991661 12.2116522,14.5991661 L8.78211122,14.6214502 C8.78211122,14.6214502 8.2676475,14.6356603 8.07834831,14.8575326 C7.91022717,15.05486 8.06498985,15.4630791 8.06498985,15.4630791 C8.06498985,15.4630791 10.749715,21.6890658 13.7895798,24.826604 C16.5775887,27.703838 19.7425669,27.5149075 19.7425669,27.5149075"></path>
    </symbol>
    <symbol id="twitter" viewBox="0 0 40 40">
        <path d="M32,12.3676036 C31.1172177,12.7689817 30.1676026,13.0408344 29.1717184,13.1620762 C30.1881665,12.5374174 30.9684961,11.5486567 31.3371789,10.3693733 C30.3857276,10.9480957 29.3314565,11.3679236 28.2103524,11.5942165 C27.3121471,10.613363 26.0324066,10 24.6153281,10 C21.8964763,10 19.6913567,12.2610464 19.6913567,15.0488544 C19.6913567,15.4445846 19.7350552,15.8301485 19.8195144,16.1995218 C15.7272825,15.9890431 12.099209,13.9791404 9.6700889,10.923998 C9.24632404,11.669522 9.00322842,12.5374174 9.00322842,13.4625449 C9.00322842,15.2137734 9.87315819,16.7594179 11.1940267,17.664966 C10.3872577,17.6386091 9.62712487,17.4115632 8.96393653,17.0327767 C8.96320211,17.0542388 8.96320211,17.0757008 8.96320211,17.0967863 C8.96320211,19.5430841 10.6615665,21.5834855 12.9133222,22.0469906 C12.5005738,22.162961 12.0650581,22.2247115 11.6163227,22.2247115 C11.2983154,22.2247115 10.9902229,22.1930832 10.6898419,22.1343449 C11.3166761,24.1397293 13.134385,25.5995256 15.2895635,25.6401905 C13.6036844,26.9945592 11.4811879,27.8018337 9.17361568,27.8018337 C8.77702465,27.8018337 8.38410576,27.7781125 8,27.7310466 C10.1779457,29.1641094 12.7668039,30 15.5469804,30 C24.6043117,30 29.5576602,22.3067944 29.5576602,15.6339778 C29.5576602,15.4152155 29.5525192,15.1972062 29.5429717,14.9810795 C30.5054394,14.2690664 31.3397494,13.3800855 32,12.3676036"></path>
    </symbol>
    <symbol id="ok" viewBox="0 0 40 40">
        <path d="M20,16.4848667 C18.6310531,16.4848667 17.5163572,15.3703475 17.5163572,14.0015352 C17.5161766,12.6310973 18.6314142,11.5167587 20,11.5167587 C21.3700304,11.5167587 22.4841845,12.6312779 22.4841845,14.0015352 C22.4841845,15.3703475 21.3696692,16.4848667 20,16.4848667 M20,8 C16.6914858,8 14,10.6919314 14,14.0015352 C14,17.3095134 16.6914858,20 20,20 C23.3090559,20 26,17.3095134 26,14.0015352 C26,10.6915702 23.3092365,8 20,8"></path>
        <path d="M22.468984,25.4518884 C23.7448507,25.162214 24.9624773,24.6598884 26.070344,23.9657488 C26.9196773,23.4330977 27.1750373,22.3151442 26.6407973,21.4686326 C26.107304,20.6221209 24.9863707,20.3666791 24.137224,20.8980279 C24.1364773,20.898586 24.1357307,20.8989581 24.134984,20.8993302 C21.5940773,22.4915163 18.3236773,22.4904 15.784824,20.8993302 C14.936424,20.3666791 13.8156773,20.6204465 13.2812507,21.4660279 C13.280504,21.4669581 13.279944,21.4677023 13.2795707,21.4686326 C12.7449573,22.3149581 12.999944,23.4327256 13.848904,23.9657488 C14.9567707,24.6595163 16.174024,25.1620279 17.449704,25.4518884 L13.9825573,28.9082605 C13.2728507,29.6156093 13.273224,30.7624 13.9829307,31.4695628 C14.692824,32.1767256 15.8434373,32.1765395 16.5529573,31.4690047 L19.9592507,28.0734698 L23.3675973,31.4693767 C24.075624,32.1761674 25.2245573,32.1769116 25.933704,31.4712372 C25.934264,31.4706791 25.934824,31.4699349 25.9355707,31.4693767 C26.6450907,30.7644465 26.6467707,29.6197023 25.9394907,28.9127256 C25.938184,28.9114233 25.9368773,28.9101209 25.9355707,28.9088186 L22.468984,25.4518884"></path>
    </symbol>
    <symbol id="favArticle" viewBox="0 0 50 63">
        <g stroke="#E5E5E5" stroke-width="1" fill-rule="evenodd">
            <g transform="translate(-135.000000, -79.000000)">
                <polygon id="fav_focus" points="135 76 185 76 185 142 160 131.111111 135 142"></polygon>
            </g>
        </g>
        <g id="hovers" transform="translate(-135.000000, -80.000000)">
            <g transform="translate(148.000000, 95.000000)">
                <g>
                    <mask id="mask-2" fill="white">
                        <use xlink:href="#path-1"></use>
                    </mask>
                    <use id="Mask" xlink:href="#path-1"></use>
                </g>
            </g>
        </g>
        <defs>
            <path d="M16.5,3 C14.76,3 13.09,3.81 12,5.09 C10.91,3.81 9.24,3 7.5,3 C4.42,3 2,5.42 2,8.5 C2,12.28 5.4,15.36 10.55,20.04 L12,21.35 L13.45,20.03 C18.6,15.36 22,12.28 22,8.5 C22,5.42 19.58,3 16.5,3 L16.5,3 Z" id="path-1"></path>
        </defs>
    </symbol>
    <symbol id="shopping" viewBox="0 0 20 20">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-17.000000, -90.000000)">
                <g transform="translate(16.000000, 88.000000)">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M7,18 C5.9,18 5.01,18.9 5.01,20 C5.01,21.1 5.9,22 7,22 C8.1,22 9,21.1 9,20 C9,18.9 8.1,18 7,18 L7,18 Z M1,2 L1,4 L3,4 L6.6,11.59 L5.25,14.04 C5.09,14.32 5,14.65 5,15 C5,16.1 5.9,17 7,17 L19,17 L19,15 L7.42,15 C7.28,15 7.17,14.89 7.17,14.75 L7.2,14.63 L8.1,13 L15.55,13 C16.3,13 16.96,12.59 17.3,11.97 L20.88,5.48 C20.96,5.34 21,5.17 21,5 C21,4.45 20.55,4 20,4 L5.21,4 L4.27,2 L1,2 L1,2 Z M17,18 C15.9,18 15.01,18.9 15.01,20 C15.01,21.1 15.9,22 17,22 C18.1,22 19,21.1 19,20 C19,18.9 18.1,18 17,18 L17,18 Z" id="Shape" fill="#FFFFFF"></path>
                </g>
            </g>
        </g>
    </symbol>
    <symbol id="favorites" viewBox="0 0 20 19">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-10.000000, -147.000000)">
                <g transform="translate(8.000000, 144.000000)">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M12,21.35 L10.55,20.03 C5.4,15.36 2,12.28 2,8.5 C2,5.42 4.42,3 7.5,3 C9.24,3 10.91,3.81 12,5.09 C13.09,3.81 14.76,3 16.5,3 C19.58,3 22,5.42 22,8.5 C22,12.28 18.6,15.36 13.45,20.04 L12,21.35 L12,21.35 Z" fill="#FFFFFF"></path>
                </g>
            </g>
        </g>
    </symbol>
    <symbol id="search" viewBox="0 0 18 18">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-19.000000, -203.000000)">
                <g transform="translate(16.000000, 200.000000)">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 L9.5,14 Z" fill="#FFFFFF"></path>
                </g>
            </g>
        </g>
    </symbol>
    <symbol id="searchDark" viewBox="0 0 42 42">
        <path d="M31,28 L29.42,28 L28.86,27.46 C30.82,25.18 32,22.22 32,19 C32,11.82 26.18,6 19,6 C11.82,6 6,11.82 6,19 C6,26.18 11.82,32 19,32 C22.22,32 25.18,30.82 27.46,28.86 L28,29.42 L28,31 L38,40.98 L40.98,38 L31,28 L31,28 Z M19,28 C14.02,28 10,23.98 10,19 C10,14.02 14.02,10 19,10 C23.98,10 28,14.02 28,19 C28,23.98 23.98,28 19,28 L19,28 Z"></path>
    </symbol>
    <symbol id="visibility" viewBox="0 0 22 12">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1105.000000, -294.000000)">
                <g transform="translate(1104.000000, 288.000000)">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M1.57350354,12 C3.32806292,14.98693 7.39632572,17 12,17 C16.6036743,17 20.6719371,14.98693 22.4264965,12 C20.6719371,9.01307 16.6036743,7 12,7 C7.39632572,7 3.32806292,9.01307 1.57350354,12 Z M12,16.75 C9.37785763,16.75 7.25,14.6221424 7.25,12 C7.25,9.37785763 9.37785763,7.25 12,7.25 C14.6221424,7.25 16.75,9.37785763 16.75,12 C16.75,14.6221424 14.6221424,16.75 12,16.75 Z M12,13.375 C12.7588576,13.375 13.375,12.7588576 13.375,12 C13.375,11.2411424 12.7588576,10.625 12,10.625 C11.2411424,10.625 10.625,11.2411424 10.625,12 C10.625,12.7588576 11.2411424,13.375 12,13.375 Z" stroke="#CAD0D9"></path>
                </g>
            </g>
        </g>
    </symbol>
    <symbol id="success" viewBox="0 0 60 60">
        <ellipse fill="#B3A170" cx="29.5625" cy="29" id="svg_1" rx="28" ry="28"/>
        <ellipse fill="#FF0000" stroke="#000000" stroke-width="5" cx="353.5" cy="-201" id="svg_2" rx="2" ry="2"/>
        <line stroke="#fff" stroke-width="2" x1="19.76967" y1="30.46875" x2="27.45717" y2="38.53125" id="svg_4"/>
        <line stroke="#fff" stroke-width="2" x1="26.47994" y1="38.11651" x2="41.34334" y2="22.97991" id="svg_5"/>
    </symbol>
    <symbol id="close" viewBox="0 0 14 14">
        <path stroke-width="1px" d="M 0,0 L14,14 M 0,14 L 14,0"/>
    </symbol>
    <symbol id="arrow" viewBox="0 0 48 48">
        <polygon points="21 19.4 22.4 18 28.4 24 22.4 30 21 28.6 25.6 24"></polygon>
    </symbol>
</svg>
<!-- End SVG Sprite -->



<?php $this->endBody() ?>

<script>
    $(function () {
        $('.search-form').submit(function () {
            var q = $(this).find('input').val();
            location.href = '/search/'+q;
            return false;
        });
    });
</script>

<style>
    body .article-body > img {
        max-width: 100%;
    }
</style>
</body>
</html>
<?php $this->endPage() ?>
