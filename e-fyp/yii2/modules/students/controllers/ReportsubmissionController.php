<?php

namespace app\modules\students\controllers;

use Yii;
use app\modules\students\models\Reportsubmission;
use app\modules\students\models\ReportsubmissionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\modules\students\models\Students;

/**
 * ReportsubmissionController implements the CRUD actions for Reportsubmission model.
 */
class ReportsubmissionController extends Controller
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
        ];
    }

    /**
     * Lists all Reportsubmission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportsubmissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reportsubmission model.
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
     * Creates a new Reportsubmission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($report)
    {
        $model = new Reportsubmission();

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model,'files');

            if($file != ""){
                $model->files = $file->baseName . '.' . $file->extension;

                $model->files = $file->baseName . '.' . $file->extension;
                $file->saveAs('submit/' . $model->files);

            }
            $user = Yii::$app->user->identity->attributes;
            $model->student_id = $user['username'];
            $expression = new Expression('NOW()');
            $now = (new \yii\db\Query)->select($expression)->scalar();             
            $model->submissiondate = $now;
            $student = Students::find()->where(['studentID'=>$user['username']])->one();
            $model->courseID = $student->course;
            $model->report = $report;
            //var_dump($model);exit();
            $model->save();
            return $this->redirect(['report/submit']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reportsubmission model.
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
     * Deletes an existing Reportsubmission model.
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
     * Finds the Reportsubmission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reportsubmission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reportsubmission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
