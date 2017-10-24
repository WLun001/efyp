<?php

namespace app\modules\students\controllers;

use yii\helpers\Html;
use yii\filters\VerbFilter;

class LecturerhomeController extends \yii\web\Controller
{
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
                        'only' => ['index'],
                        'rules' => [
                            //allow authenticated users
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        //everything else is denied
                    ],
                ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
