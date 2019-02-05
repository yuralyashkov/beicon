<?php
/**
 * Created by PhpStorm.
 * User: Yuriy Liashkou
 * Date: 23.01.2019
 * Time: 4:16
 */

namespace app\models\forms;

use app\models\Subscribers;

class CreateForm extends \yii\base\Model
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

    public function createCompany(){
        if($this->validate()){
            return true;
        }

    }

}