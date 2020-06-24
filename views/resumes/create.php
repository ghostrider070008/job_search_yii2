<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resumes */

$this->title = 'Регистрация безработного лица находящегося в поиске работы:';
$this->params['breadcrumbs'][] = ['label' => 'Безработные лица', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
