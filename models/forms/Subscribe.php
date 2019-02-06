<?php
/**
 * Created by PhpStorm.
 * User: Yuriy Liashkou
 * Date: 23.01.2019
 * Time: 4:16
 */

namespace app\models\forms;

use app\models\Subscribers;

class Subscribe extends \yii\base\Model
{

    public $email;




    public function rules()
    {
        return [
            ['email', 'email'],
            ['email', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail'
        ];
    }

    public function createSubscriber(){
        if($this->validate()){
            $subscriber = new Subscribers();
            $subscriber->email = $this->email;
            $subscriber->active = 0;

            $subscriber->save();

            \Yii::$app->mailer->compose('layouts/html', [
                'content' => '#'
            ])->setTo($this->email)
                ->setFrom('beicon.it-sfera.ru')
                ->setSubject('Подтверждение подписки')
                ->send();

            return $subscriber->id;


        } else return false;

    }

}