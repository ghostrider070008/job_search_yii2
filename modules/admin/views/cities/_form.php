<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Countrys;
use app\modules\admin\models\Regions;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_region')->dropdownList(
        Regions::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите область'])->label('Область');?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Наименование') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
