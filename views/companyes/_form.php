<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Companyes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companyes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>'Наименование компании...'])->label(false) ?>

    <?=$form->field($model,'phone')->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])->textInput(['placeholder'=>'+7 (999) 999-99-99'])->label('Ваш Телефон:');?>

    <?= $form->field($model, 'e_mail')->textInput(['maxlength' => true, 'placeholder'=>'e-mail@mail.ru'])->label('Ваш e-mail:') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
