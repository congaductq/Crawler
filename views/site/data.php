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
        if ($i == 17) $configArray[] = 'Title';
        if ($i == 16) $configArray[] = 'District';
        if ($i == 15) $configArray[] = 'City';
        if ($i == 14) $configArray[] = 'Images';
        if ($i == 13) $configArray[] = 'Price';
        if ($i == 12) $configArray[] = 'PricePerMetreSquare';
        if ($i == 11) $configArray[] = 'Description';
        if ($i == 10) $configArray[] = 'Environment';
        if ($i == 9) $configArray[] = 'Utilities';
        if ($i == 8) $configArray[] = 'Floor';
        if ($i == 7) $configArray[] = 'Project';
        if ($i == 6) $configArray[] = 'NumberOfBathrooms';
        if ($i == 5) $configArray[] = 'NumberOfBedrooms';
        if ($i == 4) $configArray[] = 'Direction';
        if ($i == 3) $configArray[] = 'Address';
        if ($i == 2) $configArray[] = 'Area';
        if ($i == 1) $configArray[] = 'RoomNumber';
    }
}
$searchAttributes = $configArray;
$searchModel = [];
$searchColumns = [];

foreach ($searchAttributes as $searchAttribute) {
    $filterName = 'filter' . $searchAttribute;
    $filterValue = Yii::$app->request->getQueryParam($filterName, '');
    $searchModel[$searchAttribute] = $filterValue;
    $searchColumns[] = [
        'attribute' => $searchAttribute,
        'filter' => '<input class="form-control" name="' . $filterName . '" value="' . $filterValue . '" type="text">',
        'value' => $searchAttribute,
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
        'dataProvider' => new ArrayDataProvider([
            'allModels' => $items,
            'sort' => [
                'attributes' => $searchAttributes,
            ],
                'pagination' => [
                        'pageSize' => 5,
                ],
            ]),
        'filterModel' => $searchModel,
        'columns' => array_merge(
                $searchColumns, [/*['class' => 'yii\grid\SerialColumn'],*/
            ]
        )
    ]);?>
</div>