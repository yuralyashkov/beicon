<?php

namespace app\controllers;

use app\models\Mnu;
use yii\helpers\ArrayHelper;
use yii\filters\auth\QueryParamAuth;

class MnusController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Mnu';


    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'data'
    ];
    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
//        unset($actions['delete'], $actions['create']);

        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        // prepare and return a data provider for the "index" action
        $model = new Mnu();
        return $model->search(\Yii::$app->request->queryParams);
    }

    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [

'authenticator' => [
    'class' => QueryParamAuth::className(),
],
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
            ]
        );
    }
}
