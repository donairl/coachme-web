<?php

namespace app\controllers;

class AdminController extends \yii\web\Controller
{
    public $layout='admin';
   
    
	public function beforeAction($action)
	{
		if (!parent::beforeAction($action)) {
				return false;
        }
       
        if (\Yii::$app->user->isGuest) {
          return $this->redirect(['users/login']);
        } else if (\Yii::$app->user->identity->role!=1) {
            return $this->redirect(['site/index']);   
        }
        
        return true;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPurchaseorder()
    {
        return $this->render('po');
    }

   

}
