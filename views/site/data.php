<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlertAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Data';
$arr = [];
for ($i=1; $i<=17; $i++){
    $arr[$i] = false;
}
$configArray = [];
for ($i = 17; $i>=1; $i--) {
    if ($config[$i] == true){
        $configArray[] = $configName[$i];
    }
}
$searchAttributes = $configArray;
$searchModel = [];
$searchColumns = [];
$searchColumns[] = ['class' => 'yii\grid\SerialColumn'];

foreach ($searchAttributes as $searchAttribute) {
    $filterName = 'filter' . $searchAttribute;
    $filterValue = Yii::$app->request->getQueryParam($filterName, '');
    $searchModel[$searchAttribute] = $filterValue;
    $searchColumns[] = [
        'attribute' => $searchAttribute,
        'filter' => '<input class="form-control" name="' . $filterName . '" value="' . $filterValue . '" type="text">',
        'value' => $searchAttribute,
        'format' => 'raw',
    ];
    $items = array_filter($items, function($item) use (&$filterValue, &$searchAttribute) {
        return strlen($filterValue) > 0 ? stripos('/^' . strtolower($item[$searchAttribute]) . '/', strtolower($filterValue)) : true;
    });
}
?>

<div align="left">
</div>
<div class="alert-area-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'pager' => [
            'firstPageLabel' => 'First',
            'lastPageLabel'  => 'Last'
        ],
        'dataProvider' => new ArrayDataProvider([
            'allModels' => $items,
            'sort' => [
                'attributes' => $searchAttributes,
            ],
                'pagination' => [
                        'pageSize' => 10,
                ],
            ]),
        'filterModel' => $searchModel,
        'columns' => array_merge(
                $searchColumns, [/*['class' => 'yii\grid\SerialColumn'],*/
            ]
        )
    ]);?>
</div>