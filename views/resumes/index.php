<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Безработное население в поисках работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить резюме', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'username', 'label' => 'Логин', 'value' => 'user.username'],
            ['attribute' => 'family', 'label' =>'Фамилия'],
            ['attribute' => 'position_name', 'label' => 'Профессия', 'value' => 'position.name'],
            ['attribute' => 'e_mail', 'label' =>'e-mail'],
            ['attribute' => 'education_name', 'label' => 'Образование', 'value' => 'educations.name'],

            //'id_education',
            //'experience:ntext',
            //'education:ntext',
            //'personal_qualities:ntext',
            //'id_status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
