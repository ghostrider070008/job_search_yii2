<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Countrys;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Regions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regions-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= var_dump(\app\modules\admin\models\Countrys::find()->all()[0]["name"])?>
    <?= $form->field($model, 'id_country')->dropdownList(
    Countrys::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Выберите страну'])->label('Страна')
    ;?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Наименование региона') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
