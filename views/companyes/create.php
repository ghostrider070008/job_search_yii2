<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Companyes */

$this->title = 'Добавление компании';
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companyes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
