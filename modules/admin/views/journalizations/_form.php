<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Journalizations1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journalizations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_operations')->textInput() ?>

    <?= $form->field($model, 'id_users')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
