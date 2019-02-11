<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Sections;
use app\models\Articles;
use app\models\ImageSizes;
use app\models\Seo;
use app\models\Category;
use app\models\SectionsCategory;
use yii\web\NotFoundHttpException;

class SectionsController extends Controller
{
    public function actionIndex()
    {
        $query = Sections::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $sections = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('index', [
            'Sections' => $sections,
            'pagination' => $pagination,
        ]);
    }

    public function actionView($url, $page = 1)
    {

//        $model = Category::find()->where(['url' => $url])->one();
//
//        if($model) {
//            $id = $model->id;
//
//            $sections = SectionsCategory::find()->where(['category_id' => $id])->all();
//            $ids = array();
//            foreach ($sections as $section) {
//                $ids[] = $section->id;
//            }
//
//            $articles = Articles::find()->where(['section' => $ids, 'status' => 'publish'])->orderBy(['date_publish' => SORT_DESC])->limit(20)->all();
//
//        } else {
//        }

            $model = Sections::find()->where(['url' => $url])->one();
            if ($model === null) {
                throw new NotFoundHttpException;
            }
            $id = $model->id;

            $articles = Articles::find()->where(['section' => $id, 'status' => 'publish'])->orderBy(['date_publish' => SORT_DESC]);


            $topic = Articles::find()->where(['section' => $id, 'status' => 'publish', 'section_topic' => 1])->orderBy(['date_publish' => SORT_DESC])->one();


        // 18 статей если есть топик, 19 если нет
            if($topic) {
                $ps = 18;
                $pagesTopic = new Pagination(['totalCount' => $topic->count(), 'pageSize' => 1]);
                $topic = $articles->offset($pagesTopic->offset)
                    ->limit($pagesTopic->limit)
                    ->all();

            } else $ps = 19;

            $pages = new Pagination(['totalCount' => $articles->count(), 'pageSize' => $ps]);

            $articles = $articles->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

            if(!$topic) {
                $topic = $articles[7];
                unset($articles[7]);
            }



//        foreach ($articles as $k => $article){
//            if($article["preview_img"]) {
//                $articles[$k]["preview_img"] = ImageSizes::getResizesName($article["preview_img"], 'rectangle');
//            }
//            if($article["header_img"]) {
//                $articles[$k]["header_img"] = ImageSizes::getResizesName($article["header_img"], 'rectangle');
//            }
//        }


        $seo = Seo::find()->where(['tbl' => 'sections', 'id_record' => $id])->one();
        if($seo) {
            \Yii::$app->view->title = $seo->title;

            if($seo->description != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'description',
                    'content' => $seo->description
                ]);
            }
            if($seo->keywords != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'keywords',
                    'content' => $seo->keywords
                ]);
            }
            if($seo->og_title != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'og:title',
                    'content' => $seo->og_title
                ]);
            }
            if($seo->og_description != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'og:description',
                    'content' => $seo->og_description
                ]);
            }

            if($seo->og_locale != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'og:locale',
                    'content' => $seo->og_locale
                ]);
            }

            if($seo->og_image != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'og:image',
                    'content' => $seo->og_image
                ]);
            }

            if($seo->og_url != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'og:url',
                    'content' => $seo->og_url
                ]);
            }

            if($seo->description != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'og:site_name',
                    'content' => $seo->og_site_name
                ]);
            }

            if($seo->last_updated != '') {
                \Yii::$app->view->registerMetaTag([
                    'name' => 'last-modified',
                    'content' => $seo->last_updated
                ]);
            }
        }

        $ajax = false;

        if(\Yii::$app->request->isAjax){
            $ajax = true;
            return $this->renderPartial('index', [
                'section' => $model,
                'articles' => $articles,
                'ajax' => $ajax,
                'limit' => $pages->pageCount,
                'topic' => $topic
            ]);
        } else {

            return $this->render('index', [
                'section' => $model,
                'articles' => $articles,
                'ajax' => $ajax,
                'limit' => $pages->pageCount,
                'topic' => $topic
            ]);
        }
    }
}