<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VacancySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_companyes') ?>

    <?= $form->field($model, 'id_status') ?>

    <?= $form->field($model, 'id_cities') ?>

    <?= $form->field($model, 'id_positions') ?>

    <?php // echo $form->field($model, 'id_educations') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'id_schedules') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'e-mail') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
