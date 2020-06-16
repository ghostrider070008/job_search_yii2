<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста заполните все поля для регистрации:</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['action' =>['signup'], 'method' => 'post']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Ваш логин...'])->label(false) ?>
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'e-mail.ru'])->label(false)  ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль...'])->label(false)  ?>
            <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'Повторите пароль...'])->label(false) ?>
            <?= $form->field($model, 'rolename')->dropdownList(
            \app\modules\admin\models\AuthItem::find()->select(['description', 'name'])
            ->where(['name' => 'vacant'])
            ->orwhere(['name' => 'work'])
            ->indexBy('name')->column(),
            ['prompt'=>'Выберите роль...'])->label('Роль')
            ;?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
