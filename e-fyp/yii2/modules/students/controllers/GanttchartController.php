<?php

namespace app\modules\students\controllers;

use Yii;
use app\modules\students\models\Ganttchart;
use app\modules\students\models\GanttchartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\students\models\Logbook;
use app\modules\students\models\Students;
use app\modules\students\models\Title;
/**
 * GanttchartController implements the CRUD actions for Ganttchart model.
 */
class GanttchartController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'delete' => ['POST'],
            //     ],
            // ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','logbook'],
                        'roles' => ['manageGanttChart'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logbook','view-own-studentslb'],
                        'roles' => ['viewLogBook'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Ganttchart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GanttchartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ganttchart model.
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
     * Creates a new Ganttchart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ganttchart();

        if ($model->load(Yii::$app->request->post())) {
            $user = Yii::$app->user->identity->attributes;
            $model->studentID_fk = $user['username'];
            // var_dump($user);exit();
            $model->save();
            return $this->redirect(['logbook', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ganttchart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['logbook', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ganttchart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['logbook']);
    }

    /**
     * Finds the Ganttchart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ganttchart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ganttchart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogbook(){
        $user = Yii::$app->user->identity->attributes;
        $student = Students::find()->where(['studentID'=>$user['username']])->one();
        $title = Title::find()
        ->where(['student_fk'=>$user['username']])
        ->one();

        $models = Ganttchart::find()->where(['studentID_fk'=>$user['username']])->all();

        $logbooks = Logbook::find()->where(['student_fk'=>$user['username']])->all();

        return $this->render('logbook',['models'=>$models,'logbooks'=>$logbooks,'student'=>$student,'title'=>$title]);
    }

        public function actionViewOwnStudentslb($id){
        $lb = new Logbook();


        $student = Students::find()->where(['studentID'=>$id])->one();
        $title = Title::find()
        ->where(['student_fk'=>$student->studentID])
        ->one();

        $models = Ganttchart::find()->where(['studentID_fk'=>$student->studentID])->all();

        $logbooks = Logbook::find()->where(['student_fk'=>$student->studentID])->all();

        return $this->render('view-own-studentslb',['models'=>$models,'logbooks'=>$logbooks,'student'=>$student,'title'=>$title,'lb'=>$lb]);
    }
}
