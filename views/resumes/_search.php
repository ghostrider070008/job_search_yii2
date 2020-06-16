<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResumesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resumes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'family') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'patronomic') ?>

    <?php // echo $form->field($model, 'id_position') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'e_mail') ?>

    <?php // echo $form->field($model, 'id_citi') ?>

    <?php // echo $form->field($model, 'id_citizenship') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'id_education') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'personal_qualities') ?>

    <?php // echo $form->field($model, 'id_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
