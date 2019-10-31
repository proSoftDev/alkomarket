<?php

namespace app\modules\admin\controllers;

use app\models\ImageUpload;
use Yii;
use app\models\Product;
use app\models\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BackendController
{
    /**
     * {@inheritdoc}
     */
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $upload = new ImageUpload();
        if ($model->load(Yii::$app->request->post())) {
			$model->number_of_sales = 0;
            $filea = UploadedFile::getInstance($model, 'imagea');
            $fileb = UploadedFile::getInstance($model, 'imageb');
            $filec = UploadedFile::getInstance($model, 'imagec');


            if($filea != null ){
                $model->imagea = $upload->uploadFile($filea, $model->imagea);
            }

            if($fileb != null ){
                $model->imageb = $upload->uploadFile($fileb, $model->imageb);
            }

            if($filec != null ){
                $model->imagec = $upload->uploadFile($filec, $model->imagec);
            }


            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload = new ImageUpload();
        $oldImageaName = $model->imagea;
        $oldImagebName = $model->imageb;
        $oldImagecName = $model->imagec;

        if ($model->load(Yii::$app->request->post())) {

            $filea = UploadedFile::getInstance($model, 'imagea');
            $fileb = UploadedFile::getInstance($model, 'imageb');
            $filec = UploadedFile::getInstance($model, 'imagec');

            if($filea == null){
                $model->imagea = $oldImageaName;
            }else{

                $model->imagea = $upload->uploadFile($filea, $model->imagea);
                if(!($oldImageaName == null)){
                    unlink($upload->getFolder() . $oldImageaName);
                }
            }

            if($fileb == null){
                $model->imageb = $oldImagebName;
            }else{
                $model->imageb = $upload->uploadFile($fileb, $model->imageb);
                if(!($oldImagebName == null)){
                    unlink($upload->getFolder() . $oldImagebName);
                }
            }

            if($filec == null){
                $model->imagec = $oldImagecName;
            }else{
                $model->imagec = $upload->uploadFile($filec, $model->imagec);
                if(!($oldImagecName == null)){
                    unlink($upload->getFolder() . $oldImagecName);
                }
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteProduct();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
