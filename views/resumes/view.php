<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resumes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resumes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_user',
            'family',
            'name',
            'patronomic',
            'id_position',
            'salary',
            'phone',
            'e_mail',
            'id_citi',
            'id_citizenship',
            'birthday',
            'id_education',
            'experience:ntext',
            'education:ntext',
            'personal_qualities:ntext',
            'id_status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
