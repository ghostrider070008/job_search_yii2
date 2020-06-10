<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RegionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Области';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Regions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'country', 'label' => 'Страна', 'value' => 'country.name'],
            ['attribute' => 'name', 'label' =>'область'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
