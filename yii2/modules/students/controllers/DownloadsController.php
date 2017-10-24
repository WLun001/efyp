<?php

namespace app\modules\students\controllers;

use Yii;
use app\modules\students\models\Downloads;
use app\modules\students\models\DownloadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * DownloadsController implements the CRUD actions for Downloads model.
 */
class DownloadsController extends Controller
{
    /**
     * @inheritdoc
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete'],
                        'roles' => ['manageDownloads'],
                    ],
                                      [
                        'allow' => true,
                        'actions' => ['view-download'],
                        'roles' => ['viewDownloads'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Downloads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DownloadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Downloads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Downloads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Downloads();

        if ($model->load(Yii::$app->request->post())) {
            $document = UploadedFile::getInstance($model, 'documents');

            if($document != ""){
                $model->documents = $document->baseName . '.' . $document->extension;

                $documentExist = Downloads::find()
                        ->where(['documents' => $model->documents])
                        ->andWhere(['fypType_ID' => $model->fypType_ID])
                        ->exists();
                    
                if($document && !$documentExist)
                    $document->saveAs('uploads/' . $model->documents);
                else{
                    Yii::$app->getSession()->setFlash('error','This document has been uploaded to those students!');
                    return $this->render("create",['model'=>$model]);
                }

                if($document){
                    $model->documents = $document->baseName . '.' . $document->extension;
                    $document->saveAs('uploads/' . $model->documents);
                }

                $model->save();

                return $this->redirect(['view', 'id' => $model->downloadID]);
            }else{
                Yii::$app->getSession()->setFlash('error','Document cannot be blank!');
                    return $this->render("create",['model'=>$model]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Downloads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $documentTemp = $model->documents;

        if ($model->load(Yii::$app->request->post())) {

            $documentLocation = "uploads/";

            $document = UploadedFile::getInstance($model, 'documents');

            // var_dump($document);exit();
            $documentExist = Downloads::find()
                    ->where(['downloadID' => $id])
                    ->andwhere(['documents' => $model->documents])
                    ->andWhere(['fypType_ID' => $model->fypType_ID])
                    ->exists();

            if($document != ""){
                if(!$documentExist ){
                     
                    //unlink($documentLocation.$documentTemp);
                    $model->documents = $document->baseName . '.' . $document->extension;

                    $document->saveAs('uploads/'.$model->documents);
                    $model->save();
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Please select one of options');
                    return $this->render("create",['model'=>$model]);
                }
            } else {
                $model->documents = $documentTemp;
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->downloadID]);
        
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Downloads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
       $model = $this->findModel($id);

       $documentLocation = "uploads/";

       $findDocument = Downloads::find()
                    ->where(['documents'=>$model->documents])
                    ->count();
                    //var_dump($findDocument);exit;
        if($findDocument == 1){
            unlink($documentLocation.$model->documents);
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Downloads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Downloads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Downloads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

        public function actionViewDownload()
    {
        $downloads = Downloads::find()
        ->all();

        return $this->render('view-download',['downloads'=>$downloads]);

    }
}
