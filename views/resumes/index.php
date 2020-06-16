<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resumes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Resumes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'family',
            'name',
            'patronomic',
            //'id_position',
            //'salary',
            //'phone',
            //'e_mail',
            //'id_citi',
            //'id_citizenship',
            //'birthday',
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
