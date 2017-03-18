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
        $configName = [];
        $configName[17] = 'Title';
        $configName[16] = 'District';
        $configName[15] = 'City';
        $configName[14] = 'Images';
        $configName[13] = 'Price';
        $configName[12] = 'PricePerMetreSquare';
        $configName[11] = 'Description';
        $configName[10] = 'Environment';
        $configName[9] = 'Utilities';
        $configName[8] = 'Floor';
        $configName[7] = 'Project';
        $configName[6] = 'NumberOfBathrooms';
        $configName[5] = 'NumberOfBedrooms';
        $configName[4] = 'Direction';
        $configName[3] = 'Address';
        $configName[2] = 'Area';
        $configName[1] = 'RoomNumber';
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
                'configName' => $configName,
            ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionData()
    {
        $configName = [];
        $configName[17] = 'Title';
        $configName[16] = 'District';
        $configName[15] = 'City';
        $configName[14] = 'Images';
        $configName[13] = 'Price';
        $configName[12] = 'PricePerMetreSquare';
        $configName[11] = 'Description';
        $configName[10] = 'Environment';
        $configName[9] = 'Utilities';
        $configName[8] = 'Floor';
        $configName[7] = 'Project';
        $configName[6] = 'NumberOfBathrooms';
        $configName[5] = 'NumberOfBedrooms';
        $configName[4] = 'Direction';
        $configName[3] = 'Address';
        $configName[2] = 'Area';
        $configName[1] = 'RoomNumber';
        $curl = new curl\Curl();
        $response = $curl->get('http://localhost:3200/api/apartments/all');

        $allModels = [];
        if ($curl->errorCode === null) { 
            $allModels = json_decode($response, true);
        }
        for ($i=0; $i<count($allModels); $i++) {
            if (isset($allModels[$i]["Images"])){
                $images = $allModels[$i]["Images"];
                $imagesString = "";
                foreach ($images as $image) {
                    $imagesString .= '<img src="'.$image.'" style="width:300px;"><br><br>';
                }
                $allModels[$i]["Images"] = $imagesString;
            }
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
                'configName' => $configName,
            ]);
    }
}
