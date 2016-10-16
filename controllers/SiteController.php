<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\web\HttpException;
use yii\db\ActiveRecord;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
        $models = User::find()->all();
        return $this->render('index', array('models' => $models));
    }

    private function loadModel($id) {
        if (($model = User::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreate($id=NULL) {
        if($id == NULL)
            $model = new User();
        else
            $model = $this->loadModel($id);
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {           
                return $this->redirect(Yii::$app->urlManager->createUrl('site/index'));           
        } 
        return $this->render('create', array('model' => $model));
    }

    public function actionDelete($id=NULL) {
        $model = $this->loadModel($id);
        if (!($model->delete()))
        {
            Yii::$app->session->setFlash('error', 'Unable to delete model');
        }
        $this->redirect(Yii::$app->urlManager->createUrl('site/index'));
    }


}
