<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\User;
use backend\models\Role;



class TestController extends Controller
{
    public function actionIndex()
    {
        $userId = Yii::$app->user->identity->id;
        $role = Role::find()->where(['role_value' => 20])->one();

        return $this->render('index', ['role'=>$role, 'userId' => $userId]);

        //$role = Yii::$app->user->identity->role->role_value;
        //return $this->render('index', ['role' => $role]);
    }




}
