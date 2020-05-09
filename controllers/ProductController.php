<?php

namespace app\controllers;

use Yii;
use app\models\SubProductItem;
use app\models\MaProduct;
use app\models\MaProductSearch;
use app\models\Cart;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ProductController implements the CRUD actions for MaProduct model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout='admin';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MaProduct models.
     * @return mixed
     */
    public function actionIndex($dept_id = 1)
    {
        $searchModel = new MaProductSearch();
        $searchModel->dept_id=$dept_id;

     
        $session = Yii::$app->session;
        $session['dept_id']=$dept_id;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaProduct model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelItem= SubProductItem::find()->where(['product_id'=>$id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $modelItem,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dpchild'=> $dataProvider,

        ]);
    }

    public function actionSubitem($id)
    {
        $modelItem= new SubProductItem();
        $modelItem->product_id=$id;

        if ($modelItem->load(Yii::$app->request->post()) && $modelItem->save()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
          
            return $this->render('_subitemForm', [
            'model' => $modelItem ,'model_parent' => $this->findModel($id),
        ]);

        }
    }

    public function actionDetail($id)
    {
        $this->layout='main';

        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MaProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing MaProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Add item to user's cart
    
     * @param integer $prdid = product_id
     * @return mixed

     */
    public function actionAddtocart($prdid)
    {
       $a=$this->findModel($prdid);
       if ($a){
         $cartmodel= new Cart();
         $cartmodel->product_id=$a->id;
         $cartmodel->qty=1;
         $cartmodel->username=Yii::$app->user->identity->username;
         $cartmodel->save();
       }

       return $this->redirect(['viewcart']);
    }
   
     /**
     * Display current user cart items
     * @param none
     * @return mixed

     */
    public function actionViewcart()
    {
     if (!Yii::$app->user->isGuest){ 
     $cmodel=Cart::find()->where(['username'=>Yii::$app->user->identity->username])->all();
    
     
     return $this->render('cart', [
     'model' => $cmodel,
    ]);
     }
    }
}
