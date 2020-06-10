<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SearchEmployment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тип занятости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тип занятости', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'name', 'label' =>'Тип занятости'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
