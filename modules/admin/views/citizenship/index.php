<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CitizenshipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Гражданство';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="citizenship-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'name', 'label' =>'Гражданство'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
