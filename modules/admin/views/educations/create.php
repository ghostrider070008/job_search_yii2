<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Educations */

$this->title = 'Добавление образования';
$this->params['breadcrumbs'][] = ['label' => 'Образование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="educations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
