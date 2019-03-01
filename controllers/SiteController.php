<?php

namespace app\controllers;
use app\models\forms\Subscribe;
use app\models\Meta;
use app\models\Sitemap;
use Bitrix\Main\Context\Site;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Articles;
use app\models\Rss;
use app\models\ImageSizes;
use yii\helpers\Url;

class SiteController extends Controller
{

    public function actionRss($url){
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        $rss = Rss::find()->where(['url' => $url])->with('articles')->one();


        if($rss->active == 1) {
            $sitemap = new Sitemap;
            if ($rss) {
                $array = [];
                foreach ($rss->articles as $article) {

//                    $article->content = str_replace('[[BANNER_BLOCK]]',  \Yii::$app->view->renderFile('@app/views/articles/banerBlock.php'), $model->content);
                    $article->content = str_replace('files/', Url::to('/', true).'basic/web/files/', $article->content);
                    if(preg_match_all("/{{GALLERY=\d+}}/", $article->content, $matches) || preg_match_all("/{{GALLERY=\d+}}/", $article->preview_content, $matches)) {
                        $matches = $matches[0];
                        foreach ($matches as $shortcode) {
                            $article->content = str_replace($shortcode, '', $article->content);
                        }
                    }

                    $article->content = preg_replace('/<iframe.*?\/iframe>/i','', $article->content);
                    $article->content = preg_replace('/<script.*?\/script>/i','', $article->content);

                    $fields = [
                        'link' => Url::to(['articles/view', 'url' => $article->url, 'section' => $article->sectionData->url]),
                        'title' => $article->name,
                        'pubDate' => date(DATE_RFC822, strtotime($article->date_publish)),
                        'content' => $article->content
                    ];

                    if($article->preview_img)
                        $fields['img'] = $article->preview_img;
                    if($article->publisher->role != 'admin')
                        $fields['author'] = $article->publisher->name;
                    if($article->other_author != '')
                        $fields["author"] = $article->other_author;
                    $array[] = $fields;
                }
                $xml = $sitemap->getRss($array, $rss->name);
            }

//        print_r($array);

            return $xml;
        }
    }

    //Карта сайта. Выводит в виде XML файла.
    public function actionSitemap(){
//        \Yii::$app->response->format = Response::FORMAT_XML;
        $sitemap = new Sitemap();
        //Если в кэше нет карты сайта
//        if (!$xml_sitemap = Yii::$app->cache->get('sitemap')) {
            //Получаем мыссив всех ссылок
            $urls = $sitemap->getUrl();
            //Формируем XML файл
            $xml_sitemap = $sitemap->getXml($urls);
            // кэшируем результат
//            Yii::$app->cache->set('sitemap', $xml_sitemap, 3600*12);
//        }
        //Выводим карту сайта
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $sitemap->showXml($xml_sitemap);

    }

    public function actionRobots(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/plain');

        $robots = Meta::find()->where(['keyname' => 'robots'])->one();

        if($robots){
            return $robots["value"];

        } else return '';

    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],

            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    'Origin'                           => ['*', 'http://bi.verworren.net'],
                    'Access-Control-Request-Method'    => ['POST', 'GET','PUT','DELETE','PATCH','OPTIONS'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                    'Access-Control-Expose-Headers' => ['*'],
                    'Access-Control-Allow-Origin' => ['*', 'http://bi.verworren.net'],

                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionAjaxSubscribe() {
        if (Yii::$app->request->isAjax) {
            $model = new Subscribe();
            if ($model->load(Yii::$app->request->post())) {

                    Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                    return \yii\widgets\ActiveForm::validate($model);

            }
        } else {
            throw new HttpException(404 ,'Page not found');
        }
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $articles = Articles::find()->where(['show_on_main' => 1, 'status' => 'publish'])->andWhere(['<=', 'date_publish', date('Y-m-d H:i:s')])->orderBy(['date_publish' => SORT_DESC])->limit(25)->all();
//        $articles = Articles::find()->where(['show_on_main' => 1, 'status' => 'publish'])->orderBy(['date_publish' => SORT_DESC])->orderBy('main_sort')->limit(17)->all();
        $recomended = Articles::find()->where(['status' => 'publish', 'choise' => 1])->andWhere(['<=', 'date_publish', date('Y-m-d H:i:s')])->orderBy(['date_publish' => SORT_DESC])->limit(10)->all();
        if($recomended) {
            foreach ($recomended as $k => $value) {

                if ($value->preview_img) {
                    $recomended[$k]->preview_img = ImageSizes::getResizesName($value->preview_img, '1_1_352_exact');
                }
                if ($value->header_img) {
                    $recomended[$k]->header_img = ImageSizes::getResizesName($value->header_img, '1_1_352_exact');
                }

            }
        }

        return $this->render('index', [
            'head_articles' => $articles,
            'recomended' => $recomended
        ]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@кодер.укр';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
