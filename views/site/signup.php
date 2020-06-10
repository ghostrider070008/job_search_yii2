<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(['action' =>['add-user']]) ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>
<?= $form->field($model, 'name_auth_item')->dropdownList(
    \app\modules\admin\models\AuthItem::find()->select(['description', 'name'])
        ->where(['name' => 'vacant'])
        ->orwhere(['name' => 'work'])
        ->indexBy('name')->column(),
    ['prompt'=>'Выберите роль'])->label('Роль')
;?>
<?= $form->field($model, 'family')->textInput(['placeholder' => 'Ваша фамилия...'])->label(false) ?>
<?= $form->field($model, 'patronymic')->textInput(['placeholder' => 'Вашe отчество...'])->label(false) ?>
<?= $form->field($model, 'phone')->label(false)->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '+7 (999) 999 99 99',])
    ->textInput(['placeholder' => $model->getAttributeLabel('Телефон')]);?>
<?= $form->field($model, 'e_mail')->input('e-mail',['placeholder' => 'e-mail@mail.ru'])->label('E-mail') ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
