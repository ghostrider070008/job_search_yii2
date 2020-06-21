<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Безработное население в поисках работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'template' => '{view-common}{send}',
                'buttons' => [
                    'view-common' => function ($url, $model) {
                        return Html::a(
                            'Просмотреть',
                            ['/resumes/view-common', 'id' => $model->id]);
                    },
                    'send' => function ($url, $model) {
                        return Html::a(
                            'Написать',[
                            '/messages/create-common', 'id_user' => $model->id_user]);
                    },
                    ],
        ],
    ]]); ?>


</div>
