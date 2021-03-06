<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вакансии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id_companyes', 'label' => 'Компания', 'value' => 'companyes.name'],
            ['attribute' => 'id_positions', 'label' => 'Должность', 'value' => 'positions.name'],
            ['attribute' => 'id_educations', 'label' => 'Образование', 'value' => 'educations.name'],
            ['attribute' => 'salary', 'label' => 'Зарплата'],
            ['attribute' => 'id_schedules', 'label' => 'График работы', 'value' => 'schedules.name'],
            ['attribute' => 'text', 'label' => 'Описание'],
            ['attribute' => 'phone', 'label' => 'Телефон'],
            ['attribute' => 'e_mail', 'label' => ' E-mail'],
            ['attribute' => 'created_at', 'label' => 'Дата добавления'],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'template' => '{view-common}{send}',
                'buttons' => [
                    'view-common' => function ($url, $model) {
                        return Html::a(
                            'Просмотреть',
                            ['/vacancy/view-common', 'id' => $model->id]);
                    },
                    'send' => function ($url, $model) {
                        return Html::a(
                            'Написать',[
                            '/messages/create-common', 'id_user' => $model->getUserId($model->id_companyes)]);
                    },
                    ],
                ],
        ],
    ]); ?>


</div>
