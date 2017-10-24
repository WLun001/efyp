<?php

namespace app\modules\students\controllers;

use Yii;
use app\modules\students\models\Logbook;
use app\modules\students\models\LogbookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\modules\students\models\Students;
use app\modules\students\models\Title;
use app\modules\students\models\Ganttchart;

/**
 * LogbookController implements the CRUD actions for Logbook model.
 */
class LogbookController extends Controller
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
            // 'access' => [
            //     'class' => \yii\filters\AccessControl::className(),
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'actions' => ['index','view','create','update','delete'],
            //             'roles' => ['manageLogBook'],
            //         ],
            //     ],
            // ],
        ];
    }

    /**
     * Lists all Logbook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogbookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Logbook model.
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
     * Creates a new Logbook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Logbook();

        if ($model->load(Yii::$app->request->post())) {
            $document = UploadedFile::getInstance($model,'files');

            if($document != ""){
                $model->files = $document->baseName . '.' . $document->extension;
                if($document)
                    $document->saveAs('logbook/'. $model->files);
            }
            //var_dump($document);exit();
            $user = Yii::$app->user->identity->attributes;
            $model->student_fk = $user['username'];
            //var_dump($post);exit();

            $model->save();
            return $this->redirect(['ganttchart/logbook', 'id' => $model->logbookID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Logbook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $docTemp = $model->files;

        if ($model->load(Yii::$app->request->post())) {

            $filesLocation = "logbook/";

            $file = UploadedFile::getInstance($model,'files');

            if($file != ""){
                $model->files = $file->basename.'.'.$file->extension;
                $file->saveAs('logbook/'.$model->files);
                $user = Yii::$app->user->identity->attributes;
                $model->student_fk = $user['username'];
                $model->save();
            }else{
                $model->files = $docTemp;
                $user = Yii::$app->user->identity->attributes;
                $model->student_fk = $user['username'];
                $model->save();
            }


            return $this->redirect(['view', 'id' => $model->logbookID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Logbook model.
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
     * Finds the Logbook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Logbook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Logbook::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewOwnStudentslb($id){
        $lb = new Logbook();


        $student = Students::find()->where(['studentID'=>$id])->one();
        $title = Title::find()
        ->where(['student_fk'=>$student->studentID])
        ->one();

        $models = Ganttchart::find()->where(['studentID_fk'=>$student->studentID])->all();

        $logbooks = Logbook::find()->where(['student_fk'=>$student->studentID])->all();


        if(isset($_POST[$lb->checked])){
            $lb->acknowledgement=1;
            $lb->save();
        }else{
            $lb->acknowledgement=0;
            $lb->save();
        }
        return $this->render('view-own-studentslb',['models'=>$models,'logbooks'=>$logbooks,'student'=>$student,'title'=>$title,'lb'=>$lb]);
   
    }

    public function actionUpdatelb($id){
        // $model = $this->findModel($id);
        // $model->acknowledgement = 
        // $model->save();
        $model = $this->findModel($id);

        if($model->load($post=Yii::$app->request->post())){
            //var_dump($post);exit();
           
            $model->save();
        
        return $this->redirect(['view-own-studentslb','id'=>$model->student_fk]);
        } else {
            return $this->render('update_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionCheck($id){
        $model = $this->findModel($id);

        if($model->load($post=Yii::$app->request->post())){
            //var_dump($post);exit();
           
            $model->save();
        
        return $this->redirect(['view-own-studentslb','id'=>$model->student_fk]);
        } else {
            return $this->render('check', [
                'model' => $model,
            ]);
        }
    }
}
