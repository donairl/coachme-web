<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\MaContent;
use app\models\MaCategory;
use app\models\MaDepartment;

class SiteController extends Controller
{

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
        $m = MaDepartment::find()->orderBy('sort_no')->all();
        return $this->render('index', ['model' => $m]);
    }

    public function actionPayment()
    {
        $m = MaDepartment::find()->orderBy('sort_no')->all();
        return $this->render('payment', ['model' => $m]);
    }

    public function actionPage($id)
    {
        $model = MaContent::findOne(['short_description' => $id]);

        return $this->render('page', ['model' => $model]);
    }

    public function actionPayment2nd($id)
    {
        $m = MaDepartment::findOne($id);
        return $this->render('payment2nd', ['model' => $m]);
    }

    public function actionPayfinal()
    {
        $payMethod = Yii::$app->request->post('paymethod');
        $payForClass = Yii::$app->request->post('payForClass');
        $m = MaDepartment::findOne($payForClass);

        $model = new \app\models\Transaction();
        $model->invoice_no = Yii::$app->security->generateRandomString(6) . '/' . date('mY');
        $model->paid_for_class = $payForClass;
        $model->username = Yii::$app->user->identity->username;
        $model->type_payment = $payMethod;
        $model->status_payment = 0;
        $model->total_paid = $m->price;
        if (!$model->save()) {
            Yii::debug($model->username);
            var_dump($model->getErrors());
            die();
        }

        return $this->renderAjax('payfinal', ['model' => $model, 'kelasModel' => $m]);
    }


    public function actionSubindex($id)
    {
        /*
        Disable this : all user can view all the video

        if (\Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('notif', 'Maaf, Anda harus login untuk melihat videonya');
            return $this->redirect(['users/login']);
        }

        */
        
        $m = MaCategory::find()->where(['dept_id' => $id])->orderBy('category_code')->all();
        $txt = MaDepartment::findOne($id)->name;
        return $this->render('subindex', ['model' => $m, 'deptname' => $txt, 'deptid' => $id]);
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

    public function actionVideo($catid = '', $search = '', $deptid = '')
    {
        // $cat=Yii::$app->request->get('cat');

        $model = MaContent::find()->andFilterWhere(['category_id' => $catid])
            ->andFilterWhere(['dept_id' => $deptid])
            ->andFilterWhere(['post_type' => 'V'])
            ->andFilterWhere(['like', 'product_name', $search])->all();

        return $this->renderAjax('product', ['model' => $model]);
    }

    public function actionBuyproduct($prdid = '')
    {
        if (Yii::$app->user->isGuest) {
            \Yii::$app->getSession()->setFlash('notif', 'Please login to view');
            return $this->redirect(['users/login']);
        }


    }
}
