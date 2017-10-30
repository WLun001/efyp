<?php
namespace app\modules\students\controllers;
use Yii;
use app\modules\students\models\Staff;
use app\modules\students\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\db\Query;
use yii\web\UploadedFile;
/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
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
                        'roles' => ['manageStaff'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Staff();

        if (Yii::$app->request->isPost) {
            $model->files = UploadedFile::getInstance($model, 'files');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }
    /**
     * Displays a single Staff model.
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
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();
        if ($model->load($post = Yii::$app->request->post())) {
            // var_dump($model);exit();
            $password = sha1($post['Staff']['password']);
            //var_dump($password);exit();
            $auth = Yii::$app->authManager;
            if($post['Staff']['roleArray']){
                $model->role = implode(",", $post['Staff']['roleArray']);
            }
            $y = sizeof($post['Staff']['roleArray']);
            $model->save();
            // var_dump($model->id);exit();
            $user = new User();
            $user->username= $model->userID;
            $user->password = $password;
            $user->role = $model->role;
            $user->save();
            //var_dump($user);exit();
            for($i=0; $i<$y; $i++) {
                if($post['Staff']['roleArray'][$i] == '1'){
                    $authorRole = $auth->getRole('admin');
                }elseif ($post['Staff']['roleArray'][$i] == '2'){
                    $authorRole = $auth->getRole('fypCoordinator');
                }elseif ($post['Staff']['roleArray'][$i] == '3') {
                    $authorRole = $auth->getRole('supervisor');
                }
                 // var_dump($authorRole->name);exit();
                //var_dump($user->id);exit();
                $auth->assign($authorRole, $user->id);
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load($post = Yii::$app->request->post())) {
            $auth = Yii::$app->authManager;
              // var_dump($post);exit();
            if($post['Staff']['roleArray'][1]){
                // var_dump("ddd");
                array_shift($post['Staff']['roleArray']);
                $model->role = implode(",", $post['Staff']['roleArray']);
            }
          
            $model->save();
         
            $user = User::find()
            ->where(['username'=> $model->userID])
            ->one();
            $user->role = $model->role;
            $user->save();
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('DELETE FROM auth_assignment WHERE user_id='.$user->id)->execute();
            $y = sizeof($post['Staff']['roleArray']);
            
            for($i=0; $i<$y; $i++) {
                if($post['Staff']['roleArray'][$i] == '1'){
                    $authorRole = $auth->getRole('admin');
                }elseif ($post['Staff']['roleArray'][$i] == '2'){
                    $authorRole = $auth->getRole('fypCoordinator');
                }elseif ($post['Staff']['roleArray'][$i] == '3') {
                    $authorRole = $auth->getRole('supervisor');
                }
                // var_dump($post['Staff']['roleArray'][$i]);
                $auth->assign($authorRole, $user->id);
            }
            // exit();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $roleArray = explode(",", $model->role);
            return $this->render('update', [
                'model' => $model,
                'roleArray' => $roleArray,
            ]);
        }
    }
    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //var_dump($model);exit();
        
        $user = User::find()
              ->where(['username'=> $model->userID])
              ->one();
        $auth = Yii::$app->authManager;
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('DELETE FROM auth_assignment WHERE user_id='.$user->id)->execute();
        $model->delete();
        $user->delete();
        
        return $this->redirect(['index']);
    }
    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}