<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\MaProduct;
use app\models\MaCategory;
use app\models\MaDepartment;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $m=MaDepartment::find()->orderBy('name')->all();
        return $this->render('index',['model'=>$m]);
    }

    public function actionSubindex($id)
    {
        $m=MaCategory::find()->where(['dept_id'=>$id])->orderBy('category_name')->all();
        $txt=MaDepartment::findOne($id)->name;
        return $this->render('subindex',['model'=>$m,'deptname'=>$txt,'deptid'=>$id]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */


   

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

    /**s
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionProduct($catid='',$search='',$deptid='')
    {
       // $cat=Yii::$app->request->get('cat');

       $model=MaProduct::find()->andFilterWhere(['category_id'=> $catid])->andFilterWhere(['dept_id'=> $deptid])
               ->andFilterWhere(['like','product_name',$search])->all();
       
       return $this->renderAjax('product',['model'=>$model]);
    }

    public function actionBuyproduct($prdid='')
    {
        if (Yii::$app->user->isGuest) {
            \Yii::$app->getSession()->setFlash('notif', 'Please login to purchase');
            return $this->redirect(['users/login']);
        }

      
    }
}
