<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Citizenship */

$this->title = 'Добавление гражданства';
$this->params['breadcrumbs'][] = ['label' => 'Гражданство', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="citizenship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
