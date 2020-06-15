<?php

namespace app\controllers;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class AdminController extends \yii\web\Controller {

    public $layout = 'admin';

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        } else if (\Yii::$app->user->identity->role != 1) {
            return $this->redirect(['site/index']);
        }

        return true;
    }
public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                   [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionListpo() {
        $query = \app\models\Transaction::find();

        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('po',['dataProvider'=> $dataProvider]);
    }

}
