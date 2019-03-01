<?php

namespace app\models;

use app\models\Articles;
use Yii;
use yii\base\Model;
use yii\helpers\Url;
use app\models\Tags;

class Sitemap extends Model{
    public function getUrl(){
        $urls = array();
        //Получаем массив URL из таблицы Sef
        $url_rules = Articles::find()->with('seo')
            ->all();
        //Формируем двумерный массив. createUrl преобразует ссылки в правильный вид.
        //Добавляем элемент массива 'daily' для указания периода обновления контента
        foreach ($url_rules as $url_rule){
            $urls[] = array(Url::to(['articles/view', 'url' => $url_rule->url]),$url_rule->seo->changegreq, $url_rule->seo->priority);
        }

        //Получаем массив URL из таблицы Sef
        $url_rules = Sections::find()->with('seo')
            ->all();
        //Формируем двумерный массив. createUrl преобразует ссылки в правильный вид.
        //Добавляем элемент массива 'daily' для указания периода обновления контента
        foreach ($url_rules as $url_rule){
            $urls[] = array(Url::to(['sections/view', 'url' => $url_rule->url]),$url_rule->seo->changegreq, $url_rule->seo->priority);
        }


        //Получаем массив URL из таблицы Sef
        $url_rules = Tags::find()->with('seo')
            ->all();
        //Формируем двумерный массив. createUrl преобразует ссылки в правильный вид.
        //Добавляем элемент массива 'daily' для указания периода обновления контента
        foreach ($url_rules as $url_rule){
            $urls[] = array(Url::to(['tags/view', 'url' => $url_rule->url]),$url_rule->seo->changegreq, $url_rule->seo->priority);
        }



        return $urls;
    }

    public function getRss($urls, $rssName){
        $host = Yii::$app->request->hostInfo; // домен сайта
        ob_start();
        echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
        <rss version="2.0" xmlns:yandex="http://news.yandex.ru" xmlns:rambler="http://news.rambler.ru" >
    <channel>
      <title><?=$rssName?></title>
        <link><?=$host?></link>
        <language>ru</language>
       <?foreach ($urls as $url) { ?>
       <item>
            <title><?=$url["title"]?></title>
            <link><?=$host.$url["link"]?></link>
            <pubDate><?=$url["pubDate"]?></pubDate>
           <? if(isset($url["author"])) { ?>
            <author><?=$url["author"]?></author>
                <? } ?>
           <? if(isset($url["img"])){ ?>
            <enclosure url="<?=$host.UPLOAD_DIR.$url["img"]?>" type="image/jpeg"/>
                <? } ?>
            <content><![CDATA[<?=$url["content"]?>]]></content>
           <yandex:full-text><![CDATA[<?=$url["content"]?>]]></yandex:full-text>
           <rambler:full-text><![CDATA[<?=$url["content"]?>]]></rambler:full-text>
        </item>
       <? } ?>
    </channel></rss><?php
        return ob_get_clean();
    }

    public function getXml($urls, $sitemap = true){
        $host = Yii::$app->request->hostInfo; // домен сайта
        ob_start();
        echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            <? if($sitemap) { ?>
            <url>
                <loc><?= $host ?></loc>
                <changefreq>daily</changefreq>
                <priority>1</priority>
            </url>
            <? } ?>
            <?php foreach($urls as $url): ?>
                <url>
                    <loc><?= $host.$url[0] ?></loc>
                    <changefreq><?=$url[1] ?></changefreq>
                    <priority><?= $url[2] ?></priority>
                </url>
            <?php endforeach; ?>
        </urlset>
        <?php return ob_get_clean();
    }
    public function showXml($xml_sitemap){
        // устанавливаем формат отдачи контента
//        Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        //повторно т.к. может не сработать
//        header("Content-type: text/xml");
        return $xml_sitemap;
//        Yii::$app->end();
    }
}