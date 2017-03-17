<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ArrayDataProvider;
use linslin\yii2\curl;
use yii\base\UserException;

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
        $data = [];
        $status = false;
        $curl = new curl\Curl();
        $response = $curl->get('http://localhost:3200/api/crawler/config');
        if (!$response) {
            throw new \yii\base\UserException('Can not connect to Server');
        }
        if ($curl->errorCode === null) {
            $json = json_decode($response, true);
            $status = $json["crawlerStatus"];;
            $data = $json["crawlerConfig"];
            if (isset($data["clearData"]) == true){
                $data["clearData"] = true;
            }
            else {
                $data["clearData"] = false;
            }
        }
        
        return $this->render('index',
            [
                'data' => $data,
                'status' => $status,
            ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionData()
    {
        $curl = new curl\Curl();
        $response = $curl->get('http://localhost:3200/api/apartments?');

        $allModels = [];
        if ($curl->errorCode === null) { 
            $allModels = json_decode($response, true);
        }

        $response = $curl->get('http://localhost:3200/api/crawler/config');

        $config = [];
        if ($curl->errorCode === null) {
            $config = json_decode($response, true);
        }
        return $this->render('data',
            [
                'items' => $allModels,
                'config' => $config["crawlerConfig"]["apartmentInfo"],
            ]);
    }
}
