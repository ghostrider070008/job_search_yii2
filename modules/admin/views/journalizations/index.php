<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\Journalizations1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Журнализация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journalizations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute' => 'user', 'label' => 'Пользователь', 'value' => 'user.username'],
            ['attribute' => 'tables', 'label' => 'Таблица', 'value' => 'tables.name'],
            ['attribute' => 'operations', 'label' => 'Операция', 'value' => 'operations.title'],
            ['attribute' => 'created_at', 'label' => 'Дата'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
