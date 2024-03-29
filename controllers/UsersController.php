<?php

namespace app\controllers;

use Yii;
use app\models\MaUsers;
use app\models\MaUsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ActivationForm;
use yii\filters\AccessControl;

/**
 * UsersController implements the CRUD actions for MaUsers model.
 */
class UsersController extends Controller {

    public $layout = 'admin';

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role == 1;
                        }
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }

    if ($action == 'index' || $action == 'update' || $action == 'create') {
            if (\Yii::$app->user->isGuest) {
                return $this->redirect(['users/login']);
            } else if (\Yii::$app->user->identity->role != 1) {
                return $this->redirect(['site/index']);
            }
        }


        return true;
    }

    /**
     * Lists all MaUsers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MaUsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaUsers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MaUsers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new MaUsers();
        $this->layout = "admin";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaUsers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaUsers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaUsers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaUsers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = MaUsers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //ini adalah reset password
    public function actionResetdev() {
        $model = MaUsers::findOne(['username' => 'admin']);
        $model->setPassword('asdf1234');
        $model->save();

        return 'OK';
    }

    public function actionLogin() {
        $this->layout = "clean";

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index']);
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegister() {
        $this->layout = "clean";

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->redirect(['users/activation', 'uid' => $model->username]);
        }
        return $this->render('register', [
                    'model' => $model,
        ]);
    }

    public function actionProfile() {
        $model = $this->findModel(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('profile', ['model' => $model]);
    }

    public function actionActivation($uid ='') {
        $this->layout = "clean";
        $model = new ActivationForm();
        $model->username = $uid;
        if ($model->load(Yii::$app->request->post()) && $model->activation()) {
            Yii::$app->session->setFlash('notif', 'Aktivasi anda sukses,silahkan login');
            return $this->redirect(['users/login']);
        }
        return $this->render('activation', ['model' => $model]);
    }

}
