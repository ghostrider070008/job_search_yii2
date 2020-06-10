<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Employment */

$this->title = 'Добавление типа занятости';
$this->params['breadcrumbs'][] = ['label' => 'Тип занятости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
