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
        $data["clearData"] = false;
        $data["secondsBetweenRequest"] = 2;
        $data["dbHost"] = "127.1.0.0";
        $data["dbName"] = "Canh";
        $data["dbPort"] = "3000";
        $data["domains"]["1"] = true;
        $data["domains"]["2"] = false;
        $data["domains"]["3"] = false;
        $data["domains"]["4"] = true;
        $data["apartmentInfo"]["1"] = false;
        $data["apartmentInfo"]["2"] = true;
        $data["apartmentInfo"]["3"] = false;
        $data["apartmentInfo"]["4"] = false;
        $data["apartmentInfo"]["5"] = false;
        $data["apartmentInfo"]["6"] = false;
        $data["apartmentInfo"]["7"] = false;
        $data["apartmentInfo"]["8"] = false;
        $data["apartmentInfo"]["9"] = false;
        $data["apartmentInfo"]["10"] = false;
        $data["apartmentInfo"]["11"] = false;
        $data["apartmentInfo"]["12"] = false;
        $data["apartmentInfo"]["13"] = false;
        $data["apartmentInfo"]["14"] = false;
        $data["apartmentInfo"]["15"] = false;
        $data["apartmentInfo"]["16"] = true;
        $data["apartmentInfo"]["17"] = false;
        return $this->render('index',
            [
                'data' => $data,
            ]);

    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionConfig()
    {
        $curl = new curl\Curl();

        $response = $curl->get('http://localhost:3200/api/apartments');

        if ($curl->errorCode === null) {
           return $response;
        }
        $allModels = [
            [
                "title" => "ABC",
                "area" => "My Dinh",
            ],
            [
                "title" => "ABC2",
                "area" => "My Dinh2",
            ],
            [
                "title" => "ABC3",
                "area" => "My Dinh3",
            ],
        ];
        $dataProvider = new ArrayDataProvider([
            "allModels" => $allModels,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);
        return $this->render('config',
            [
                'dataProvider' => $dataProvider,
            ]);
    }
}
